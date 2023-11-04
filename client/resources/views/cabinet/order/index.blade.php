@extends('layouts.app')

@section('title', 'Список заказов')

@section('content')
    <div class="container">
        <h1 class="mb-4">Список заказов</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Статус заказа</th>
                <th scope="col">Просмотреть заказ</th>
                <th scope="col">Дата оформления заказа</th>
            </tr>
            </thead>
            <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>{{ $order->orderStatus->name }}</td>
                    <td>
                        <a href="{{ route('cabinet.order.show', $order->id) }}">
                            <img src="{{ asset('icons/watch.png') }}" alt="watch">
                        </a>
                    </td>
                    <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td>Заказы отсутствуют</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
