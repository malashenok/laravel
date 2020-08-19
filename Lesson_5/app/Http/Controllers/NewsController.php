<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\{News, Error};
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index()
    {
        $news = DB::table('news')->get();
        return view('news.index')->with('news', $news);
    }

    public function show($id) {

        $news = DB::table('news')->find($id);

        if (!empty($news)) {
            return view('news.one')->with([ 'id' => $id, 'news' => $news ]);
        } else {
            return view('error')->with('error', Error::getError('noNews'));
        }
    }
}
