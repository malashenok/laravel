<?php

namespace App\Http\Controllers;

use App\Error;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {

        return view('news.category')->with('categories', DB::table('category')->get());
    }

    public function show($slug)
    {

        $category = DB::table('category')->where('slug',$slug)->first();

        if (empty($category->id)) {
            return view('error')->with('error', Error::getError('noCategory'));
        }

        $news = DB::table('news')->where('category_id', $category->id)->get();

        if (empty($news)) {
            return view('error')->with('error', Error::getError('noNewsByCategory'));
        } else {
            return view('news.index')->with(
                [
                    'slug' => $category->text,
                    'news' => $news
                ]
            );
        }
    }
}
