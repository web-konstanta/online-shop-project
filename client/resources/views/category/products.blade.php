@extends('layouts.app')

@section('title', 'Военные товары')

@section('content')
    <div class="cs-page__content-wrapper cs-page__content-wrapper_page_main">
        <div class="cs-page__content cs-page__content_page_main">
            <h1 class="text-center" style="font-size: 24px">Категория: {{ $category->name }}</h1>
            <div class="cs-page__row mt-4">
                <div class="cs-product-main-page">
                    <div class="cs-title-wrapper cs-online-edit"><span class="cs-title" data-qaid="title_panel">Все товары</span><a
                            class="cs-online-edit__link" data-edit-role="showroom"
                            title="Редактировать витрину товаров и услуг" style="display:none"></a><a
                            class="cs-online-edit__horizontal-borders" data-edit-role="showroom"
                            style="display:none"></a><a class="cs-online-edit__vertical-borders"
                                                        data-edit-role="showroom" style="display:none"></a></div>
                    @if($products->count() !== 0)
                    <ul class="cs-product-main-page__list" id="productsList">
                            @forelse($products as $product)
                                @include('includes.card', $product)
                            @empty
                                <li>Товары временно отсутствуют</li>
                            @endforelse
                        </ul>
                        <div>{{ $products->links() }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
