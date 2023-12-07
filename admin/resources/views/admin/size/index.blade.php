@extends('admin.layouts.app')

@section('title', 'Управление размерами товаров')

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
      <h5 class="card-header">Список размеров</h5>
      @if(session()->has('success'))
        <div class="alert alert-success text-center">{{ session()->get('success') }}</div>
      @endif
      <div class="d-flex justify-content-between">
        <div></div>
        <a href="{{ route('admin.size.create') }}" class="btn btn-primary text-white mb-2">Добавить размер</a>
      </div>
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
          <tr>
            <th>Размер</th>
            <th>Пренадлежность</th>
            <th class="text-center">Изменить</th>
            <th class="text-center">Удалить</th>
          </tr>
          </thead>
          <tbody class="table-border-bottom-0">
          @forelse($sizes as $size)
            <tr>
              <td>{{ $size->name }}</td>
              <td>{{ $size->category->name }}</td>
              <td class="text-center">
                <a href="{{ route('admin.size.edit', $size->id) }}">
                  <img src="{{ asset('icons/edit.png') }}" alt="watch">
                </a>
              </td>
              <td class="text-center">
                <form action="{{ route('admin.size.delete', $size->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit" style="background: none; border: none">
                    <img src="{{ asset('icons/delete.png') }}" alt="watch">
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td>Размеры отсутствуют</td>
            </tr>
          @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
