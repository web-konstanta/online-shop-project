@extends('admin.layouts.app')

@section('title', 'Изменение товара')

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
      <div class="card-body">
        <h4 class="mb-2">Изменить товар "{{ $product->name }}"</h4>

        <form class="mb-3" action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label class="form-label">Название</label>
            @error('name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <input type="text" class="form-control" name="name" value="{{ $product->name }}" placeholder="Измените название товара">
          </div>
          <div class="mb-3">
            <label class="form-label">Стоимость</label>
            @error('price')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <input type="number" class="form-control" name="price" value="{{ $product->price }}" placeholder="Измените стоимость товара">
          </div>
          <div class="mb-3">
            <label class="form-label">Описание</label>
            @error('description')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <textarea class="form-control" name="description" placeholder="Измените стоимость товара">{{ $product->description }}</textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Характеристики</label>
            @error('characters')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <textarea class="form-control" name="characters" placeholder="Измените характеристики товара">{{ $product->characters }}</textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Код товара</label>
            @error('code')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <input type="number" class="form-control" name="code" value="{{ $product->code }}" placeholder="Измените код товара">
          </div>
          <div class="mb-3">
            <img src="{{ $product->image ? url('storage/' . $product->image) : asset('icons/no-photo.png') }}" alt="product image">
            <input type="file" class="form-control" name="image[]" multiple>
          </div>
          <div class="mb-3">
            <label class="form-label">Категория</label>
            <select name="category_id" class="form-select" aria-label="Default select example">
              @foreach($categories as $category)
                <option
                  {{ $product->category->id === $category->id ? 'selected' : '' }}
                  value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Топ продаж</label>
            <select name="top_sales" class="form-select" aria-label="Default select example">
              <option
                {{ !$product->top_sales ? 'selected' : '' }}
                value="0">Нет</option>
              <option
                {{ $product->top_sales ? 'selected' : '' }}
                value="1">Да</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Новинка</label>
            <select name="is_new" class="form-select" aria-label="Default select example">
              <option
                {{ !$product->is_new ? 'selected' : '' }}
                value="0">Нет</option>
              <option
                {{ $product->is_new ? 'selected' : '' }}
                value="1">Да</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">В наличии</label>
            <select name="is_active" class="form-select" aria-label="Default select example">
              <option
                {{ $product->is_active ? 'selected' : '' }}
                value="1">Да</option>
              <option
                {{ !$product->is_active ? 'selected' : '' }}
                value="0">Нет</option>
            </select>
          </div>
          <div class="mb-3">
            <button class="btn btn-primary d-grid w-100" type="submit">Сохранить</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
