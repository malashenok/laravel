<?php

namespace App\Http\Controllers\Admin;

use App\{Category, News};
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public function index() {

        if (News::all()->count() != 0) {
            return redirect()->route('Category')->with('error', 'Новости уже были загружены ранее.');
        }

        $news = [];

        foreach (Category::all() as $category) {

            $xml = XmlParser::load("https://news.yandex.ru/{$category->slug}.rss");
            $data = $xml->parse([
                'news' => ['uses' => 'channel.item[title,description,link]'],
            ]);

            foreach($data['news'] as $item) {
                $news[] = [
                    'title' => $item['title'],
                    'text' => $item['description'],
                    'isPrivate' => false,
                    'category_id' => $category->id,
                    'link'=> $item['link'],
                ];
            }
        }

        DB::table('news')->insert($news);

        return redirect()->route('Category')->with('success', 'Новости были добавлены.');
    }
}
