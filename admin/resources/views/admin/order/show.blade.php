@extends('admin.layouts.app')

@section('title', 'Информация о заказе')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-4 font-italic">Заказ № {{ $order->id }}</h1>
      <p class="lead my-3"><span style="font-weight: 900">Имя клиента</span>: {{ $order->name }}</p>
      <p class="lead my-3"><span style="font-weight: 900">Телефон клиента</span>: {{ $order->phone }}</p>
      <p class="lead my-3"><span style="font-weight: 900">Город</span>: {{ $order->city }}</p>
      <p class="lead my-3"><span style="font-weight: 900">Адрес</span>: {{ $order->address }}</p>
      @if($order->message)
        <p class="lead my-3"><span style="font-weight: 900">Комментарий к заказу</span>: {{ $order->message }}</p>
      @endif
      <p class="lead my-3"><span style="font-weight: 900">Статус заказа</span>: {{ $order->orderStatus->name }}</p>
      <p class="lead my-3"><span style="font-weight: 900">Список товаров</span>:</p>
      <table class="table text-white">
        <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Название</th>
          <th scope="col">Количество</th>
          <th scope="col">Сумма</th>
        </tr>
        </thead>
        <tbody>
        @if($order->products->count() > 0)
          @foreach($order->products as $product)
            <tr>
              <td>{{ $product->id }}</td>
              <td>{{ $product->name }}</td>
              <td>{{ $order->orderProduct($product->id)->products_count }}</td>
              <td>{{ $product->price * $order->orderProduct($product->id)->products_count }}</td>
            </tr>
          @endforeach
          <tr>
            <td>Стоимость заказа:</td>
            <td></td>
            <td></td>
            <td>{{ $order->getTotalOrderPrice() }}</td>
          </tr>
        @endif
        </tbody>
      </table>
      <p class="lead mb-0"><a href="{{ route('admin.order.index') }}" class="btn btn-primary text-white font-weight-bold">Вернуться к списку заказов</a></p>
    </div>
  </div>
</div>
@endsection
