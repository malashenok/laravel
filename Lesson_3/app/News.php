<?php

namespace App;

class News
{

    private static $news = [
        1 => [
            'id' => 1,
            'title' => 'Заголовок новость 1',
            'text' => 'Текст новость 1',
            'category_id' => 1,
            'isPrivate' => false,
        ],
        2 => [
            'id' => 2,
            'title' => 'Заголовок новость 2',
            'text' => 'Текст новость 2',
            'category_id' => 2,
            'isPrivate' => false,
        ],
        3 => [
            'id' => 3,
            'title' => 'Заголовок новость 3',
            'text' => 'Текст новость 3',
            'category_id' => 3,
            'isPrivate' => false,
        ],
        4 => [
            'id' => 42,
            'title' => 'Заголовок новость 4',
            'text' => 'Текст новость 4',
            'category_id' => 1,
            'isPrivate' => true,
        ],
        5 => [
            'id' => 9,
            'title' => 'Заголовок новость 5',
            'text' => 'Текст новость 5',
            'category_id' => 2,
            'isPrivate' => true,
        ],
        6 => [
            'id' => 22,
            'title' => 'Заголовок новость 6',
            'text' => 'Текст новость 6',
            'category_id' => 3,
            'isPrivate' => true,
        ],
        7 => [
            'id' => 36,
            'title' => 'Заголовок новость 7',
            'text' => 'Текст новость 7',
            'category_id' => 1,
            'isPrivate' => false,
        ],
        8 => [
            'id' => 4,
            'title' => 'Заголовок новость 8',
            'text' => 'Текст новость 8',
            'category_id' => 2,
            'isPrivate' => false,
        ],
        9 => [
            'id' => 7,
            'title' => 'Заголовок новость 9',
            'text' => 'Текст новость 9',
            'category_id' => 3,
            'isPrivate' => false,
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
