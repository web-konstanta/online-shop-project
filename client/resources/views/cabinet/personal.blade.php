@extends('layouts.app')

@section('title', 'Персональные данные')

@section('content')
    <div class="container">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
            <div id="form">
                <div class="card mt-4" style="margin-bottom: 30%">
                    <div class="card-body">
                        @if(session()->has('success'))
                            <div class="alert alert-success text-center">{{ session()->get('success') }}</div>
                        @endif
                        <form action="{{ route('cabinet.personal.update') }}" class="text-start" method="post">
                            @csrf
                            @method('PUT')
                            <label id="name">Ваше имя:</label>
                            @error('name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="mb-3">
                                <input name="name" type="text" class="form-control" value="{{ $user->name }}">
                            </div>
                            <label id="phone">Ваш email:</label>
                            @error('email')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="mb-3">
                                <input name="email" type="email" class="form-control" value="{{ $user->email }}">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary w-100 mt-3 mb-0 submit">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
