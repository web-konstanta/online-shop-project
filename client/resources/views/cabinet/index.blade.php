@extends('layouts.app')

@section('title', 'Личный кабинет')

@section('content')
    <div class="container">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
            <div id="form">
                <div class="card mt-4" style="margin-bottom: 30%">
                    <div class="card-body">
                        <h1>Приветствую в личном кабинете, {{ $user->name }}</h1>
                        <div class="mt-3">
                            <div>Вам доступны возможности:</div>
                            <ul class="list-group mt-3" style="line-height: 25px">
                                <li>
                                    <a href="{{ route('cabinet.order.index') }}">Управление заказами</a>
                                </li>
                                <li>
                                    <a href="{{ route('cabinet.personal.index') }}">Персональные данные</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
