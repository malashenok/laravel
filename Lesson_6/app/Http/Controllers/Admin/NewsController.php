<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{


    public function index()
    {
        $news = News::query()->paginate(5);
        return view('admin.news.index')->with('news', $news);
    }



    public function create(Request $request) {

        if ($request->isMethod('post')) {

            $request->flash();

            $news = new News();
            $news->fill($request->except('_token'))->save();

            return redirect()->route('admin.news.create')->with('success', 'Новость добавлена успешно!');
        }

        $news = new News();

        return view('admin.news.create', [
            'news' => $news,
            'categories' => Category::query()->select(['id', 'text'])->get()
        ]);
    }


    public function update(Request $request, News $news)
    {
        $news->fill($request->except('_token'))->save();
        return redirect()->route('admin.news.index')->with('success', 'Новость изменена успешно!');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'Новость удалена успешно!');
    }

    public function edit(News $news)
    {
        return view('admin.news.create', [
            'news' => $news,
            'categories' => Category::all()
        ]);
    }

    public function store(News $news)
    {

    }

}
