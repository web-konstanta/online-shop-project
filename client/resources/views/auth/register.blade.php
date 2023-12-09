@extends('layouts.app')

@section('title', __('register.title'))

@section('content')
    <div class="container">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
            <div id="form">
                <div class="card mt-4" style="margin-bottom: 30%">
                    <div class="card-body">
                        <form action="{{ route('register') }}" class="text-start" method="post">
                            @csrf
                            <label id="name">@lang('register.name')</label>
                            @error('name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="mb-3">
                                <input name="name" type="text" class="form-control name">
                            </div>
                            <label id="phone">@lang('register.email')</label>
                            @error('email')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="mb-3">
                                <input name="email" type="email" class="form-control phone">
                            </div>
                            <label>@lang('register.password')</label>
                            @error('password')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="mb-3">
                                <input name="password" type="password" class="form-control phone">
                            </div>
                            <label>@lang('register.password_confirmation')</label>
                            <div class="mb-3">
                                <input name="password_confirmation" type="password" class="form-control phone">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary w-100 mt-3 mb-0 submit">@lang('register.register')</button>
                            </div>
                            <div class="mt-3">
                                <p class="text-center"><a href="{{ route('login-view') }}">@lang('register.not_register')</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
