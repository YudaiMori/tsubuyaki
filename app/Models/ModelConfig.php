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

    /**
     * カラム配列で取得
     * @return array
     */
    public function attributes()
    {
        return $this->attributesToArray();
    }

}