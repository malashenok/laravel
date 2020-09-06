<?php

namespace App\Http\Controllers;

use App\Category;
use App\Error;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()->paginate(10);
        return view('news.category')->with('categories', $categories);
    }

    public function show($slug)
    {
        $category = Category::firstWhere('slug', $slug);
        if ($category) {
            return view('news.many')->with(
                [
                    'slug' => $category->text,
                    'news' => $category->news()->paginate(10)
                ]
            );
        } else {
            return view('news.category')->with('categories', []);
        }
    }
}
