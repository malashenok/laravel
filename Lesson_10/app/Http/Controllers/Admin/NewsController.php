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
        $news = News::query()->paginate(10);
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

        $data = $request->all();
        $data['image'] = !empty($data['image']) ? $this->saveImage($request) : $news->image;


        if ($news->fill($data)->save()) {
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

        $data = $request->all();
        $data['image'] = $this->saveImage($request);

        if ($news->fill($data)->save()) {
            return redirect()->route('NewsOne', $news->id)->with('success', 'Новость добавлена успешно!');
        } else {
            return redirect()->route('admin.news.create')->with('error', 'Ошибка добавления новости!');
        }
    }

    protected function saveImage(Request $request) {
        $name = null;
        if ($request->file('image')) {
            $path = \Storage::putFile('public/images', $request->file('image'));
            $name = \Storage::url($path);
        }

        return $name;
    }
}
