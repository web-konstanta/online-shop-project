<li class="cs-online-edit cs-product-main-page__item js-productad" data-qaid="product-block"
    data-product-id="1244180692"
    data-advtracking-prosale-token="eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJwcm9kdWN0SWQiOjEyNDQxODA2OTIsImNhdGVnb3J5SWQiOjMwODA3LCJjb21wYW55SWQiOjMyMjU3MTEsInNvdXJjZSI6InByb206Y29tcGFueV9zaXRlIiwiaWF0IjoxNjk1MDU1OTc3LjAzMjkwOTQsInBhZ2VJZCI6IjE3ODU5Y2NjLTc1ZDItNDE5Yi05NzRkLTI5Zjg0YTc3OTQyMSIsInBvdyI6InYyIn0.mW_BSwUHzA_jGyM61mzLkkv34dmWPiYz6OekA523CQI"
    data-advtracking-product-id="1244180692"
    data-tg-chain="{&quot;view_type&quot;: &quot;preview&quot;}"><a
        class="cs-online-edit__link" data-edit-role="productInfo" data-edit-id="1244180692"
        title="Редактировать товар" style="display:none"></a><a
        class="cs-online-edit__horizontal-borders" data-edit-role="productInfo"
        data-edit-id="1244180692" style="display:none"></a><a
        class="cs-online-edit__vertical-borders" data-edit-role="productInfo"
        data-edit-id="1244180692" style="display:none"></a>
    <div class="cs-product-main-page__sku cs-goods-sku" title="Код:"><span title="D3526-34">{{ $product->code }}</span>
    </div>
    <div class="cs-product-main-page__image-panel">
        @if($product->is_new)
            <span class="cs-goods-custom-label cs-product-main-page__custom-label" data-qaid="custom_label">Новинка</span>
        @endif
        <a class="cs-product-main-page__image-link"
           href="#"
           title="Рубашка (Ubacs) Direct Action® VANGUARD COMBAT - MultiCam®"
           data-tg-became-visible="[{&quot;ns&quot;: &quot;main&quot;, &quot;method&quot;: &quot;ptrackQueue&quot;, &quot;args&quot;: [&quot;product_position&quot;, &quot;show&quot;, {}], &quot;payloads&quot;: {&quot;ec_products_list&quot;: 1244180692}, &quot;uuid&quot;: &quot;7493e86deccb988a10a4c9bd791005131fda9061&quot;}]"
           data-tg-clicked="[{&quot;ns&quot;: &quot;main&quot;, &quot;method&quot;: &quot;ptrackForce&quot;, &quot;args&quot;: [&quot;product_position&quot;, &quot;click&quot;, {}], &quot;payloads&quot;: {&quot;ec_products_list&quot;: 1244180692}, &quot;uuid&quot;: &quot;02deeb146e278fe49b456b4565e5a534a7f699df&quot;}]"><img
                class="cs-product-main-page__image"
                src="{{ $product->getImage() }}"
                alt="Рубашка (Ubacs) Direct Action® VANGUARD COMBAT - MultiCam®"
                loading="lazy"></a>
        @if($product->is_active)
                <div class="cs-product-main-page__order-panel">
                    <div
                        id="basket-product-{{ $product->id }}"
                        data-id="{{ $product->id }}"
                        class="cs-custom-button cs-custom-button_color_main cs-product-main-page__btn csjs-button-buy js-product-buy-button js-buy-button__text js-product-ad-conv-action"
                        href="/shopping_cart_static?product_id=MTI0NDE4MDY5Mg.FmbMTjVHtixM_kEzxINxg2-x3MI">
                        Купить
                    </div>
                </div>
        @endif
    </div>
    <div class="cs-product-main-page__info-panel">
        <div class="cs-product-main-page__title">
            <a class="cs-goods-title"
               href="{{ route('product.show', $product->id) }}"
               id="link_to_product_1244180692"
               data-tg-clicked="[{&quot;ns&quot;: &quot;main&quot;, &quot;method&quot;: &quot;ptrackForce&quot;, &quot;args&quot;: [&quot;product_position&quot;, &quot;click&quot;, {}], &quot;payloads&quot;: {&quot;ec_products_list&quot;: 1244180692}, &quot;uuid&quot;: &quot;02deeb146e278fe49b456b4565e5a534a7f699df&quot;}]">
                {{ $product->name }}
            </a></div>
        <div class="cs-goods-price"><span
                class="cs-goods-price__value cs-goods-price__value_type_current">{{ $product->price }}&nbsp;<span
                    class="notranslate">₴</span></span></div>
        @if($product->is_active)
            <div class="cs-product-main-page__data cs-goods-data">
                <span class="cs-goods-data__state cs-goods-data__state_val_avail" data-qaid="presence_data">В наличии</span>
            </div>
        @else
            <div class="cs-product-main-page__data cs-goods-data">
                <span class="cs-goods-data__state cs-goods-data__state_val_avail" style="color: red" data-qaid="presence_data">Временно отсутствует</span>
            </div>
        @endif
    </div>
</li>
