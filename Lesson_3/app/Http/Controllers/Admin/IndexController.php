<?php

namespace App\Http\Controllers\Admin;

use App\{Category, News};
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        return view('admin.index');
    }

    public function addNews() {
        return view('admin.addNews')->with('categories', Category::getCategories());
    }

    public function delNews() {
        return view('admin.delNews')->with('news', News::getNews());
    }

}
