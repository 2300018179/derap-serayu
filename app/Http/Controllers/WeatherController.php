<?php

namespace App\Http\Controllers;

use Carbon\CarbonImmutable;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Throwable;

class WeatherController extends Controller
{
    private const BMKG_VILLAGE_CODE = '33.04.16.2008'; // Desa Dieng Kulon, Kec. Batur

    private const LATITUDE = -7.2073;

    private const LONGITUDE = 109.9062;

    public function dieng(): JsonResponse
    {
        $payload = Cache::remember('weather.dieng', now()->addMinutes(15), fn (): ?array => $this->buildPayload());

        if ($payload === null) {
            Cache::forget('weather.dieng');

            return response()->json(['message' => 'Data cuaca tidak tersedia.'], 503);
        }

        return response()->json($payload);
    }

    /**
     * @return array<string, mixed>|null
     */
    private function buildPayload(): ?array
    {
        $bmkg = $this->fetchBmkgSlots();
        $openMeteo = $this->fetchOpenMeteo();

        if ($bmkg !== []) {
            return $this->fromBmkg($bmkg, $openMeteo);
        }

        return $openMeteo === null ? null : $this->fromOpenMeteo($openMeteo);
    }

    /**
     * @return list<array<string, mixed>>
     */
    private function fetchBmkgSlots(): array
    {
        try {
            $response = Http::timeout(8)->retry(1, 200)
                ->get('https://api.bmkg.go.id/publik/prakiraan-cuaca', ['adm4' => self::BMKG_VILLAGE_CODE]);

            if (! $response->successful()) {
                return [];
            }

            $slots = collect($response->json('data.0.cuaca', []))->flatten(1)->all();

            return array_values(array_filter($slots, fn ($slot): bool => isset($slot['local_datetime'], $slot['t'])));
        } catch (Throwable) {
            return [];
        }
    }

    /**
     * @return array<string, mixed>|null
     */
    private function fetchOpenMeteo(): ?array
    {
        try {
            $response = Http::timeout(8)->retry(1, 200)->get('https://api.open-meteo.com/v1/forecast', [
                'latitude' => self::LATITUDE,
                'longitude' => self::LONGITUDE,
                'current' => 'temperature_2m,relative_humidity_2m,apparent_temperature,weather_code,wind_speed_10m,visibility',
                'hourly' => 'temperature_2m,precipitation_probability,weather_code',
                'timezone' => 'Asia/Jakarta',
                'forecast_days' => 2,
            ]);

            return $response->successful() && $response->json('current') && $response->json('hourly.time')
                ? $response->json()
                : null;
        } catch (Throwable) {
            return null;
        }
    }

    /**
     * @param  list<array<string, mixed>>  $slots
     * @param  array<string, mixed>|null  $openMeteo
     * @return array<string, mixed>
     */
    private function fromBmkg(array $slots, ?array $openMeteo): array
    {
        $now = CarbonImmutable::now('Asia/Jakarta');
        $currentIndex = 0;

        foreach ($slots as $index => $slot) {
            if (CarbonImmutable::parse($slot['local_datetime'], 'Asia/Jakarta')->lte($now)) {
                $currentIndex = $index;
            }
        }

        $current = $slots[$currentIndex];
        $hourly = $openMeteo['hourly'] ?? null;
        $feelsLike = $openMeteo['current']['apparent_temperature'] ?? null;

        $rainChance = function (string $localDatetime) use ($hourly): ?int {
            if ($hourly === null) {
                return null;
            }

            $key = array_search(substr(str_replace(' ', 'T', $localDatetime), 0, 13).':00', $hourly['time'], true);

            return $key === false ? null : $hourly['precipitation_probability'][$key] ?? null;
        };

        $forecast = array_map(fn (array $slot): array => [
            'time' => substr($slot['local_datetime'], 11, 5),
            'temp' => (int) round($slot['t']),
            'text' => $slot['weather_desc'],
            'icon' => $this->bmkgIcon((int) ($slot['weather'] ?? 0), $slot['local_datetime']),
            'rain' => $rainChance($slot['local_datetime']),
        ], array_slice($slots, $currentIndex, 8));

        return [
            'source' => 'BMKG',
            'updated' => substr($current['local_datetime'], 11, 5),
            'current' => [
                'text' => $current['weather_desc'],
                'icon' => $forecast[0]['icon'],
                'temp' => (int) round($current['t']),
                'feels_like' => $feelsLike === null ? null : (int) round($feelsLike),
                'humidity' => isset($current['hu']) ? (int) round($current['hu']) : null,
                'wind' => isset($current['ws']) ? (int) round($current['ws']) : null,
                'visibility_km' => isset($current['vs']) && $current['vs'] > 0
                    ? round($current['vs'] / 1000, 1)
                    : (isset($openMeteo['current']['visibility']) ? round($openMeteo['current']['visibility'] / 1000, 1) : null),
                'rain' => $forecast[0]['rain'],
            ],
            'forecast' => $forecast,
        ];
    }

