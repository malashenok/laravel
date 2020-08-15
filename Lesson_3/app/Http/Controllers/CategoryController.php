<?php

namespace App\Http\Controllers;

use App\{Category, Error, News};

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('news.category')->with('categories', Category::getCategories());
    }

    public function show($slug)
    {

        $category = Category::getCategoryBySlug($slug);
        if (empty($category)) {
            return view('error')->with('error', Error::getError('noCategory'));
        }

        $news = News::getNewsByCategoryId($category['id']);

        if (empty($news)) {
            return view('error')->with('error', Error::getError('noNewsByCategory'));
        } else {
            return view('news.index')->with(
                [
                    'slug' => $category['text'],
                    'news' => $news
                ]
            );
        }
    }
}
