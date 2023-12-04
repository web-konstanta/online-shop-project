@extends('layouts.app')

@section('title', 'Корзина товаров')

@section('content')
    <table class="container table basket-products" style="font-size: 18px">
        <thead>
            <tr>
                <th>Изображение</th>
                <th>Название</th>
                <th>Количество</th>
                <th>Размер</th>
                <th>Цена</th>
                <th>Сумма</th>
                <th>Удалить</th>
            </tr>
        </thead>
        <tbody id="basketBody">
        @if($products->count() > 0)
            @foreach($products as $product)
                <tr id="product-{{ $product->id }}">
                    <td>
                        <img width="100" src="{{ $product->getImage() }}">
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>
                        (<span id="count-{{ $product->id }}">{{ $basketProducts[$product->id] }}</span>)
                        <button style="width: 40px" class="btn btn-danger" data-type="remove" data-id="{{ $product->id }}">-</button>
                        <button style="width: 40px" class="btn btn-success" data-type="add" data-id="{{ $product->id }}">+</button>
                    </td>
                    <td>
                        <select class="form-select product-size">
                            @foreach($product->category->sizes as $size)
                                <option value="{{ $size->id }}">{{ $size->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td id="productCost-{{ $product->id }}">{{ $product->price }}</td>
                    <td id="productPrice-{{ $product->id }}">{{ $product->price * $basketProducts[$product->id] }}</td>
                    <td>
                        <img data-remove="{{ $product->id }}" src="{{ asset('icons/delete.png') }}">
                    </td>
                </tr>
            @endforeach
            <tr id="totalPrice">
                <td>Общая стоимость:</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td id="totalBasketPrice">{{ $totalBasketPrice }}</td>
            </tr>
            <tr id="makeOrder">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><a href="{{ route('order.index') }}" class="btn btn-success">Оформить заказ</a></td>
            </tr>
        @else
            <tr>
                <td>Корзина пуста</td>
            </tr>
        @endif
        </tbody>
    </table>
@endsection

@section('js')
    <script src="{{ asset('js/basket-actions.js') }}"></script>
@endsection
