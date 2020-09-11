<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Support\Facades\DB;
use App\Error;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index()
    {
        $news = News::query()->paginate(10);
        return view('news.index')->with('news', $news);
    }

    public function show(News $news) {
        return view('news.one')->with('news' , $news);
    }
}
