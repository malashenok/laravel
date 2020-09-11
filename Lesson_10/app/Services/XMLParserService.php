<?php


namespace App\Services;

use App\{Category, News};
use Orchestra\Parser\Xml\Facade as XmlParser;
use Illuminate\Support\Str;


class XMLParserService
{
    public function saveNews($link)
    {

        $beginDate = date('Ymd', strtotime('-3 days'));

        $xml = XmlParser::load($link);

        $data = $xml->parse([
            'news' => ['uses' => 'channel.item[guid,title,link,description,category,enclosure::url]']
        ]);

        foreach ($data['news'] as $item) {

            if ($item['category']) {
                $category = Category::query()->firstOrCreate([
                    'text' => $item['category'],
                    'slug' => str_replace('-', '', Str::slug($item['category']))
                ]);

                News::whereDate('created_at', '>', $beginDate)->firstOrCreate([
                    'title' => $item['title'],
                    'text' => trim($item['description']),
                    'isPrivate' => false,
                    'category_id' => $category->id,
                    'link' => $item['link'],
                    'image' => $item['enclosure::url'],
                ]);
            }
        }
    }
}
