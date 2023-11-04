@extends('admin.layouts.app')

@section('title', 'Создание категории')

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
      <div class="card-body">
        <h4 class="mb-2">Добавить новую категорию</h4>

        <form class="mb-3" action="{{ route('admin.category.store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label class="form-label">Название</label>
            @error('name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <input type="text" class="form-control" name="name" placeholder="Введите название категории">
          </div>
          <div class="mb-3">
            <button class="btn btn-primary d-grid w-100" type="submit">Добавить</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
