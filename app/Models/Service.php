<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Translatable\HasTranslations;

class Service extends Model implements HasMedia
{
    use HasFactory;
    use HasTranslations;
    use InteractsWithMedia;

    /**
     * Fields stored as {"nl": "...", "en": "..."} via spatie/laravel-translatable.
     */
    public array $translatable = [
        'name',
        'short_description',
        'long_description',
        'included',
    ];

    protected $fillable = [
        'slug',
        'icon',
        'base_price',
        'price_per_m2',
        'name',
        'short_description',
        'long_description',
        'included',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'base_price' => 'integer',
        'price_per_m2' => 'integer',
        // combined with $translatable, this casts each locale's stored value to an array
        'included' => 'array',
    ];

    protected static function booted(): void
    {
        static::saving(function (Service $service) {
            if (blank($service->slug) && $service->isDirty('name')) {
                $service->slug = \Illuminate\Support\Str::slug($service->getTranslation('name', 'en') ?: $service->getTranslation('name', 'nl'));
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')->singleFile();
        $this->addMediaCollection('gallery');
    }

    public function heroImageUrl(?string $conversion = null): ?string
    {
        $media = $this->getFirstMedia('image');

        return $media?->getUrl($conversion ?? '');
    }

    /** @return array<int, string> */
    public function galleryUrls(?string $conversion = null): array
    {
        return $this->getMedia('gallery')
            ->map(fn (Media $media) => $media->getUrl($conversion ?? ''))
            ->all();
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
