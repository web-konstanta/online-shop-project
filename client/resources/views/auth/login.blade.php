@extends('layouts.app')

@section('title', __('login.title'))

@section('content')
    <div class="container">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
            <div class="container-xxl">
                <div class="authentication-wrapper authentication-basic container-p-y">
                    <div id="form" class="authentication-inner">
                        <div class="card mt-4" style="margin-bottom: 30%">
                            <div class="card-body">
                                @if(session()->has('error'))
                                    <div class="alert alert-warning">{{ session()->get('error') }}</div>
                                @endif
                                <form action="{{ route('login') }}" class="text-start" method="post">
                                    @csrf
                                    <label id="phone">@lang('login.email')</label>
                                    @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <div class="mb-3">
                                        <input name="email" type="email" class="form-control phone">
                                    </div>
                                    <label>@lang('login.password')</label>
                                    @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <div class="mb-3">
                                        <input name="password" type="password" class="form-control phone">
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary w-100 mt-3 mb-0 submit">@lang('login.login')</button>
                                    </div>
                                    <div class="mt-3">
                                        <p class="text-center"><a href="{{ route('register-view') }}">@lang('login.not_login')</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
