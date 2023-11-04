@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')
    <div class="container">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
            <div id="form">
                <div class="card mt-4" style="margin-bottom: 30%">
                    <div class="card-body">
                        <form action="{{ route('register') }}" class="text-start" method="post">
                            @csrf
                            <label id="name">Введите Ваше имя:</label>
                            @error('name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="mb-3">
                                <input name="name" type="text" class="form-control name">
                            </div>
                            <label id="phone">Введите Ваш email:</label>
                            @error('email')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="mb-3">
                                <input name="email" type="email" class="form-control phone">
                            </div>
                            <label>Введите пароль</label>
                            @error('password')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="mb-3">
                                <input name="password" type="password" class="form-control phone">
                            </div>
                            <label>Повторите пароль</label>
                            <div class="mb-3">
                                <input name="password_confirmation" type="password" class="form-control phone">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary w-100 mt-3 mb-0 submit">Зарегистрироваться</button>
                            </div>
                            <div class="mt-3">
                                <p class="text-center">Уже есть аккаунт? <a href="{{ route('login-view') }}">Войти</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
