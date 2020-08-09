<?php

namespace App;

class Category
{
    private static $categories = [
       [
            'id' => 1,
            'slug' => 'Politics',
            'text' => 'Политика',
        ],
        [
            'id' => 2,
            'slug'=> 'Sport',
            'text' => 'Спорт',
        ],
        [
            'id' => 3,
            'slug'=> 'Economics',
            'text' => 'Экономика',
        ]
    ];

    public static function getCategories() {
        return static::$categories;
    }

    public static function getCategoryBySlug($slug) {
        $index = array_search($slug, array_column(Category::getCategories(),'slug'));
        return $index === false ? [] : Category::getCategories()["$index"];
    }

}
