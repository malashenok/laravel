<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public $timestamps = true;
    protected $fillable = ['text', 'slug'];

    public function news() {
        return $this->hasMany(News::class, 'category_id');
    }
}
