<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;
use App\Traits\HasTranslations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\MediaCollections\File;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;


class JournalPublication extends Model implements HasMedia
{
    CONST MODEL_NAME='Publicações: Revistas Científicas';

    use SoftDeletes, HasTranslations, InteractsWithMedia;

    public $translatable = ['title', 'summary', 'extra_data', 'journal_name'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'website_pub_journals';
    protected $dates = ['published_at'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'summary',
        'extra_data',
        'published_at',
        'external_url',
        'journal_name',
        'authors',
        'reference',
        'lecturers',
        'category_id',
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
     * Get the category relationship.
     *
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(JournalCategory::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%'.$search.'%')
                        ->orWhere('description', 'like', '%'.$search.'%');
            });
        })->when($filters['trashed'] ?? null, function ($query, $trashed) {
            if ($trashed === 'with') {
                $query->withTrashed();
            } elseif ($trashed === 'only') {
                $query->onlyTrashed();
            }
        })->when($filters['range'] ?? null, function ($query) {
            $query->whereBetween(
                'created_at',
                [
                    Carbon::parse(collect(explode(',', request('range')))->first())->startOfDay(),
                    Carbon::parse(collect(explode(',', request('range')))->last())->endOfDay()
                ]);
        });
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
            
            $this->addMediaCollection('documents');     
    }

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    // protected static function boot()
    // {
    //     parent::boot();

    //     static::deleting(function ($item) {
    //         $item->posts()->detach();
    //     });
    // }
}
