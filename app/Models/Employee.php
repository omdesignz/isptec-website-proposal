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


class Employee extends Model implements HasMedia
{
    CONST MODEL_NAME='Colaborador';

    use SoftDeletes, HasTranslations, InteractsWithMedia;

    public $translatable = ['description'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'website_employees';

    protected $dates = ['dob'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'receive_bday_notification' => 'boolean',
        'is_lecturer' => 'boolean',
        'is_national' => 'boolean',
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name',
        'email',
        'receive_bday_notification',
        'is_national',
        'is_lecturer',
        'tel_no',
        'orcid_id',
        'description',
        'extension',
        'dob',
        'gender',
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
     * Get the footprints relationship.
     *
     * @return hasMany
     */
    public function footprints()
    {
        return $this->hasMany(AcademicFootprint::class, 'employee_id');
    }

    public function scopeIsBirthday() {
        return $this->dob->isBirthday();
    }

    /**
     * Get the user's age.
     *
     * @param  string  $value
     * @return string
     */
    public function getAgeAttribute()
    {
        return $this->dob ? Carbon::parse($this->dob)->age : 0;
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('full_name', 'like', '%'.$search.'%')
                        ->orWhere('email', 'like', '%'.$search.'%');
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
        $this->addMediaCollection('avatar')
            ->acceptsMimeTypes([
                'image/jpeg',
                'image/png'
                ])
            ->useFallbackUrl('/images/avatar-1.jpg')
            ->useFallbackPath(public_path('/images/avatar-1.jpg'))
            ->singleFile();
            
            $this->addMediaCollection('documents');     
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(50)
            ->height(50)
            ->sharpen(10);
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
