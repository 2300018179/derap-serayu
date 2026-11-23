<?php

namespace App\Mail;

use App\Models\SiteSetting;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VerificationOtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $otp,
        public string $name,
        public string $role = 'Pembaca'
    ) {}

    public function envelope(): Envelope
    {
        $siteName = SiteSetting::currentSettings()['site_name'] ?? config('app.name', 'Derap Serayu');

        return new Envelope(
            subject: "Kode Verifikasi Pendaftaran {$this->role} - {$siteName}",
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.verification-otp',
            with: [
                'siteSettings' => SiteSetting::currentSettings(),
            ],
        );
    }
}
