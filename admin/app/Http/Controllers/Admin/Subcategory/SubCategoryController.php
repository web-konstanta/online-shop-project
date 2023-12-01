<?php

namespace App\Http\Controllers\Admin\Subcategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Subcategory\StoreRequest;
use App\Http\Requests\Admin\Subcategory\UpdateRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SubCategoryController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->input('search');
        $subCategories = $search
          ? SubCategory::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orderBy('created_at', 'DESC')
            ->get()
          : SubCategory::query()
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('admin.subcategory.index', compact('subCategories'));
    }

    public function show(SubCategory $subCategory): View
    {
        return view('admin.subcategory.show', compact('subCategory'));
    }

    public function create(): View
    {
        $categories = Category::all();
        return view('admin.subcategory.create', compact('categories'));
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $subCategory = SubCategory::query()->create([
            'name' => $data['name'],
            'code' => $data['name'],
            'category_id' => $data['category_id']
        ]);
        session()->flash('success', 'Подкатегория ' . $subCategory->name . ' успешно добавлена');
        return redirect()->route('admin.subcategory.index');
    }

    public function edit(SubCategory $subCategory): View
    {
        $categories = Category::all();
        return view('admin.subcategory.edit', compact('subCategory', 'categories'));
    }

    public function update(SubCategory $subCategory, UpdateRequest $request): RedirectResponse
    {
        $subCategory->update($request->validated());
        session()->flash('success', 'Подкатегория ' . $subCategory->name . ' успешно обновлена');
        return redirect()->route('admin.subcategory.index');
    }

    public function destroy(SubCategory $subCategory): RedirectResponse
    {
        session()->flash('success', 'Подкатегория ' . $subCategory->name . ' успешно удалена');
        $subCategory->delete();
        return redirect()->route('admin.subcategory.index');
    }
}
