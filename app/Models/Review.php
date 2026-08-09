<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

class Review extends Model
{
    use HasFactory;
    use HasTranslations;

    public array $translatable = [
        'service_label',
        'quote',
    ];

    protected $fillable = [
        'client_name',
        'service_label',
        'quote',
        'rating',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'rating' => 'integer',
    ];

    protected static function booted(): void
    {
        static::saving(function (Review $review) {
            if (blank($review->slug) && $review->isDirty('service_label')) {
                $review->slug = Str::slug(
                    $review->getTranslation('service_label', 'en') ?: $review->getTranslation('service_label', 'nl')
                ).'-'.Str::random(4);
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}
