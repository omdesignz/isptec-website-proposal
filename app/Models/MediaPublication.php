<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Date;
// use App\Traits\HasUuid;
use Illuminate\Support\Str;
use App\Traits\HasTranslations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\MediaCollections\File;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;



class MediaPublication extends Model implements HasMedia
{
    CONST MODEL_NAME='Publicações: Mídia';

    use HasFactory, HasTranslations, SoftDeletes, InteractsWithMedia;

    public $translatable = ['body', 'title', 'slug', 'featured_image_caption', 'summary'];
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'website_isptec_media';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body',
        'title',
        'slug',
        'featured_image_caption',
        'featured_image',
        'summary',
        'user_id',
        'published_at',
        'meta',
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


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'published_at',
    ];

    /**
     * The attributes that should be casted.
     *
     * @var array
     */
    protected $casts = [
        'meta' => 'array',
    ];

    /**
     * Get the tags relationship.
     *
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(
            MediaCategory::class,
            'website_isptec_media_cats',
            'media_id',
            'category_id'
        );
    }

    public function scopeRelated($query, array $args) {

        return $query->whereHas('categories', function($query) use ($args){
            $query->whereIn('category_id', $args);
        })->latest()->take(3)->get();
    }

    /**
     * Get the user relationship.
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%'.$search.'%');
            });
        })->when($filters['trashed'] ?? null, function ($query, $trashed) {
            if ($trashed === 'with') {
                $query->withTrashed();
            } elseif ($trashed === 'only') {
                $query->onlyTrashed();
            }
        })->when($filters['type'] ?? null, function ($query, $type) {
            if ($type === 'draft') {
                return $query->draft();
            }

            return $query->published();
        })->when($filters['topic'] ?? null, function ($query, $topic) {
            return $query->whereHas('topic', function($query, $topic) {
                $query->where('topic_id', $topic);
            });
        })->when($filters['range'] ?? null, function ($query) {
            $query->whereBetween(
                'created_at',
                [
                    Carbon::parse(collect(explode(',', request('range')))->first())->startOfDay(),
                    Carbon::parse(collect(explode(',', request('range')))->last())->endOfDay()
                ]);
        });
    }


    /**
     * Check to see if the post is published.
     *
     * @return bool
     */
    public function getPublishedAttribute(): bool
    {
        return ! is_null($this->published_at) && $this->published_at <= now()->toDateTimeString();
    }


    /**
     * Scope a query to only include published posts.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopePublished($query): Builder
    {
        return $query->where('published_at', '<=', now()->toDateTimeString());
    }

    /**
     * Scope a query to only include drafted posts.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeDraft($query): Builder
    {
        return $query->where('published_at', null)->orWhere('published_at', '>', now()->toDateTimeString());
    }


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('featured_image')
            ->acceptsMimeTypes([
                'image/jpeg',
                'image/png',
                'image/gif',
                ])
            ->useFallbackUrl('/images/avatar-1.jpg')
            ->useFallbackPath(public_path('/images/avatar-1.jpg'))
            ->singleFile();

        $this->addMediaCollection('featured_images')
            ->acceptsMimeTypes([
                'image/jpeg',
                'image/png',
                'image/gif',
                ])
            ->useFallbackUrl('/images/avatar-1.jpg')
            ->useFallbackPath(public_path('/images/avatar-1.jpg'))
            ->singleFile();
            
            $this->addMediaCollection('documents');     
    }
}
