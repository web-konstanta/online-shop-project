@extends('admin.layouts.app')

@section('title', 'Управление заказами')

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
      <h5 class="card-header">Список заказов</h5>
      @if(session()->has('success'))
        <div class="alert alert-success text-center">{{ session()->get('success') }}</div>
      @endif
      <form class="form-inline" method="get">
        <div class="d-flex align-items-center justify-content-between">
          <div class="d-flex align-items-center">
            <div class="form-group mx-sm-3 mb-2">
              <input type="text" class="form-control" name="search" placeholder="Найти заказ">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Найти</button>
          </div>
        </div>
      </form>
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
          <tr>
            <th>ФИО покупателя</th>
            <th>Телефон покупателя</th>
            <th>Дата оформления</th>
            <th>Статус</th>
            <th class="text-center">Просмотреть</th>
            <th class="text-center">Изменить</th>
            <th class="text-center">Удалить</th>
          </tr>
          </thead>
          <tbody class="table-border-bottom-0">
          @forelse($orders as $order)
            <tr>
              <td>{{ $order->name }}</td>
              <td>{{ $order->phone }}</td>
              <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y') }}</td>
              <td>{{ $order->orderStatus->name }}</td>
              <td class="text-center">
                <a href="{{ route('admin.order.show', $order->id)  }}">
                  <img src="{{ asset('icons/watch.png') }}" alt="watch">
                </a>
              </td>
              <td class="text-center">
                <a href="{{ route('admin.order.edit', $order->id) }}">
                  <img src="{{ asset('icons/edit.png') }}" alt="watch">
                </a>
              </td>
              <td class="text-center">
                <form action="{{ route('admin.order.delete', $order->id) }}" method="post">
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
              <td>Заказы отсутствуют</td>
            </tr>
          @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
