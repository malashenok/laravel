<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    public $timestamps = true;
    protected $fillable = ['link'];

    public static function rules() {
        return [
            'link' => 'required|url|min:10|max:200',
        ];
    }

    public static function attrNames() {
        return [
            'link' => 'Заголовок',
        ];
    }
}
