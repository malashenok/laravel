<?php

namespace App;

class Error
{
    private static $errors = [
        'noNews' => 'новость не найдена',
        'noCategory' => 'категория новостей не найдена',
        'noNewsByCategory' => 'новости по этой категории не найдены',
    ];

    public static function getError($type) {
        return static::$errors["$type"];
    }
}
