<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public $timestamps = true;
    protected $fillable = ['slug', 'text'];

    public function news() {
        return $this->hasMany(News::class, 'category_id');
    }

    public static function rules() {

        return [
            'slug' => 'required|min:3|max:15|alpha_dash',
            'text' => 'required|min:3|max:15|alpha_dash'
        ];
    }

    public static function attrNames() {
        return [
            'slug' => 'Заголовок',
            'text' => 'Текст'
        ];
    }
}
