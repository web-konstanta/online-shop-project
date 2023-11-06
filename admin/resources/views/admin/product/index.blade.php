@extends('admin.layouts.app')

@section('title', 'Управление товарами')

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
      <h5 class="card-header">Список товаров</h5>
      @if(session()->has('success'))
        <div class="alert alert-success text-center">{{ session()->get('success') }}</div>
      @endif
      <form class="form-inline" method="get">
        <div class="d-flex align-items-center justify-content-between">
          <div class="d-flex align-items-center">
            <div class="form-group mx-sm-3 mb-2">
              <input type="text" class="form-control" name="search" placeholder="Найти товар">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Найти</button>
          </div>
          <a href="{{ route('admin.product.create') }}" class="btn btn-primary text-white mb-2">Добавить товар</a>
        </div>
      </form>
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
          <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Стоимость</th>
            <th class="text-center">Просмотреть</th>
            <th class="text-center">Изменить</th>
            <th class="text-center">Удалить</th>
          </tr>
          </thead>
          <tbody class="table-border-bottom-0">
          @if($products->count() > 0)
            @foreach($products as $product)
              <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td class="text-center">
                  <a href="{{ route('admin.product.show', $product->id) }}">
                    <img src="{{ asset('icons/watch.png') }}" alt="watch">
                  </a>
                </td>
                <td class="text-center">
                  <a href="{{ route('admin.product.edit', $product->id) }}">
                    <img src="{{ asset('icons/edit.png') }}" alt="watch">
                  </a>
                </td>
                <td class="text-center">
                  <form action="{{ route('admin.product.delete', $product->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="background: none; border: none">
                      <img src="{{ asset('icons/delete.png') }}" alt="watch">
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach
          @else
            <tr>
              <td>Товары отсутствуют</td>
            </tr>
          @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
