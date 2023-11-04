@extends('admin.layouts.app')

@section('title', 'Создание товара')

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
      <div class="card-body">
        <h4 class="mb-2">Добавить новый товар</h4>

        <form class="mb-3" action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label class="form-label">Название</label>
            @error('name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <input type="text" class="form-control" name="name" placeholder="Введите название товара">
          </div>
          <div class="mb-3">
            <label class="form-label">Стоимость</label>
            @error('price')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <input type="number" class="form-control" name="price" placeholder="Введите стоимость товара">
          </div>
          <div class="mb-3">
            <label class="form-label">Описание</label>
            @error('description')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <textarea class="form-control" name="description" placeholder="Введите стоимость товара"></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Характеристики</label>
            @error('characters')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <textarea class="form-control" name="characters" placeholder="Введите характеристики товара"></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Код товара</label>
            @error('code')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <input type="number" class="form-control" name="code" placeholder="Введите код товара">
          </div>
          <div class="mb-3">
            <label class="form-label">Изображение</label>
            <input type="file" class="form-control" name="image[]" multiple>
          </div>
          <div class="mb-3">
            <label class="form-label">Категория</label>
            <select name="category_id" class="form-select" aria-label="Default select example">
              @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Топ продаж</label>
            <select name="top_sales" class="form-select" aria-label="Default select example">
              <option value="0">Нет</option>
              <option value="1">Да</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Новинка</label>
            <select name="is_new" class="form-select" aria-label="Default select example">
              <option value="0">Нет</option>
              <option value="1">Да</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">В наличии</label>
            <select name="is_active" class="form-select" aria-label="Default select example">
              <option value="1">Да</option>
              <option value="0">Нет</option>
            </select>
          </div>
          <div class="mb-3">
            <button class="btn btn-primary d-grid w-100" type="submit">Добавить</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
