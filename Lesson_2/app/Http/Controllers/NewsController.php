<?php

namespace App\Http\Controllers;

use App\{News, Error};
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index()
    {
        return view('news.news')->with('news', News::getNews());
    }

    public function show($id) {

        $news = News::getNewsById($id);

        if (!empty($news)) {
            return view('news.newsOne')->with(
                [
                    'id' => $id,
                    'news' => $news
                ]
            );
        } else {
            return view('error')->with('error', Error::getError('noNews'));
        }
    }

}
