@extends('admin.layouts.app')

@section('title', 'Изменение заказа')

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
      <div class="card-body">
        <h4 class="mb-2">Изменить заказ №{{ $order->id }}</h4>

        <form class="mb-3" action="{{ route('admin.order.update', $order->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label class="form-label">Имя клиента</label>
            @error('name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <input type="text" class="form-control" name="name" value="{{ $order->name }}">
          </div>
          <div class="mb-3">
            <label class="form-label">Телефон клиента</label>
            @error('phone')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <input type="text" class="form-control" name="phone" value="{{ $order->phone }}">
          </div>
          <div class="mb-3">
            <label class="form-label">Город</label>
            @error('city')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <input type="text" class="form-control" name="city" value="{{ $order->city }}">
          </div>
          <div class="mb-3">
            <label class="form-label">Адрес</label>
            @error('address')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <input type="text" class="form-control" name="address" value="{{ $order->address }}">
          </div>
          <div class="mb-3">
            <label class="form-label">Статус заказа</label>
            <select name="status" class="form-select" aria-label="Default select example">
              @foreach($order->statuses() as $status)
                <option
                  {{ $order->status === $status->id ? 'selected' : '' }}
                  value="{{ $status->id }}">{{ $status->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <button class="btn btn-primary d-grid w-100" type="submit">Сохранить</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
