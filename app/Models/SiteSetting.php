<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['settings'])]
class SiteSetting extends Model
{
    public const DEFAULT_SETTINGS = [
        'site_name' => 'Derap Serayu',
        'tagline' => 'Media Informasi Banjarnegara',
        'primary_color' => '#063f60',
        'accent_color' => '#08add5',
        'background_mode' => 'color',
        'background_color' => '#f4fbfe',
        'background_image_path' => null,
        'login_bg_image_path' => null,
        'register_bg_image_path' => null,
        'reset_password_bg_image_path' => null,
        'logo_path' => null,
        'banner_path' => null,
        'home_eyebrow' => 'Cerita Hari Ini —',
        'home_heading' => 'Pesona Alam Banjarnegara, Dari Dataran Tinggi Dieng hingga Lembah Serayu',
        'home_description' => 'Banjarnegara bukan hanya tentang Dieng. Di balik sejuknya pegunungan, tersimpan beragam cerita, budaya, dan potensi luar biasa yang layak untuk kamu jelajahi.',
        'contact_email' => '',
        'contact_phone' => '',
        'instagram_url' => 'https://www.instagram.com/kabupatenbanjarnegara/',
        'facebook_url' => 'https://www.facebook.com/p/Akun-Resmi-Pemerintah-Kabupaten-Banjarnegara-100092687175359/',
        'youtube_url' => 'https://www.youtube.com/@pemkabbanjarnegara',
        'tiktok_url' => 'https://www.tiktok.com/@pemkabbanjarnegara',
        'x_url' => 'https://x.com/pemkab_bna',
        'footer_description' => 'Media informasi dan cerita Banjarnegara yang menghadirkan berita, budaya, wisata, potensi, serta kisah dari masyarakat.',
        'footer_quote' => 'Dari gunung hingga lembah, setiap sudut Banjarnegara punya cerita.',
        'footer_copyright' => 'Semua hak dilindungi.',
    ];

    protected function casts(): array
    {
        return [
            'settings' => 'array',
        ];
    }

    /**
     * @return array<string, string|null>
     */
    public static function currentSettings(): array
    {
        $request = request();
        $settings = $request->attributes->get('siteSettings.current');

        if (is_array($settings)) {
            return $settings;
        }

        $storedSettings = self::query()->find(1)?->settings ?? [];
        $settings = array_replace(self::DEFAULT_SETTINGS, $storedSettings);
        $request->attributes->set('siteSettings.current', $settings);

        return $settings;
    }
}
