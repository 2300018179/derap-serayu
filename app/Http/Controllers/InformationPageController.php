<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class InformationPageController extends Controller
{
    public function show(string $page): View
    {
        $pages = [
            'privasi' => [
                'title' => 'Kebijakan Privasi',
                'intro' => 'Informasi tentang data yang digunakan saat kamu memakai Derap Serayu.',
                'sections' => [
                    [
                        'heading' => 'Data yang kamu berikan',
                        'body' => 'Jika membuat akun, kami menyimpan nama, username, email, dan kata sandi dalam bentuk hash untuk mengelola akses akun. Jika mendaftar newsletter, alamat email disimpan sebagai catatan pendaftaran. Artikel tersimpan dikaitkan dengan akun pembaca.',
                    ],
                    [
                        'heading' => 'Penggunaan data',
                        'body' => 'Data tersebut digunakan untuk menyediakan fitur akun, mengingat artikel pilihanmu, dan mencatat pendaftaran newsletter. Membaca dan mencari artikel tetap dapat dilakukan tanpa akun.',
                    ],
                    [
                        'heading' => 'Pertanyaan atau permintaan',
                        'body' => 'Untuk pertanyaan tentang penggunaan data pada situs ini, silakan hubungi Pemerintah Kabupaten Banjarnegara melalui kanal kontak resminya.',
                    ],
                ],
            ],
            'syarat-ketentuan' => [
                'title' => 'Syarat & Ketentuan',
                'intro' => 'Panduan sederhana menggunakan situs Derap Serayu.',
                'sections' => [
                    [
                        'heading' => 'Akses situs',
                        'body' => 'Artikel publik dapat dibaca tanpa membuat akun. Akun pembaca bersifat opsional dan diperlukan untuk menyimpan artikel serta menggunakan menu profil.',
                    ],
                    [
                        'heading' => 'Penggunaan yang wajar',
                        'body' => 'Gunakan situs dan akun secara bertanggung jawab. Jangan mencoba mengakses akun, data, atau bagian situs yang bukan hakmu.',
                    ],
                    [
                        'heading' => 'Informasi dan perubahan',
                        'body' => 'Isi berita dan informasi dapat diperbarui. Jika menemukan informasi yang perlu ditinjau, sampaikan melalui kanal kontak resmi Pemerintah Kabupaten Banjarnegara.',
                    ],
                ],
            ],
            'pedoman-media-siber' => [
                'title' => 'Pedoman Media Siber',
                'intro' => 'Prinsip penyajian informasi dan penanganan koreksi di Derap Serayu.',
                'sections' => [
                    [
                        'heading' => 'Akurasi informasi',
                        'body' => 'Informasi disajikan dengan mengutamakan kejelasan sumber dan konteks. Pembaca dapat menyampaikan koreksi jika menemukan kekeliruan.',
                    ],
                    [
                        'heading' => 'Koreksi dan klarifikasi',
                        'body' => 'Permintaan koreksi atau klarifikasi dapat disampaikan melalui kanal kontak resmi Pemerintah Kabupaten Banjarnegara agar dapat ditindaklanjuti oleh pengelola informasi.',
                    ],
                    [
                        'heading' => 'Kontak resmi',
                        'body' => 'Gunakan halaman resmi Pemerintah Kabupaten Banjarnegara untuk menemukan kanal kontak yang tersedia.',
                        'url' => 'https://banjarnegarakab.go.id/',
                        'link_text' => 'Buka situs resmi Banjarnegara',
                    ],
                ],
            ],
        ];

        abort_unless(isset($pages[$page]), 404);

        return view('information.show', ['page' => $pages[$page]]);
    }
}
