<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index() {
        return view('admin.index');
    }



    public function download(Request $request) {

        if ($request->isMethod('POST')) {

            $category_id = (int)$request->input('category');

            $category = DB::table('category')->find($category_id);

            $filename = "news_" . $category->slug . "_" . date('YmdHis') . ".json";

            return response()->json(DB::table('news')->where('category_id', $category_id)->get())
                ->header('Content-Disposition', "attachment; filename = {$filename}")
                ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        }

        return view('admin.getNews')->with('categories', DB::table('category')->get());
    }


    public function delete(Request $request) {

        if ($request->isMethod('post')) {
            $id = (int)$request->input('news_id');

            DB::table('news')->where('id', $id)->delete();

            return view('news.category')->with('categories', DB::table('category')->get());
        }
        return view('admin.delNews')->with('news', DB::table('news')->get());
    }
}
