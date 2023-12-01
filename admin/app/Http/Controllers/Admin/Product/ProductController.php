<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\Product\StoreRequest;
use App\Http\Requests\Admin\Product\UpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProductController extends BaseController
{
    public function index(Request $request): View
    {
        $search = $request->input('search');
        $products = $search
            ? Product::query()
                ->where('name', 'LIKE', "%{$search}%")
                ->orderBy('created_at', 'DESC')
                ->get()
            : Product::query()
                ->orderBy('created_at', 'DESC')
                ->get();
        return view('admin.product.index', compact('products'));
    }

    public function show(Product $product): View
    {
        return view('admin.product.show', compact('product'));
    }

    public function create(): View
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        return view('admin.product.create', compact('categories', 'subCategories'));
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if (isset($data['image'])) {
            $image = $data['image'];
            $data['image'] = $this
                ->imageService
                ->resize($image, 'product', 300, 300);
        }

        if (isset($data['images'])) {
            $images = $data['images'];
            $data['images'] = $this->imageService->saveProductImages($images);
        }

        $product = Product::query()->create($data);
        session()->flash('success', 'Товар ' . $product->name . ' успешно добавлен');
        return redirect()->route('admin.product.index');
    }

    public function edit(Product $product): View
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        return view('admin.product.edit', compact('product', 'categories', 'subCategories'));
    }

    public function update(Product $product, UpdateRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if (isset($data['image'])) {
            Storage::delete('public/' . $product->image);
            $image = $data['image'];
            $data['image'] = $this
                ->imageService
                ->resize($image, 'product', 205, 255);
        }

        if (isset($data['images'])) {
            $images = json_decode($product->images, true) ?? [];
            $this->imageService->deleteImages($images);

            $productImages = $data['images'];
            $data['images'] = $this->imageService->saveProductImages($productImages);
        }

        $product->update($data);
        session()->flash('success', 'Товар ' . $product->name . ' успешно обновлен');
        return redirect()->route('admin.product.index');
    }

    public function destroy(Product $product): RedirectResponse
    {
        session()->flash('success', 'Товар ' . $product->name . ' успешно удален');
        $images = json_decode($product->images, true);
        $images[] = $product->image;
        $this->imageService->deleteImages($images);
        $product->delete();
        return redirect()->route('admin.product.index');
    }
}
