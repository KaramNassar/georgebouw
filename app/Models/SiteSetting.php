<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'whatsapp_number',
        'contact_email',
        'website_url',
        'tiktok_url',
        'instagram_url',
        'default_locale',
    ];

    /**
     * This app only ever has one settings row (id = 1).
     */
    public static function current(): self
    {
        return static::query()->firstOrCreate(['id' => 1], [
            'whatsapp_number' => '+31684954212',
            'contact_email' => 'info@georgebouw.nl',
            'website_url' => 'https://georgebouw.nl',
            'default_locale' => 'nl',
        ]);
    }

    /** WhatsApp number formatted for wa.me links (digits only, no +). */
    public function whatsappDigits(): string
    {
        return preg_replace('/\D+/', '', (string) $this->whatsapp_number);
    }
}
