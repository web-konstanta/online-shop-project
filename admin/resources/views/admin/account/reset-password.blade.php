@extends('admin.layouts.app')

@section('title', 'Сброс пароля')

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-4">
      <span class="text-muted fw-light">Сброс пароля</span>
    </h4>

    <div class="row">
      <div class="col-md-12">
        <div class="card mb-4">
          <div class="card-body">
            @if(session()->has('success'))
              <div class="alert alert-success text-center">{{ session()->get('success') }}</div>
            @endif
            @if(session()->has('error'))
              <div class="alert alert-warning text-center">{{ session()->get('error') }}</div>
            @endif
            <form action="{{ route('admin.account.update-password') }}" method="post">
              @method('PUT')
              @csrf
              <div class="row">
                <div class="mb-3 col-md-6">
                  <label class="form-label">Текущий пароль</label>
                  @error('current_password')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                  <input class="form-control" type="password" name="current_password">
                </div>
              </div>
              <div class="row">
                <div class="mb-3 col-md-6">
                  <label class="form-label">Новый пароль</label>
                  @error('password')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                  <input class="form-control" type="password" name="password">
                </div>
              </div>
              <div class="row">
                <div class="mb-3 col-md-6">
                  <label for="firstName" class="form-label">Повторите новый пароль</label>
                  @error('password_confirmation')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                  <input class="form-control" type="password" name="password_confirmation">
                </div>
              </div>
              <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2 send-data">Сохранить пароль</button>
                <button type="reset" class="btn btn-outline-secondary">Отменить</button>
              </div>
            </form>
          </div>
          <!-- /Account -->
        </div>
      </div>
    </div>

    <!-- pricingModal -->
    <!--/ pricingModal -->

  </div>
@endsection
