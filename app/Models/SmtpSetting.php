<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class SmtpSetting extends Model
{
    protected $guarded = [];

    /**
     * Pulls SMTP settings from DB and overrides Laravel's runtime
     * mail config, so Mail::send() uses these instead of .env values.
     * Safe to call even before migrations run / table is empty.
     */
    public static function apply(): void
    {
        if (!Schema::hasTable('smtp_settings')) {
            return;
        }

        $settings = static::first();

        if (!$settings || empty($settings->mail_host)) {
            return; // fall back to .env defaults untouched
        }

        config([
            'mail.default' => $settings->mail_mailer ?: 'smtp',
            'mail.mailers.smtp.host' => $settings->mail_host,
            'mail.mailers.smtp.port' => $settings->mail_port,
            'mail.mailers.smtp.username' => $settings->mail_username,
            'mail.mailers.smtp.password' => $settings->mail_password,
            'mail.mailers.smtp.encryption' => $settings->mail_encryption ?: null,
            'mail.from.address' => $settings->mail_from_address ?: $settings->mail_username,
            'mail.from.name' => $settings->mail_from_name ?: config('app.name'),
            'mail.admin_enquiry_email' => $settings->admin_enquiry_email,
        ]);
    }

    public static function adminEmail(): string
    {
        $settings = static::first();

        return $settings->admin_enquiry_email
            ?? config('mail.admin_enquiry_email')
            ?? 'admin@example.com';
    }
}