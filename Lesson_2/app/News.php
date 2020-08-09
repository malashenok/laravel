<?php

namespace App;

class News
{

    private static $news = [
        1 => [
            'id' => 1,
            'title' => 'Заголовок новость 1',
            'text' => 'Текст новость 1',
            'category_id' => 1
        ],
        2 => [
            'id' => 2,
            'title' => 'Заголовок новость 2',
            'text' => 'Текст новость 2',
            'category_id' => 2
        ],
        3 => [
            'id' => 3,
            'title' => 'Заголовок новость 3',
            'text' => 'Текст новость 3',
            'category_id' => 3
        ],
        4 => [
            'id' => 42,
            'title' => 'Заголовок новость 4',
            'text' => 'Текст новость 4',
            'category_id' => 1
        ],
        5 => [
            'id' => 9,
            'title' => 'Заголовок новость 5',
            'text' => 'Текст новость 5',
            'category_id' => 2
        ],
    ];

    public static function getNews() {
        return static::$news;
    }

    public static function getNewsById($id) {
        return array_key_exists($id, static::getNews()) ? static::getNews()["$id"] : [];
    }

    public static function getNewsByCategoryId($id) {
        $news = [];

        foreach(News::getNews() as $key => $value) {
            if($value['category_id'] === $id) {
                $news["$key"] = $value;
            }
        }
        return $news;
    }
}
