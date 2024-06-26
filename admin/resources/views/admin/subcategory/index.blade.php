@extends('admin.layouts.app')

@section('title', 'Управление подкатегориями')

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
      <h5 class="card-header">Управление подкатегориями</h5>
      @if(session()->has('success'))
        <div class="alert alert-success text-center">{{ session()->get('success') }}</div>
      @endif
      <form class="form-inline" method="get">
        <div class="d-flex align-items-center justify-content-between">
          <div class="d-flex align-items-center">
            <div class="form-group mx-sm-3 mb-2">
              <input type="text" class="form-control" name="search" placeholder="Найти подкатегорию">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Найти</button>
          </div>
          <a href="{{ route('admin.subcategory.create') }}" class="btn btn-primary text-white mb-2">Добавить подкатегорию</a>
        </div>
      </form>
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
          <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Категория</th>
            <th class="text-center">Изменить</th>
            <th class="text-center">Удалить</th>
          </tr>
          </thead>
          <tbody class="table-border-bottom-0">
          @foreach($subCategories as $category)
            <tr>
              <td>{{ $category->id }}</td>
              <td>{{ $category->name }}</td>
              <td>{{ $category->category->name }}</td>
              <td class="text-center">
                <a href="{{ route('admin.subcategory.edit', $category->id) }}">
                  <img src="{{ asset('icons/edit.png') }}" alt="watch">
                </a>
              </td>
              <td class="text-center">
                <form action="{{ route('admin.subcategory.delete', $category->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit" style="background: none; border: none">
                    <img src="{{ asset('icons/delete.png') }}" alt="watch">
                  </button>
                </form>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
