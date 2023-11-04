@extends('layouts.app')

@section('title', 'Информация о заказе')

@section('content')
    <div class="container">
        <h1 class="mb-4">Информация о заказе</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Изображение товара</th>
                <th scope="col">Название товара</th>
                <th scope="col">Количество</th>
                <th scope="col">Сумма (грн)</th>
            </tr>
            </thead>
            <tbody>
            @if($order->products->count() > 0)
                @foreach($order->products as $product)
                    <tr>
                        <td>
                            <img src="{{ $product->getImage() }}" width="100">
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $order->orderProductCount($product->id) }}</td>
                        <td>{{ $product->price * $order->orderProductCount($product->id) }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td>Общая стоимость заказа:</td>
                    <td></td>
                    <td></td>
                    <td>{{ $order->getTotalOrderPrice() }}</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
@endsection
