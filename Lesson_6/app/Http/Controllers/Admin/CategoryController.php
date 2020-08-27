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

    public function create(Request $request)
    {
        $category = new Category();
        return view('admin.category.create', [
            'category' => $category
        ]);
    }

    public function store(Request $request)
    {
           $category = new Category();
           $category->fill($request->except('_token'))->save();
           return redirect()->route('admin.category.create')->with('success', 'Категория добавлена успешно!');
    }

     public function show(Category $category)
    {
        return view('admin.category.create', [
            'category' => $category,
            'delete' => true
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
        $category->fill($request->except('_token'))->save();
        return redirect()->route('admin.category.index')->with('success', 'Категория изменена успешно!');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index')->with('success', 'Категория удалена успешно!');
    }
}
