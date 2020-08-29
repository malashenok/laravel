<?php

namespace App;

use App\Rules\Ember;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public $timestamps = true;
    protected $fillable = ['title', 'text', 'isPrivate', 'category_id'];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public static function rules() {

        $tableNameCategory = (new Category())->getTable();

        return [
            'title' => 'covid|required|min:5|max:1024',
            'text' =>'required|min:5',
            'isPrivate' => 'sometimes|in:1',
            'category_id' => "required|exists:{$tableNameCategory},id"
        ];
    }

    public static function attrNames() {
        return [
            'title' => 'Заголовок новости',
            'text' => 'Текст новости',
            'category_id' => 'Категории новости',
            'isPrivate' => 'Приватная?'
        ];
    }
}
