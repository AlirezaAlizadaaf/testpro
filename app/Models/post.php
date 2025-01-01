<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;



    protected $guarded;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tag()
    {
        return $this->belongsToMany(tag::class);
    }
    public function comment()
    {
        return $this->hasMany(comment::class);
    }
    protected static function boot()
    {
        parent::boot();

        self::deleting(function ($post) {
            $post->comment->each->delete();
        });


    }
}