    /**
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    private function fromOpenMeteo(array $data): array
    {
        $current = $data['current'];
        $times = $data['hourly']['time'];
        $start = 0;

        foreach ($times as $index => $time) {
            if ($time >= $current['time']) {
                $start = $index;
                break;
            }
        }

        $forecast = [];

        for ($i = $start; $i < min($start + 24, count($times)); $i++) {
            [$text, $icon] = $this->wmo((int) $data['hourly']['weather_code'][$i]);
            $forecast[] = [
                'time' => substr($times[$i], 11, 5),
                'temp' => (int) round($data['hourly']['temperature_2m'][$i]),
                'text' => $text,
                'icon' => $icon,
                'rain' => $data['hourly']['precipitation_probability'][$i] ?? null,
            ];
        }

        [$text, $icon] = $this->wmo((int) $current['weather_code']);

        return [
            'source' => 'Open-Meteo',
            'updated' => substr($current['time'], 11, 5),
            'current' => [
                'text' => $text,
                'icon' => $icon,
                'temp' => (int) round($current['temperature_2m']),
                'feels_like' => (int) round($current['apparent_temperature']),
                'humidity' => (int) round($current['relative_humidity_2m']),
                'wind' => (int) round($current['wind_speed_10m']),
                'visibility_km' => isset($current['visibility']) ? round($current['visibility'] / 1000, 1) : null,
                'rain' => $forecast[0]['rain'] ?? null,
            ],
            'forecast' => $forecast,
        ];
    }

    private function bmkgIcon(int $code, string $localDatetime): string
    {
        $hour = (int) substr($localDatetime, 11, 2);
        $isNight = $hour >= 18 || $hour < 6;

        return match (true) {
            $code === 0 => $isNight ? '🌙' : '☀️',
            $code === 1 => $isNight ? '🌙' : '🌤️',
            $code === 2 => '⛅',
            $code === 3, $code === 4 => '☁️',
            $code === 5, $code === 10, $code === 45 => '🌫️',
            $code >= 95 => '⛈️',
            $code >= 60 => '🌧️',
            default => '🌤️',
        };
    }

    /**
     * @return array{0: string, 1: string}
     */
    private function wmo(int $code): array
    {
        return match (true) {
            $code === 0 => ['Cerah', '☀️'],
            $code === 1 => ['Cerah Berawan', '🌤️'],
            $code === 2 => ['Berawan Sebagian', '⛅'],
            $code === 3 => ['Berawan', '☁️'],
            in_array($code, [45, 48], true) => ['Berkabut', '🌫️'],
            $code >= 51 && $code <= 57 => ['Gerimis', '🌦️'],
            $code >= 61 && $code <= 67 => ['Hujan', '🌧️'],
            $code >= 80 && $code <= 82 => ['Hujan Lokal', '🌧️'],
            $code >= 95 => ['Badai Petir', '⛈️'],
            default => ['Tidak diketahui', '🌤️'],
        };
    }
}
