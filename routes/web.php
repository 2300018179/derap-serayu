<?php

use App\Http\Controllers\AdminArtikelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CeritaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HumorController;
use App\Http\Controllers\InformationPageController;
use App\Http\Controllers\NewsletterSubscriptionController;
use App\Http\Controllers\OpiniController;
use App\Http\Controllers\PenulisArtikelController;
use App\Http\Controllers\PotensiController;
use App\Http\Controllers\PublicArtikelController;
use App\Http\Controllers\ReaderAccountController;
use App\Http\Controllers\SosokController;
use App\Http\Controllers\SudutKotaController;
use App\Http\Controllers\TeknologiController;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/daftar', function () {
    return view('auth.register');
})->name('register');

Route::get('/daftar/pembaca', function () {
    return view('auth.register-pembaca');
})->name('register.pembaca');

Route::get('/daftar/pembaca/verifikasi', function () {
    return view('auth.register-pembaca-verifikasi');
})->name('register.pembaca.verifikasi');

Route::get('/daftar/pembaca/selesai', function () {
    return view('auth.register-pembaca-selesai');
})->name('register.pembaca.selesai');

Route::get('/daftar/penulis', function () {
    return view('auth.register-penulis');
})->name('register.penulis');

Route::get('/daftar/penulis/verifikasi', function () {
    return view('auth.register-penulis-verifikasi');
})->name('register.penulis.verifikasi');

Route::get('/daftar/penulis/selesai', function () {
    return view('auth.register-penulis-selesai');
})->name('register.penulis.selesai');

Route::get('/login', function (Request $request) {
    $articleSlug = $request->query('article');

    if (is_string($articleSlug)) {
        $article = Article::query()
            ->where('slug', $articleSlug)
            ->where('status', 'published')
            ->first();

        if ($article) {
            $request->session()->put('url.intended', route('articles.show', $article->slug));
        }
    }

    return view('auth.login');
})->name('login');
Route::post('/login', [AuthController::class, 'storeLogin'])
    ->middleware('throttle:login')
    ->name('login.store');
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');
Route::post('/daftar/penulis', [AuthController::class, 'registerWriter'])
    ->middleware('guest')
    ->name('register.penulis.store');
Route::post('/daftar/pembaca', [AuthController::class, 'registerReader'])
    ->middleware('guest')
    ->name('register.pembaca.store');

Route::get('/lupa-password', function () {
    return view('auth.forgot-password');
})->name('password.request');

Route::post('/lupa-password', [AuthController::class, 'sendPasswordResetLink'])
    ->middleware(['guest', 'throttle:password-reset'])
    ->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])
    ->middleware('guest')
    ->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])
    ->middleware(['guest', 'throttle:password-reset'])
    ->name('password.update');

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::view('/tentang-kami', 'about')
    ->name('about');

Route::get('/informasi/{page}', [InformationPageController::class, 'show'])
    ->whereIn('page', ['privasi', 'syarat-ketentuan', 'pedoman-media-siber'])
    ->name('information.show');
Route::get('/kebijakan-privasi', [InformationPageController::class, 'show'])
    ->defaults('page', 'privasi')
    ->name('information.privacy');
Route::get('/syarat-ketentuan', [InformationPageController::class, 'show'])
    ->defaults('page', 'syarat-ketentuan')
    ->name('information.terms');
Route::get('/pedoman-media-siber', [InformationPageController::class, 'show'])
    ->defaults('page', 'pedoman-media-siber')
    ->name('information.editorial');

Route::get('/cerita', [CeritaController::class, 'index'])
    ->name('cerita');

Route::get('/opini', [OpiniController::class, 'index'])
    ->name('opini');

Route::get('/sosok', [SosokController::class, 'index'])
    ->name('sosok');

Route::get('/sudut-kota', [SudutKotaController::class, 'index'])
    ->name('sudut-kota');

Route::get('/potensi', [PotensiController::class, 'index'])
    ->name('potensi');

Route::get('/teknologi', [TeknologiController::class, 'index'])
    ->name('teknologi');

Route::get('/humor', [HumorController::class, 'index'])
    ->name('humor');

Route::get('/artikel', [PublicArtikelController::class, 'index'])
    ->name('articles.index');
Route::get('/artikel/{article:slug}/lampiran', [PublicArtikelController::class, 'downloadDocument'])
    ->name('articles.document');
Route::get('/artikel/{article:slug}', [PublicArtikelController::class, 'show'])
    ->name('articles.show');
Route::middleware(['auth', 'role:reader'])->prefix('pembaca')->name('pembaca.')->group(function () {
    Route::get('/profil', [ReaderAccountController::class, 'profile'])->name('profile');
    Route::get('/tersimpan', [ReaderAccountController::class, 'savedArticles'])->name('saved.index');
    Route::post('/artikel/{article:slug}/simpan', [ReaderAccountController::class, 'storeSavedArticle'])
        ->name('saved.store');
    Route::delete('/artikel/{article:slug}/simpan', [ReaderAccountController::class, 'destroySavedArticle'])
        ->name('saved.destroy');
});
Route::post('/newsletter/langganan', [NewsletterSubscriptionController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('newsletter.subscribe');

Route::middleware(['auth', 'role:writer'])->prefix('penulis')->name('penulis.')->group(function () {
    Route::get('/dashboard', [PenulisArtikelController::class, 'dashboard'])->name('dashboard');
    Route::get('/artikel', [PenulisArtikelController::class, 'index'])->name('articles.index');
    Route::get('/create', [PenulisArtikelController::class, 'create'])->name('artikel.create');
    Route::post('/artikel', [PenulisArtikelController::class, 'store'])->name('artikel.store');
    Route::get('/artikel/{article}/edit', [PenulisArtikelController::class, 'edit'])->name('articles.edit');
    Route::get('/artikel/{article}/dokumen', [PenulisArtikelController::class, 'downloadDocument'])->name('articles.document');
    Route::put('/artikel/{article}', [PenulisArtikelController::class, 'update'])->name('articles.update');
    Route::delete('/artikel/{article}', [PenulisArtikelController::class, 'destroy'])->name('articles.destroy');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminArtikelController::class, 'dashboard'])->name('dashboard');
    Route::get('/artikel', [AdminArtikelController::class, 'index'])->name('articles.index');
    Route::post('/artikel/{article}/terbitkan', [AdminArtikelController::class, 'publish'])->name('articles.publish');
    Route::post('/artikel/{article}/tolak', [AdminArtikelController::class, 'reject'])->name('articles.reject');
    Route::get('/artikel/{article}/dokumen', [AdminArtikelController::class, 'downloadDocument'])->name('articles.document');
});
