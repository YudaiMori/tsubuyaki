<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use ModelConfig;

    /**
     * Increment OFF
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'image_path'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'image_url'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public  function comments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    /**
     * 画像URL
     * @return |null
     */
    public function getImageUrlAttribute()
    {
        if (Storage::disk('public')->exists($this->image_path)) {
            return $this->attributes['image_url'] = Storage::disk('public')->url($this->image_path);
        }

        return null;
    }
}
