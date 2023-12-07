<?php

namespace App\Http\Controllers\Admin\Size;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Size\StoreRequest;
use App\Http\Requests\Admin\Size\UpdateRequest;
use App\Models\Category;
use App\Models\Size;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SizeController extends Controller
{
    public function index(): View
    {
        $sizes = Size::all();
        return view('admin.size.index', compact('sizes'));
    }

    public function create(): View
    {
        $categories = Category::all();
        return view('admin.size.create', compact('categories'));
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        Size::query()->create($request->validated());
        session()->flash('success', 'Размер успешно добавлен');
        return redirect()->route('admin.size.index');
    }

    public function edit(Size $size): View
    {
        $categories = Category::all();
        return view('admin.size.edit', compact('size', 'categories'));
    }

    public function update(UpdateRequest $request, Size $size): RedirectResponse
    {
        $size->update($request->validated());
        session()->flash('success', 'Размер ' . $size->name . ' успешно обновлен');
        return redirect()->route('admin.size.index');
    }

    public function destroy(Size $size): RedirectResponse
    {
        session()->flash('success', 'Размер ' . $size->name . ' успешно удален');
        $size->delete();
        return redirect()->back();
    }
}
