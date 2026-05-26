<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;
use App\Traits\HasTranslations;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;


class LTCSession extends Model
{
    CONST MODEL_NAME='Centro de Ensino e Línguas: Sessões do Clube de Leitura';

    use HasFactory, SoftDeletes, HasTranslations;

    public $translatable = ['topic', 'description', 'venue'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'website_cel_sessions';

    protected $dates = ['start_time', 'end_time'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'topic',
        'slug',
        'description',
        'date',
        'venue',
        'start_time',
        'end_time',
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

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('topic', 'like', '%'.$search.'%')
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
    /**
     * Get the category relationship.
     *
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(LTCMembershipCategory::class);
    }
}
