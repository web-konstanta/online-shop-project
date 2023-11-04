<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->input('search');
        $categories = $search
          ? Category::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orderBy('created_at', 'DESC')
            ->get()
          : Category::query()
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('admin.category.index', compact('categories'));
    }

    public function show(Category $category): View
    {
        return view('admin.category.show', compact('category'));
    }

    public function create(): View
    {
        return view('admin.category.create');
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $category = Category::query()->create([
            'name' => $data['name'],
            'code' => $data['name']
        ]);
        session()->flash('success', 'Категория ' . $category->name . ' успешно добавлена');
        return redirect()->route('admin.category.index');
    }

    public function edit(Category $category): View
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(Category $category, UpdateRequest $request): RedirectResponse
    {
        $category->update($request->validated());
        session()->flash('success', 'Категория ' . $category->name . ' успешно обновлена');
        return redirect()->route('admin.category.index');
    }

    public function destroy(Category $category): RedirectResponse
    {
        session()->flash('success', 'Категория ' . $category->name . ' успешно удалена');
        $category->delete();
        return redirect()->route('admin.category.index');
    }
}
