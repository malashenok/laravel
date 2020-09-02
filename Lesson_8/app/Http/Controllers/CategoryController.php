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
        $categories = Category::query()->paginate(5);

        return view('news.category')->with('categories', $categories);
    }

    public function show($slug)
    {
        return view('news.many')->with(
                [
                    'slug' => Category::firstWhere('slug', $slug)->text,
                    'news' => Category::firstWhere('slug', $slug)->news
                ]
        );
    }
}
