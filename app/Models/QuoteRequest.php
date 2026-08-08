<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class QuoteRequest extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    public const STATUSES = ['new', 'contacted', 'quoted', 'won', 'lost'];

    protected $fillable = [
        'name',
        'email',
        'phone',
        'scope',
        'property_type',
        'size_m2',
        'urgency',
        'material',
        'budget_bracket',
        'estimate_low',
        'estimate_high',
        'locale',
        'status',
        'notes',
    ];

    protected $casts = [
        'scope' => 'array',
        'size_m2' => 'integer',
        'estimate_low' => 'integer',
        'estimate_high' => 'integer',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('photos');
    }

    public function scopeOrdered($query)
    {
        return $query->latest();
    }
}
