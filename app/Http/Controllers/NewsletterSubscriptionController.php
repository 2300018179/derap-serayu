<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscription;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsletterSubscriptionController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            ['email' => ['required', 'string', 'email:rfc', 'max:255']],
            [
                'email.required' => 'Alamat email wajib diisi.',
                'email.email' => 'Masukkan alamat email yang valid.',
                'email.max' => 'Alamat email maksimal 255 karakter.',
            ]
        );

        NewsletterSubscription::firstOrCreate([
            'email' => Str::lower($validated['email']),
        ]);

        return back()->with(
            'newsletterStatus',
            'Terima kasih! Email kamu sudah terdaftar untuk menerima kabar terbaru.'
        );
    }
}
