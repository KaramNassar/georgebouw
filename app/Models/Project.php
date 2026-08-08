<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Translatable\HasTranslations;

class Project extends Model implements HasMedia
{
    use HasFactory;
    use HasTranslations;
    use InteractsWithMedia;

    public const CATEGORIES = ['bathrooms', 'kitchens', 'electrical', 'renovations'];

    public array $translatable = [
        'title',
        'overview',
        'scope_summary',
        'deliverables',
    ];

    protected $fillable = [
        'slug',
        'category',
        'location',
        'duration',
        'title',
        'overview',
        'scope_summary',
        'deliverables',
        'video_url',
        'sort_order',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'deliverables' => 'array',
    ];

    protected static function booted(): void
    {
        static::saving(function (Project $project) {
            if (blank($project->slug) && $project->isDirty('title')) {
                $project->slug = \Illuminate\Support\Str::slug(
                    $project->getTranslation('title', 'en') ?: $project->getTranslation('title', 'nl')
                ).'-'.\Illuminate\Support\Str::random(4);
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
        return $this->getFirstMedia('image')?->getUrl($conversion ?? '');
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

    public function scopeCategory($query, ?string $category)
    {
        return ($category && $category !== 'all')
            ? $query->where('category', $category)
            : $query;
    }
}
