@extends('layouts.app')

@section('title', 'Оформление заказа')

@section('content')
    <div class="container">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
            <div id="success" class="alert alert-success text-center d-none">Заказ оформлен успешно</div>
            <div id="form">
                <h3 class="text-center">Выбрано {{ $productsCount }} товаров на сумму {{ $totalPrice }} грн</h3>
                <div class="card mt-4" style="margin-bottom: 30%">
                    <div class="card-body">
                        <form class="text-start">
                            <label id="name">Введите Ваше имя:</label>
                            <div class="mb-3">
                                <input type="text" class="form-control name" value="{{ auth()->user() ? auth()->user()->name : null }}">
                            </div>
                            <label id="phone">Введите Ваш номер телефона:</label>
                            <div class="mb-3">
                                <input type="text" class="form-control phone">
                            </div>
                            <label id="city">Введите текущий город проживания:</label>
                            <div class="mb-3">
                                <input type="text" class="form-control city">
                            </div>
                            <label id="address">Введите Ваш адрес проживания:</label>
                            <div class="mb-3">
                                <input type="text" class="form-control address">
                            </div>
                            <label>Введите комментарий (не обязательно)</label>
                            <div class="mb-3">
                                <textarea class="form-control message"></textarea>
                            </div>
                            <div class="text-center">
                                <button type="button" class="btn btn-primary w-100 mt-4 mb-0 submit">Оформить заказ</button>
                            </div>
                        </form>
                    </div>
            </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/order.js') }}"></script>
@endsection
