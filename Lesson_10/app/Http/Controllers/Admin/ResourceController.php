<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Resource::query()->paginate(10);
        return view('admin.resources.index')->with('resources', $resources);
    }

    public function create() {

        $resource = new Resource();

        return view('admin.resources.create', [
            'resource' => $resource
        ]);
    }

    public function update(Request $request, Resource $resource) {
        if($this->validatedAndSave($request, $resource)) {
            return redirect()->route('admin.resources.index')->with('success', 'Источник изменен успешно!');
        } else {
            return redirect()->route('admin.resources.index')->with('error', 'Ошибка изменения источника!');
        }
    }

    public function store(Request $request)
    {
        $resource = new Resource();

        if($this->validatedAndSave($request, $resource)) {
            return redirect()->route('admin.resources.index')->with('success', 'Источник добавлен успешно!');
        } else {
            return redirect()->route('admin.resources.index')->with('error', 'Ошибка добавления источника!');
        }
    }

    public function edit(Resource $resource) {
        return view('admin.resources.create', [
            'resource' => $resource
        ]);
    }

    public function destroy(Resource $resource) {
        if ($resource->delete()) {
            return redirect()->route('admin.resources.index')->with('success', 'Источник удален.');
        } else {
            return redirect()->route('admin.resources.index')->with('error', 'Ошибка удаления источника.');
        }
    }

    private function validatedAndSave(Request $request, Resource &$resource) {
        $this->validate($request, Resource::rules(), [] , Resource::attrNames());
        return $resource->fill($request->all())->save();
    }
}
