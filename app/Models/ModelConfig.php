<?php

namespace App\Models;

use Illuminate\Support\Str;

trait ModelConfig
{

    /**
     * Model 設定
     *
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = str::uuid();
        });
    }

}