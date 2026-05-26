<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasTranslations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;


class EventSpeaker extends Model implements HasMedia
{
    CONST MODEL_NAME=null;

    use HasFactory, SoftDeletes, HasTranslations, InteractsWithMedia;

    protected $table = 'website_event_speakers';
    protected $dates = [];
    protected $fillable = [
        'full_name',
        'topic',
        'contact',
        'bio',
        'event_id',
        'permissions'
    ];

    /**
     * Get the permissions.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function perms(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    } 

    public $translatable = ['topic', 'bio'];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatar')
            ->acceptsMimeTypes([
                'image/jpeg',
                'image/png',
                'image/gif',
                ])
            ->useFallbackUrl('/images/avatar-1.jpg')
            ->useFallbackPath(public_path('/images/avatar-1.jpg'))
            ->singleFile();   
    }
}
