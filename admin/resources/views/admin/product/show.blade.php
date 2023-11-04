@extends('admin.layouts.app')

@section('title', 'Информация о товаре')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-4 font-italic">Товар № {{ $product->id }}</h1>
      <p class="lead my-3"><span style="font-weight: 900">Название</span>: {{ $product->name }}</p>
      <p class="lead my-3"><span style="font-weight: 900">Стоимость</span>: {{ $product->price }}</p>
      <p class="lead my-3"><span style="font-weight: 900">Изображение</span>:</p>
      <img src="{{ $product->image ? url('storage/' . $product->image) : asset('icons/no-photo.png') }}" alt="product image">
      <p class="lead my-3"><span style="font-weight: 900">Описание</span>: {{ $product->description }}</p>
      <p class="lead my-3"><span style="font-weight: 900">Характеристики</span>: {{ $product->description }}</p>
      <p class="lead my-3"><span style="font-weight: 900">Код товара</span>: {{ $product->code }}</p>
      <p class="lead my-3"><span style="font-weight: 900">Категория товара</span>: {{ $product->category->name }}</p>
      <p class="lead my-3"><span style="font-weight: 900">Топ продаж</span>: {{ $product->top_sales ? 'Да' : 'Нет' }}</p>
      <p class="lead my-3"><span style="font-weight: 900">Новинка</span>: {{ $product->is_new ? 'Да' : 'Нет' }}</p>
      <p class="lead my-3"><span style="font-weight: 900">В наличии</span>: {{ $product->is_active ? 'Да' : 'Нет' }}</p>
      <p class="lead my-3"><span style="font-weight: 900">Дата загрузки</span>: {{ \Carbon\Carbon::parse($product->created_at)->format('d-m-Y') }}</p>
      <p class="lead mb-0"><a href="{{ route('admin.product.index') }}" class="btn btn-primary text-white font-weight-bold">Вернуться к списку товаров</a></p>
    </div>
  </div>
</div>
@endsection
