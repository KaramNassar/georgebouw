<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Translatable\HasTranslations;

class Project extends Model implements HasMedia
{
    use HasFactory;
    use HasTranslations;
    use InteractsWithMedia;

    public const VIDEO_MIME_TYPES = [
        'video/mp4',
        'video/webm',
        'video/ogg',
        'video/quicktime',
    ];

    public array $translatable = [
        'title',
        'overview',
        'scope_summary',
        'deliverables',
    ];

    protected $fillable = [
        'category_id',
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
                $project->slug = Str::slug(
                    $project->getTranslation('title', 'en') ?: $project->getTranslation('title', 'nl')
                ).'-'.Str::random(4);
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
        $this->addMediaCollection('video')
            ->acceptsMimeTypes(self::VIDEO_MIME_TYPES)
            ->singleFile();
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

    public function videoMedia(): ?Media
    {
        return $this->getFirstMedia('video');
    }

    public function uploadedVideoUrl(): ?string
    {
        return $this->videoMedia()?->getUrl();
    }

    public function uploadedVideoMimeType(): ?string
    {
        return $this->videoMedia()?->mime_type;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeCategory($query, ?string $category)
    {
        return ($category && $category !== 'all')
            ? $query->where('category_id', $category)
            : $query;
    }
}
