@extends('layouts.app')

@section('title', 'Топ продаж')

@section('content')
    <div class="cs-page__content-wrapper cs-page__content-wrapper_page_main">
        <div class="cs-page__content cs-page__content_page_main">
            <div class="cs-page__row">
                <div class="cs-product-main-page">
                    <div class="cs-title-wrapper cs-online-edit"><span class="cs-title" data-qaid="title_panel">Все товары</span><a
                            class="cs-online-edit__link" data-edit-role="showroom"
                            title="Редактировать витрину товаров и услуг" style="display:none"></a><a
                            class="cs-online-edit__horizontal-borders" data-edit-role="showroom"
                            style="display:none"></a><a class="cs-online-edit__vertical-borders"
                                                        data-edit-role="showroom" style="display:none"></a></div>
                    <ul class="cs-product-main-page__list" id="productsList">
                        @if($products->count() !== 0)
                            @foreach($products as $product)
                                @include('includes.card', $product)
                            @endforeach
                            <div>{{ $products->links() }}</div>
                        @else
                            <li>Товары топ продаж временно отсутствуют</li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
