@extends('admin.layouts.app')

@section('title', 'Создание подкатегории')

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
      <div class="card-body">
        <h4 class="mb-2">Добавить новую подкатегорию</h4>

        <form class="mb-3" action="{{ route('admin.subcategory.store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label class="form-label">Название</label>
            @error('name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <input type="text" class="form-control" name="name" placeholder="Введите название категории">
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
            <button class="btn btn-primary d-grid w-100" type="submit">Добавить</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
