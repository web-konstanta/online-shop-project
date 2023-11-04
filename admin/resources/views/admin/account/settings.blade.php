@extends('admin.layouts.app')

@section('title', 'Настройки персональных данных')

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-4">
      <span class="text-muted fw-light">Персональные данные /</span> Аккаунт
    </h4>

    <div class="row">
      <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
          <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Аккаунт администратора</a></li>
        </ul>
        <div class="card mb-4">
          <div class="card-body">
            @if(session()->has('success'))
              <div class="alert alert-success text-center">{{ session()->get('success') }}</div>
            @endif
            <form action="{{ route('admin.account.update-settings') }}" method="post">
              @method('PUT')
              @csrf
              <div class="row">
                <div class="mb-3 col-md-6">
                  <label for="firstName" class="form-label">Имя</label>
                  @error('name')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                  <input class="form-control" type="text" name="name" value="{{ $admin->name }}">
                </div>
                <div class="mb-3 col-md-6">
                  <label for="email" class="form-label">E-mail</label>
                  @error('email')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                  <input class="form-control" type="text" id="email" name="email" value="{{ $admin->email }}">
                </div>
              </div>
              <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2 send-data">Сохранить изменения</button>
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
