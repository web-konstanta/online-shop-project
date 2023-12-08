@extends('layouts.app')

@section('title', __('basket.image'))

@section('content')
    <table class="container table basket-products" style="font-size: 18px">
        <thead>
            <tr>
                <th>@lang('basket.image')</th>
                <th>@lang('basket.name')</th>
                <th>@lang('basket.count')</th>
                <th>@lang('basket.size')</th>
                <th>@lang('basket.price')</th>
                <th>@lang('basket.sum')</th>
                <th>@lang('basket.delete')</th>
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
                        <select class="form-select" data-type="size" data-id="{{ $product->id }}">
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
                <td>@lang('basket.total_price')</td>
                <td></td>
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
                <td></td>
                <td><a href="{{ route('order.index') }}" class="btn btn-success">Оформить заказ</a></td>
            </tr>
        @else
            <tr>
                <td>@lang('basket.empty')</td>
            </tr>
        @endif
        </tbody>
    </table>
@endsection

@section('js')
    <script src="{{ asset('js/basket-actions.js') }}"></script>
@endsection
