<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()->paginate(5);
        return view('admin.category.index')->with('categories', $categories);
    }

    public function create()
    {
        $category = new Category();
        return view('admin.category.create', [
            'category' => $category
        ]);
    }

    public function store(Request $request)
    {
        $category = new Category();

        if($this->validatedAndSave($request, $category)) {
            return redirect()->route('admin.category.create')->with('success', 'Категория добавлена успешно!');
        } else {
            return redirect()->route('admin.category.index')->with('error', 'Ошибка добавления категории!');
        }
    }

     public function show(Category $category)
    {
        return view('admin.category.destroy', [
            'category' => $category
        ]);
    }

    public function edit(Category $category)
    {
        return view('admin.category.create', [
            'category' => $category
        ]);

    }

    public function update(Request $request, Category $category)
    {
        if($this->validatedAndSave($request, $category)) {
            return redirect()->route('admin.category.index')->with('success', 'Категория изменена успешно!');
        } else {
            return redirect()->route('admin.category.index')->with('error', 'Ошибка изменения категории!');
        }
    }

    public function destroy(Category $category)
    {
        $category->news->each->delete();
        if ($category->delete()) {
            return redirect()->route('admin.category.index')->with('success', 'Категория удалена успешно!');
        } else {
            return redirect()->route('admin.category.index')->with('error', 'Ошибка удаления категории!');
        }
    }

    private function validatedAndSave(Request $request, Category &$category) {
        $this->validate($request, Category::rules(), [] , Category::attrNames());
        return $category->fill($request->all())->save();
    }
}
