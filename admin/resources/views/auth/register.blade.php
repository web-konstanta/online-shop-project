@extends('auth.layouts.app')

@section('title', 'Регистрация')

@section('content')
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">

      <!-- Register Card -->
      <div class="card">
        <div class="card-body">
          <!-- /Logo -->
          <form id="formAuthentication" class="mb-3" action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Имя</label>
              @error('name')
              <p style="color: #f00f00">{{ $message }}</p>
              @enderror
              <input type="text" class="form-control" id="name" name="name" placeholder="Введите Ваше имя">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              @error('email')
              <p style="color: #f00f00">{{ $message }}</p>
              @enderror
              <input type="email" class="form-control" id="email" name="email" placeholder="Введите Ваш email">
            </div>
            <div class="mb-3 form-password-toggle">
              <label class="form-label" for="password">Пароль</label>
              @error('password')
              <p style="color: #f00f00">{{ $message }}</p>
              @enderror
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password" placeholder="············" aria-describedby="password">
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
            <button class="btn btn-primary d-grid w-100">
              Зарегистрироваться
            </button>
          </form>

          <p class="text-center">
            <span>Уже зарегистрированы?</span>
            <a href="{{ route('login-view') }}">
              <span>Войти</span>
            </a>
          </p>
        </div>
      </div>
    </div>
    <!-- Register Card -->
  </div>
@endsection
