@extends('layouts.app')

@section('title', __('order.title'))

@section('content')
    <div class="container">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
            <div id="success" class="alert alert-success text-center d-none">Заказ оформлен успешно</div>
            <div id="form">
                <h3 class="text-center">@lang('order.taken') {{ $productsCount }} @lang('order.products') {{ $totalPrice }} грн</h3>
                <div class="card mt-4" style="margin-bottom: 30%">
                    <div class="card-body">
                        <form class="text-start">
                            <label id="name">@lang('order.name')</label>
                            <div class="mb-3">
                                <input type="text" class="form-control name" value="{{ auth()->user() ? auth()->user()->name : null }}">
                            </div>
                            <label id="phone">@lang('order.phone')</label>
                            <div class="mb-3">
                                <input type="text" class="form-control phone">
                            </div>
                            <label id="city">@lang('order.city')</label>
                            <div class="mb-3">
                                <input type="text" class="form-control city">
                            </div>
                            <label id="postal">@lang('order.postal')</label>
                            <div class="mb-3">
                                <input type="text" class="form-control postal">
                            </div>
                            <label>@lang('order.comment')</label>
                            <div class="mb-3">
                                <textarea class="form-control message"></textarea>
                            </div>
                            <div class="text-center">
                                <button type="button" class="btn btn-primary w-100 mt-4 mb-0 submit">@lang('order.order')</button>
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
