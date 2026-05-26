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



class CoursePlan extends Model implements HasMedia
{
    CONST MODEL_NAME='Plano Curricular';

    use HasFactory, SoftDeletes, HasTranslations, InteractsWithMedia;

    protected $table = 'website_css';
    protected $dates = [];
    protected $fillable = [
        'theoretical',
        'practical',
        'theoretical_practical',
        'weekly_hours',
        'semester_hours',
        'course_id',
        'subject_id',
        'semester_id',
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

    public $translatable = [];

        /**
     * Get the course relationship.
     *
     * @return BelongsTo
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Get the subject relationship.
     *
     * @return BelongsTo
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    /**
     * Get the semester relationship.
     *
     * @return BelongsTo
     */
    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }


    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->WhereHas('course', function($query) use ($search) {
                    $query->where('name', 'like', '%'.$search.'%');
                })
                ->orWhereHas('subject', function($query) use ($search) {
                    $query->where('name', 'like', '%'.$search.'%');
                })
                ->orWhereHas('semester', function($query) use ($search) {
                    $query->where('name', 'like', '%'.$search.'%');
                });
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
        $this->addMediaCollection('documents');     
    }
}
