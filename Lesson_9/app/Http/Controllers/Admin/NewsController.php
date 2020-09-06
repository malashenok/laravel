<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::query()->paginate(5);
        return view('admin.news.index')->with('news', $news);
    }

    public function create() {

        $news = new News();

        return view('admin.news.create', [
            'news' => $news,
            'categories' => Category::query()->select(['id', 'text'])->get()
        ]);
    }

    public function update(Request $request, News $news)
    {
        if ($news->fill($request->all())->save()) {
            return redirect()->route('admin.news.index')->with('success', 'Новость изменена успешно!');
        } else {
            return redirect()->route('admin.news.index')->with('error', 'Ошибка изменения новости!');
        }
    }

    public function destroy(News $news)
    {
        if ($news->delete()) {
            return redirect()->route('admin.news.index')->with('success', 'Новость удалена успешно!');
        } else {
            return redirect()->route('admin.news.index')->with('error', 'Ошибка удаления новости');
        }
    }

    public function edit(News $news)
    {
        return view('admin.news.create', [
            'news' => $news,
            'categories' => Category::all(),
            'category_id' => $news->category->id
        ]);
    }

    public function store(Request $request) {

        $news = new News();

        if ($news->fill($request->all())->save()) {
            return redirect()->route('NewsOne', $news->id)->with('success', 'Новость добавлена успешно!');
        } else {
            return redirect()->route('admin.news.create')->with('error', 'Ошибка добавления новости!');
        }
    }
}
