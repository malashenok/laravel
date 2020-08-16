<?php

namespace App;

use Illuminate\Support\Facades\Storage;

class Category
{
    private static $catStorage = 'categories.json';

    public static function getCategories() {
        return json_decode(Storage::get(static::$catStorage), true);
    }

    public static function getCategoryBySlug($slug) {
        $index = array_search($slug, array_column(Category::getCategories(),'slug'));
        return $index !== false ? Category::getCategories()["$index"] : [];
    }

    public static function getCategorySlugById($id) {
        $index = array_search($id, array_column(Category::getCategories(),'id'));
        return $index !== false ? Category::getCategories()["$index"] : [];
    }
}
