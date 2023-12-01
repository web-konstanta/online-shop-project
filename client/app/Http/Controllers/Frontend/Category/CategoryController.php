<?php

namespace App\Http\Controllers\Frontend\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function products(Request $request, string $code): View
    {
        $search = $request->input('search');
        $category = Category::query()->where('code', $code)->first();
        $products = Product::query()
            ->where('category_id', $category->id)
            ->where('name', 'LIKE', "%{$search}%")
            ->paginate(10);

        return view('category.products', [
            'category' => $category,
            'products' => $products
        ]);
    }

    public function subCategoryProduct(Request $request, string $categoryCode, string $subCategoryCode): View
    {
        $search = $request->input('search');
        $category = Category::query()->where('code', $categoryCode)->first();
        $subCategory = SubCategory::query()->where('code', $subCategoryCode)->first();

        $products = Product::query()
            ->where('sub_category_id', $subCategory->id)
            ->where('name', 'LIKE', "%{$search}%")
            ->paginate(10);

        return view('category.sub_category-products', [
            'subCategory' => $subCategory,
            'products' => $products
        ]);
    }
}
