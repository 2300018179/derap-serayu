<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AccountProfileController extends Controller
{
    public function show(Request $request): View
    {
        $user = $request->user();

        $profile = match ($user->role) {
            'admin' => [
                'roleLabel' => 'Administrator',
                'eyebrow' => 'RUANG PERSONAL ADMINISTRATOR',
                'welcomeText' => 'Pantau antrean tinjauan, kelola artikel, dan informasi akun kamu di satu tempat.',
                'badgeIcon' => 'fa-shield-halved',
                'heroIcon' => 'fa-user-shield',
                'summaryCaption' => 'Jaga kualitas cerita yang terbit di Derap Serayu.',
                'statLabel' => 'Menunggu Tinjauan',
                'statIcon' => 'fa-regular fa-clock',
                'statValue' => Article::where('status', 'review')->count(),
                'primaryLabel' => 'Dasbor Admin',
                'primaryIcon' => 'fa-solid fa-gauge-high',
                'primaryUrl' => route('admin.dashboard'),
            ],
            'editor' => [
                'roleLabel' => 'Editor',
                'eyebrow' => 'RUANG PERSONAL EDITOR',
                'welcomeText' => 'Kelola tulisan, periksa kiriman penulis, dan pantau informasi akun kamu di satu tempat.',
                'badgeIcon' => 'fa-pen-to-square',
                'heroIcon' => 'fa-pen-to-square',
                'summaryCaption' => 'Jaga kualitas artikel yang terbit di Derap Serayu.',
                'statLabel' => 'Menunggu Tinjauan',
                'statIcon' => 'fa-regular fa-clock',
                'statValue' => Article::where('status', 'review')->where('user_id', '!=', $user->id)->count(),
                'primaryLabel' => 'Dasbor Editor',
                'primaryIcon' => 'fa-solid fa-gauge-high',
                'primaryUrl' => route('editor.dashboard'),
            ],
            default => [
                'roleLabel' => 'Pembaca',
                'eyebrow' => 'RUANG PERSONAL PEMBACA',
                'welcomeText' => 'Semua cerita yang kamu simpan, informasi akun, dan perjalanan membaca kamu ada di satu tempat. Selamat menjelajahi cerita dari Banjarnegara.',
                'badgeIcon' => 'fa-circle-check',
                'heroIcon' => 'fa-book-open-reader',
                'summaryCaption' => 'Terus temukan perspektif baru melalui cerita, budaya, dan informasi dari tanah Serayu.',
                'statLabel' => 'Artikel Tersimpan',
                'statIcon' => 'fa-regular fa-bookmark',
                'statValue' => $user->savedArticles()->count(),
                'primaryLabel' => 'Artikel Tersimpan',
                'primaryIcon' => 'fa-regular fa-bookmark',
                'primaryUrl' => route('pembaca.saved.index'),
            ],
        };

        return view($user->role === 'reader' ? 'account.reader-profile' : 'account.profile', [
            'accountUser' => $user,
            'profile' => $profile,
        ]);
    }
}
