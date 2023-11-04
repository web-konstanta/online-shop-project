@extends('admin.layouts.app')

@section('title', 'Управление данными о компании')

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-4">
      <span class="text-muted fw-light">Управление данными о компании</span>
    </h4>

    <div class="row">
      <div class="col-md-12">
        <div class="card mb-4">
          <div class="card-body">
            @if(session()->has('success'))
              <div class="alert alert-success text-center">{{ session()->get('success') }}</div>
            @endif
            <form action="{{ route('admin.contact.update') }}" method="post">
              @method('PUT')
              @csrf
              <div class="row">
                <div class="mb-3 col-md-6">
                  <label for="firstName" class="form-label">Название компании</label>
                  @error('company_name')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                  <input class="form-control" type="text" name="company_name" value="{{ $contact->company_name }}">
                </div>
                <div class="mb-3 col-md-6">
                  <label for="email" class="form-label">Контактное лицо</label>
                  @error('contact_person')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                  <input class="form-control" type="text" name="contact_person" value="{{ $contact->contact_person }}">
                </div>
                <div class="mb-3 col-md-6">
                  <label for="email" class="form-label">Адрес</label>
                  @error('address')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                  <input class="form-control" type="text" name="address" value="{{ $contact->address }}">
                </div>
                <div class="mb-3 col-md-6">
                  <label for="email" class="form-label">Телефон</label>
                  @error('phone')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                  @if(session()->has('error'))
                    <p class="text-danger">{{ session()->get('error') }}</p>
                  @endif
                  <input class="form-control" type="text" name="phone" value="{{ $contact->phone }}">
                </div>
              </div>
              <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2 send-data">Сохранить изменения</button>
                <button type="reset" class="btn btn-outline-secondary">Отменить</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
