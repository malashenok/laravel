<?php

namespace App;

use Illuminate\Support\Facades\Storage;

class News
{

    private static $newsStorage = 'news.json';

    public static function getNews() {
        return json_decode(Storage::get(static::$newsStorage), true);
    }

    public static function saveNews($news) {

        $arr = static::getNews();

        $maxId = count($arr);
        $maxNewsId = max(array_column($arr,'id'));

        $news['id'] = ++$maxNewsId;
        $news['category_id'] = (int)$news['category_id'];
        $news['isPrivate'] = !empty($news['isPrivate']);

        $arr[++$maxId] = $news;

        Storage::put(static::$newsStorage,
            json_encode($arr, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    }

    public static function getNewsById($id) {
        return array_key_exists($id, static::getNews()) ? static::getNews()["$id"] : [];
    }

    public static function getNewsByCategoryId($id) {
        $news = [];

        foreach(static::getNews() as $key => $value) {
            if($value['category_id'] === $id) {
                $news["$key"] = $value;
            }
        }
        return $news;
    }

    public static function deleteNewsByCategoryId($id) {

        $arr = static::getNews();

        if (array_key_exists($id, $arr)) {
            unset($arr[$id]);
        }

        Storage::put(static::$newsStorage,
            json_encode($arr, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    }
}
