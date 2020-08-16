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

    public function create(Request $request) {

        if ($request->isMethod('post')) {
                $request->flash();
                News::saveNews($request->except('_token'));

                return redirect()->route('Category');
        }

        return view('admin.addNews')->with('categories', Category::getCategories());;
    }

    public function download(Request $request) {

        if ($request->isMethod('POST')) {

            $category_id = (int)$request->input('category');
            $category_slug = Category::getCategorySlugById($category_id)['slug'];

            $filename = "news_" . $category_slug . "_" . date('YmdHis') . ".json";

            return response()->json(News::getNewsByCategoryId($category_id))
                ->header('Content-Disposition', "attachment; filename = {$filename}")
                ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        }

        return view('admin.getNews')->with('categories', Category::getCategories());
    }


    public function delete(Request $request) {

        if ($request->isMethod('post')) {
            $category_id = (int)$request->input('category');
            News::deleteNewsByCategoryId($category_id);
            return view('news.category')->with('categories', Category::getCategories());
        }

        return view('admin.delNews')->with('news', News::getNews());
    }
}
