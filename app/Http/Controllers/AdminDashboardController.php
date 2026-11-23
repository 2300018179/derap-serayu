<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleComment;
use App\Models\ArticleLike;
use App\Models\NewsletterSubscription;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    public function index(): View
    {
        $totalArtikel = Article::query()->count();
        $menungguTinjauan = Article::query()->where('status', 'review')->count();
        $totalTerbit = Article::query()->where('status', 'published')->count();
        $perluRevisi = Article::query()->where('status', 'rejected')->count();
        $totalPengguna = User::query()->count();
        $penggunaAktif = User::query()->where('is_active', true)->count();
        $totalAdmin = User::query()->where('role', 'admin')->count();
        $totalEditor = User::query()->where('role', 'editor')->count();
        $totalPenulis = User::query()->where('role', 'writer')->count();
        $totalPembaca = User::query()->where('role', 'reader')->count();
        $kecamatan = config('kecamatan', []);
        $jumlahKecamatan = count($kecamatan);
        $jumlahArtikelPerKecamatan = Article::query()
            ->where('status', 'published')
            ->whereIn('kecamatan', $kecamatan)
            ->selectRaw('kecamatan, count(*) as total')
            ->groupBy('kecamatan')
            ->pluck('total', 'kecamatan');
        $artikelPerKecamatan = collect($kecamatan)
            ->map(fn (string $namaKecamatan): array => [
                'nama' => $namaKecamatan,
                'jumlahArtikel' => (int) $jumlahArtikelPerKecamatan->get($namaKecamatan, 0),
            ]);
        $kecamatanDenganArtikel = $artikelPerKecamatan
            ->filter(fn (array $kecamatan): bool => $kecamatan['jumlahArtikel'] > 0)
            ->count();
        $kecamatanTeratas = $artikelPerKecamatan
            ->filter(fn (array $kecamatan): bool => $kecamatan['jumlahArtikel'] > 0)
            ->sortByDesc('jumlahArtikel')
            ->take(5)
            ->values();
        $kecamatanBelumTerjangkau = $artikelPerKecamatan
            ->filter(fn (array $kecamatan): bool => $kecamatan['jumlahArtikel'] === 0)
            ->take(5)
            ->values();
        $maxArtikelPerKecamatan = $kecamatanTeratas->max('jumlahArtikel') ?? 0;
        $totalTayangan = Article::query()->sum('views');
        $totalKategori = Article::query()
            ->whereNotNull('category')
            ->where('category', '<>', '')
            ->distinct()
            ->pluck('category')
            ->count();
        $totalKomentar = ArticleComment::query()->count();
        $totalSuka = ArticleLike::query()->count();
        $totalArtikelTersimpan = DB::table('saved_articles')->count();
        $totalPelangganNewsletter = NewsletterSubscription::query()->count();
        $antreanTinjauan = Article::query()
            ->with('user:id,name')
            ->where('status', 'review')
            ->latest()
            ->take(5)
            ->get();
        $artikelTerbaru = Article::query()
            ->with('user:id,name')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalArtikel',
            'menungguTinjauan',
            'totalTerbit',
            'perluRevisi',
            'totalPengguna',
            'penggunaAktif',
            'totalAdmin',
            'totalEditor',
            'totalPenulis',
            'totalPembaca',
            'jumlahKecamatan',
            'kecamatanDenganArtikel',
            'kecamatanTeratas',
            'kecamatanBelumTerjangkau',
            'maxArtikelPerKecamatan',
            'totalTayangan',
            'totalKategori',
            'totalKomentar',
            'totalSuka',
            'totalArtikelTersimpan',
            'totalPelangganNewsletter',
            'antreanTinjauan',
            'artikelTerbaru'
        ));
    }
}
