@extends('admin.layouts.app')

@section('title', 'Создание размера')

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
      <div class="card-body">
        <h4 class="mb-2">Добавить новый размер</h4>

        <form class="mb-3" action="{{ route('admin.size.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label class="form-label">Размер</label>
            @error('name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <input type="text" class="form-control" name="name" value="One size">
          </div>
          <div class="mb-3">
            <label class="form-label">Пренадлежность (категория)</label>
            @error('category_id')
            <p class="text-danger">{{ $message }}</p>
            @enderror
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
