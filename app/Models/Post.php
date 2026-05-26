<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasTranslations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Post extends Model implements HasMedia
{
    CONST MODEL_NAME='Notícias';

    use HasFactory, SoftDeletes, HasTranslations, InteractsWithMedia;

    protected $table = 'website_posts';
    protected $dates = [
        'published_at',
    ];
    protected $fillable = [
        'slug',
        'title',
        'summary',
        'body',
        'published_at',
        'featured_image',
        'featured_image_caption',
        'user_id',
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

    public $translatable = ['body', 'title', 'slug', 'featured_image_caption', 'summary'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function topic()
    {
        return $this->belongsToMany(
            Topic::class,
            'website_posts_topics',
            'post_id',
            'topic_id'
        );
    }

    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            'website_posts_tags',
            'post_id',
            'tag_id'
        );
    }

    public function scopeRelated($query, array $args) {

        return $query->whereHas('topic', function($query) use ($args){
            $query->whereIn('topic_id', $args);
        })->latest()->take(3)->get();
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
     */
    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', now()->toDateTimeString());
    }

    /**
     * Scope a query to only include drafted posts.
     *
     */
    public function scopeDraft($query)
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
            ->useFallbackPath(public_path('/images/avatar-1.jpg'));
            
            $this->addMediaCollection('documents');  
    }


}
