<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class PostTopic extends Model
{
    CONST MODEL_NAME=null;

    use HasFactory;

    protected $table = 'website_posts_topics';
    protected $fillable = [
        'post_id',
        'topic_id',
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
     * Get the posts relationship.
     *
     */
    public function posts()
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * Get the topic relationship.
     *
     */
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
