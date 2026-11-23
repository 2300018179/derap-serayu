<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AdminSiteSettingController extends Controller
{
    public function edit(): View
    {
        return view('admin.settings', [
            'settings' => SiteSetting::currentSettings(),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'site_name' => ['required', 'string', 'max:80'],
            'tagline' => ['required', 'string', 'max:160'],
            'primary_color' => ['required', 'regex:/\A#[0-9A-Fa-f]{6}\z/'],
            'accent_color' => ['required', 'regex:/\A#[0-9A-Fa-f]{6}\z/'],
            'background_mode' => ['required', 'in:color,image'],
            'background_color' => ['required', 'regex:/\A#[0-9A-Fa-f]{6}\z/'],
            'background_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'banner' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'remove_logo' => ['nullable', 'boolean'],
            'remove_banner' => ['nullable', 'boolean'],
            'remove_background_image' => ['nullable', 'boolean'],
            'login_bg_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'remove_login_bg_image' => ['nullable', 'boolean'],
            'register_bg_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'remove_register_bg_image' => ['nullable', 'boolean'],
            'reset_password_bg_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'remove_reset_password_bg_image' => ['nullable', 'boolean'],
            'home_eyebrow' => ['required', 'string', 'max:100'],
            'home_heading' => ['required', 'string', 'max:180'],
            'home_description' => ['required', 'string', 'max:500'],
            'contact_email' => ['nullable', 'email', 'max:255'],
            'contact_phone' => ['nullable', 'string', 'max:40'],
            'instagram_url' => ['nullable', 'url:http,https', 'max:255'],
            'facebook_url' => ['nullable', 'url:http,https', 'max:255'],
            'youtube_url' => ['nullable', 'url:http,https', 'max:255'],
            'tiktok_url' => ['nullable', 'url:http,https', 'max:255'],
            'x_url' => ['nullable', 'url:http,https', 'max:255'],
            'footer_description' => ['required', 'string', 'max:500'],
            'footer_quote' => ['required', 'string', 'max:300'],
            'footer_copyright' => ['required', 'string', 'max:200'],
        ]);

        $previousSettings = SiteSetting::currentSettings();
        $previousBackgroundImage = $previousSettings['background_image_path'];
        $hasPreviousBackgroundImage = $previousBackgroundImage
            && Storage::disk('public')->exists($previousBackgroundImage);
        $backgroundImage = $request->file('background_image');

        if (
            $validated['background_mode'] === 'image'
            && ! ($backgroundImage instanceof UploadedFile)
            && (! $hasPreviousBackgroundImage || $request->boolean('remove_background_image'))
        ) {
            throw ValidationException::withMessages([
                'background_image' => 'Pilih gambar latar terlebih dahulu.',
            ]);
        }

        $settings = array_replace(
            $previousSettings,
            Arr::only($validated, [
                'site_name',
                'tagline',
                'primary_color',
                'accent_color',
                'background_mode',
                'background_color',
                'home_eyebrow',
                'home_heading',
                'home_description',
                'contact_email',
                'contact_phone',
                'instagram_url',
                'facebook_url',
                'youtube_url',
                'tiktok_url',
                'x_url',
                'footer_description',
                'footer_quote',
                'footer_copyright',
            ])
        );

        $previousLogo = $settings['logo_path'];
        $previousBanner = $settings['banner_path'];
        $previousLoginBgImage = $previousSettings['login_bg_image_path'] ?? null;
        $previousRegisterBgImage = $previousSettings['register_bg_image_path'] ?? null;
        $previousResetPasswordBgImage = $previousSettings['reset_password_bg_image_path'] ?? null;

        $logo = $request->file('logo');

        if ($logo instanceof UploadedFile) {
            $settings['logo_path'] = $this->storeImage($logo, 'logo');
        } elseif ($request->boolean('remove_logo')) {
            $settings['logo_path'] = null;
        }

        $banner = $request->file('banner');

        if ($banner instanceof UploadedFile) {
            $settings['banner_path'] = $this->storeImage($banner, 'banner');
        } elseif ($request->boolean('remove_banner')) {
            $settings['banner_path'] = null;
        }

        if ($backgroundImage instanceof UploadedFile) {
            $settings['background_image_path'] = $this->storeImage($backgroundImage, 'background_image');
        } elseif ($request->boolean('remove_background_image')) {
            $settings['background_image_path'] = null;
        }

        $loginBgImage = $request->file('login_bg_image');
        if ($loginBgImage instanceof UploadedFile) {
            $settings['login_bg_image_path'] = $this->storeImage($loginBgImage, 'login_bg_image');
        } elseif ($request->boolean('remove_login_bg_image')) {
            $settings['login_bg_image_path'] = null;
        }

        $registerBgImage = $request->file('register_bg_image');
        if ($registerBgImage instanceof UploadedFile) {
            $settings['register_bg_image_path'] = $this->storeImage($registerBgImage, 'register_bg_image');
        } elseif ($request->boolean('remove_register_bg_image')) {
            $settings['register_bg_image_path'] = null;
        }

        $resetPasswordBgImage = $request->file('reset_password_bg_image');
        if ($resetPasswordBgImage instanceof UploadedFile) {
            $settings['reset_password_bg_image_path'] = $this->storeImage($resetPasswordBgImage, 'reset_password_bg_image');
        } elseif ($request->boolean('remove_reset_password_bg_image')) {
            $settings['reset_password_bg_image_path'] = null;
        }

        SiteSetting::query()->updateOrCreate(
            ['id' => 1],
            ['settings' => $settings]
        );

        if ($previousLogo && $previousLogo !== $settings['logo_path']) {
            Storage::disk('public')->delete($previousLogo);
        }

        if ($previousBanner && $previousBanner !== $settings['banner_path']) {
            Storage::disk('public')->delete($previousBanner);
        }

        if ($previousBackgroundImage && $previousBackgroundImage !== $settings['background_image_path']) {
            Storage::disk('public')->delete($previousBackgroundImage);
        }

        if ($previousLoginBgImage && $previousLoginBgImage !== ($settings['login_bg_image_path'] ?? null)) {
            Storage::disk('public')->delete($previousLoginBgImage);
        }

        if ($previousRegisterBgImage && $previousRegisterBgImage !== ($settings['register_bg_image_path'] ?? null)) {
            Storage::disk('public')->delete($previousRegisterBgImage);
        }

        if ($previousResetPasswordBgImage && $previousResetPasswordBgImage !== ($settings['reset_password_bg_image_path'] ?? null)) {
            Storage::disk('public')->delete($previousResetPasswordBgImage);
        }

        return redirect()->route('admin.settings.edit')
            ->with('success', 'Pengaturan website berhasil disimpan.');
    }

    private function storeImage(UploadedFile $file, string $field): string
    {
        $path = $file->store('site', 'public');

        if (! is_string($path)) {
            throw ValidationException::withMessages([
                $field => 'File gagal disimpan. Silakan coba unggah kembali.',
            ]);
        }

        return $path;
    }
}
