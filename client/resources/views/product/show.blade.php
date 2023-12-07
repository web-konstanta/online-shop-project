@extends('layouts.app')

@section('title', 'Информация о товаре')

@section('content')
    <div class="cs-page__main-content" style="border-top: none">
        <div class="cs-page__content-wrapper">
            <div class="cs-page__content">
                <div class="b-breadcrumb" data-bazooka="Breadcrumbs"
                     data-crumbs-path="[{&quot;name&quot;: &quot;SPARTA-GEAR&quot;, &quot;url&quot;: &quot;/ua/&quot;}, {&quot;name&quot;: &quot;\u0422\u043e\u0432\u0430\u0440\u0438 \u0442\u0430 \u043f\u043e\u0441\u043b\u0443\u0433\u0438&quot;, &quot;url&quot;: &quot;/ua/product_list&quot;}, {&quot;name&quot;: &quot;\u041e\u0434\u044f\u0433&quot;, &quot;url&quot;: &quot;/ua/g73103008-odezhda&quot;}, {&quot;name&quot;: &quot;\u0411\u0456\u043b\u0438\u0437\u043d\u0430 \u0442\u0430 \u0442\u0435\u0440\u043c\u043e\u043a\u043e\u0441\u0442\u044e\u043c\u0438&quot;, &quot;url&quot;: &quot;/ua/g85046814-bele-termokostyumy&quot;}, {&quot;name&quot;: &quot;\u0422\u0435\u0440\u043c\u043e\u0431\u0456\u043b\u0438\u0437\u043d\u0430 Helikon-Tex\u00ae US LEVEL 2 - Olive Green&quot;, &quot;url&quot;: null}]"
                     data-crumbs-classnames="{}" data-qaid="breadcrumbs" data-bazid="7">
                </div>
                <div class="cs-page__row">
                    <div class="cs-product js-productad"
                         data-advtracking-prosale-token="eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJwcm9kdWN0SWQiOjExMzE3MjUzOTcsImNhdGVnb3J5SWQiOjMxMjA2MDIsImNvbXBhbnlJZCI6MzIyNTcxMSwic291cmNlIjoicHJvbTpjb21wYW55X3NpdGUiLCJpYXQiOjE2OTUyNDk1OTEuMTA2NjU4LCJwYWdlSWQiOiIwYmY2YTU5MS02ZmM1LTQ4YmItOTMxNS1mMzIzNWIxMDJjNGIiLCJwb3ciOiJ2MiJ9.T6vfWsri3_tdNrQ3j-rxRdNBPpj9g75W2GhiQaIF_Kw"
                         data-advtracking-product-id="1131725397" data-qaid="product-info"><h1
                            class="cs-title-wrapper cs-online-edit"><a class="cs-online-edit__link"
                                                                       data-edit-role="productInfo"
                                                                       data-edit-id="1131725397"
                                                                       title="Редактировать название товара"
                                                                       style="display:none"></a><a
                                class="cs-online-edit__horizontal-borders" data-edit-role="productInfo"
                                data-edit-id="1131725397" style="display:none"></a><a
                                class="cs-online-edit__vertical-borders" data-edit-role="productInfo"
                                data-edit-id="1131725397" style="display:none"></a><span data-qaid="product_name"
                                                                                         class="cs-title">{{ $product->name }}</span>
                        </h1>
                        <div class="cs-product__container">
                            @if($product->images)
                                <div class="cs-product__visual d-flex" style="width: 100%; justify-content: space-between; overflow-x: scroll">
                                    @foreach(json_decode($product->images) as $image)
                                        <div class="cs-product__image csjs-image-wrap">
                                            <img
                                                height="262"
                                                width="262"
                                                class="cs-product-image__img csjs-image"
                                                src="{{ $adminURL . '/storage/' . $image }}"
                                                data-cspgo-image-id="3387041477"
                                                alt="Термобілизна Helikon-Tex® US LEVEL 2 - Olive Green"
                                            >
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="cs-product__visual d-flex">
                                    <div class="cs-product__image csjs-image-wrap">
                                        <img
                                            class="cs-product-image__img csjs-image"
                                            src="{{ asset('icons/no-photo.png') }}"
                                            data-cspgo-image-id="3387041477"
                                            alt="Термобілизна Helikon-Tex® US LEVEL 2 - Olive Green"
                                        >
                                    </div>
                                </div>
                            @endif
                            <div class="cs-product__info-holder">
                                <div class="cs-product__info-line">
                                    <ul class="b-product-data">
                                        @if($product->is_active)
                                            <li
                                                class="b-product-data__item b-product-data__item_type_available"
                                                data-qaid="presence_data">В наявності</li>
                                        @else
                                            <li
                                                class="b-product-data__item b-product-data__item_type_available"
                                                data-qaid="presence_data" style="color: #f00f00">Тимчасово відсутній</li>
                                        @endif
                                        <li class="b-product-data__item b-product-data__item_type_sku">Код: <span
                                                title="H3427-02" data-qaid="product_code">{{ $product->code }}</span></li>
                                    </ul>
                                </div>
                                <div class="cs-product__info-line cs-online-edit"><a class="cs-online-edit__link"
                                                                                     data-edit-role="productInfo"
                                                                                     data-edit-id="1131725397"
                                                                                     title="Редактировать цену товара"
                                                                                     style="display:none"></a><a
                                        class="cs-online-edit__horizontal-borders" data-edit-role="productInfo"
                                        data-edit-id="1131725397" style="display:none"></a><a
                                        class="cs-online-edit__vertical-borders" data-edit-role="productInfo"
                                        data-edit-id="1131725397" style="display:none"></a>
                                    <div class="b-product-cost"><p class="b-product-cost__price"><span
                                                data-qaid="product_price">{{ $product->price }}</span>&nbsp;<span
                                                class="notranslate" data-qaid="currency">₴</span></p></div>
                                </div>
                                <div id="product-sticky-panel" class="cs-sticky-panel" data-bazooka="StickyPanel"
                                     data-sp-activeclass="cs-sticky-panel_state_active" data-qaid="sticky-panel"
                                     data-bazid="13">
                                    <div class="cs-sticky-panel__container">
                                        <div class="cs-sticky-panel__body">
                                            <div class="cs-sticky-panel__holder">
                                                <div class="cs-sticky-panel__cost"
                                                     data-qaid="product_price_sticky_panel"><span
                                                        class="cs-sticky-panel__price">2&nbsp;060&nbsp;<span
                                                            class="notranslate">₴</span></span></div>
                                                <span class="cs-sticky-panel__product-status" title="В наявності"
                                                      data-qaid="product_status_sticky_panel">В наявності</span></div>
                                            <div class="cs-sticky-panel__buttons"><a
                                                    class="cs-custom-button cs-custom-button_color_main cs-sticky-panel__btn csjs-button-buy js-product-buy-button js-buy-button__text js-product-ad-conv-action"
                                                    data-adwords-data="&quot;&quot;"
                                                    data-advtracking-prosale-token="eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJwcm9kdWN0SWQiOjExMzE3MjUzOTcsImNhdGVnb3J5SWQiOjMxMjA2MDIsImNvbXBhbnlJZCI6MzIyNTcxMSwic291cmNlIjoicHJvbTpjb21wYW55X3NpdGUiLCJpYXQiOjE2OTUyNDk1OTEuMTA2NjU4LCJwYWdlSWQiOiIwYmY2YTU5MS02ZmM1LTQ4YmItOTMxNS1mMzIzNWIxMDJjNGIiLCJwb3ciOiJ2MiJ9.T6vfWsri3_tdNrQ3j-rxRdNBPpj9g75W2GhiQaIF_Kw"
                                                    data-advtracking-product-id="1131725397"
                                                    href="/ua/shopping_cart_static?product_id=MTEzMTcyNTM5Nw.q2n6Mm-tp6QsqqK8RZSn0lErhjA"
                                                    target="_blank" rel="nofollow" data-qaid="sticky_btn_buy"
                                                    data-class-state-done="cs-custom-button_state_active"
                                                    data-class-state-in-cart="cs-custom-button_state_active"
                                                    data-custom-buy-button-text="Купити"
                                                    data-track-page-type="company_site-cs_product_view_sticky_buy_panel"
                                                    data-product-id="1131725397"
                                                    data-product-sign="MTEzMTcyNTM5Nw.q2n6Mm-tp6QsqqK8RZSn0lErhjA"
                                                    data-company-id="3225711"
                                                    data-product-name="Термобілизна Helikon-Tex® US LEVEL 2 - Olive Green"
                                                    data-product-url="/ua/p1131725397-termobele-helikon-tex.html"
                                                    data-product-big-picture="https://images.prom.ua/3387041477_w200_h200_termobilizna-helikon-tex-us.jpg"
                                                    data-product-small-picture="https://images.prom.ua/3387041477_w40_h40_termobilizna-helikon-tex-us.jpg"
                                                    data-tg-chain="{&quot;view_type&quot;: &quot;full&quot;}"
                                                    data-product-price="2&nbsp;060 ₴">Купити</a>

                                                <div id="ID-be22774a-13bc-44b2-8075-95767856774e"
                                                     class="cs-drop-phones cs-drop-phones_type_single cs-sticky-panel__phones"
                                                     data-qaid="phone_field_sticky_panel">
                                                    <div class="js-ga-phone-hover"
                                                         data-tg-hovered="[{&quot;ns&quot;: &quot;main&quot;, &quot;method&quot;: &quot;gatrackQueue&quot;, &quot;args&quot;: [&quot;contact_view&quot;, &quot;hover_phones&quot;, {&quot;label/label&quot;: &quot;company_site-cs_product_view_sticky_buy_panel&quot;}], &quot;uuid&quot;: &quot;51a50a05042bee8d81d2a8d11ec79af60d816da7&quot;}, {&quot;ns&quot;: &quot;ga4&quot;, &quot;method&quot;: &quot;ga4trackQueue&quot;, &quot;args&quot;: [&quot;hover_phones&quot;, {}], &quot;uuid&quot;: &quot;4e92a0387e6f34f29450d658153e2311a9a4bd8f&quot;}, {&quot;ns&quot;: &quot;ym&quot;, &quot;method&quot;: &quot;reachGoal&quot;, &quot;args&quot;: [&quot;company_contacts_hovered&quot;], &quot;uuid&quot;: &quot;4e4e38200b10121d2620b45f0cb38f2ce6db161d&quot;}]"
                                                         data-tg-clicked="[{&quot;ns&quot;: &quot;ga4&quot;, &quot;method&quot;: &quot;ga4trackQueue&quot;, &quot;args&quot;: [&quot;call_phones&quot;, {}], &quot;uuid&quot;: &quot;0fb6dc9f679fb331c05ab91bc83b3be7618dbfaa&quot;}]">
                                                        <div class="cs-drop-phones__number"><span class="notranslate">+380 (96) 482-47-19</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-bazooka="ProductClickTracker"
                         data-advtracking-prosale-token="eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJwcm9kdWN0SWQiOjExMzE3MjUzOTcsImNhdGVnb3J5SWQiOjMxMjA2MDIsImNvbXBhbnlJZCI6MzIyNTcxMSwic291cmNlIjoicHJvbTpjb21wYW55X3NpdGUiLCJpYXQiOjE2OTUyNDk1OTEuMTA2NjU4LCJwYWdlSWQiOiIwYmY2YTU5MS02ZmM1LTQ4YmItOTMxNS1mMzIzNWIxMDJjNGIiLCJwb3ciOiJ2MiJ9.T6vfWsri3_tdNrQ3j-rxRdNBPpj9g75W2GhiQaIF_Kw"
                         data-advtracking-fb-product-data="{}"
                         data-tg-ready="[{&quot;ns&quot;: &quot;ga4&quot;, &quot;method&quot;: &quot;ga4trackQueueNi&quot;, &quot;args&quot;: [&quot;view_item&quot;, {&quot;items&quot;: [{&quot;item_id&quot;: 1131725397, &quot;item_name&quot;: &quot;\u0422\u0435\u0440\u043c\u043e\u0431\u0456\u043b\u0438\u0437\u043d\u0430 Helikon-Tex\u00ae US LEVEL 2 - Olive Green&quot;, &quot;index&quot;: 1, &quot;affiliation&quot;: 3225711, &quot;item_category&quot;: &quot;&quot;, &quot;item_category4&quot;: &quot;&quot;, &quot;item_category3&quot;: &quot;(3120602) \u0442\u0435\u0440\u043c\u043e\u0431\u0456\u043b\u0438\u0437\u043d\u0430&quot;, &quot;item_category2&quot;: &quot;(301) \u0441\u043f\u043e\u0440\u0442\u0438\u0432\u043d\u0438\u0439 \u043e\u0434\u044f\u0433 \u0442\u0430 \u0432\u0437\u0443\u0442\u0442\u044f&quot;, &quot;item_category1&quot;: &quot;(3) \u043e\u0434\u044f\u0433 \u0442\u0430 \u0432\u0437\u0443\u0442\u0442\u044f&quot;, &quot;quantity&quot;: 1, &quot;item_variant&quot;: 0, &quot;prosale_context&quot;: 1, &quot;prom_pay_available&quot;: 0, &quot;item_selling_type&quot;: &quot;retail&quot;, &quot;item_presence&quot;: &quot;avail&quot;, &quot;price&quot;: 2060.0, &quot;discount&quot;: 0.0, &quot;currency&quot;: &quot;UAH&quot;}]}], &quot;uuid&quot;: &quot;25a6f621c75fa2510a1f792a0f822535d02d0c1a&quot;}]"
                         data-bazid="15"></div>
                </div>
                <div class="cs-page__row cs-page__row_type_product">
                    <div class="cs-tab-control">
                        <div class="cs-tab-control__item cs-tab-control__item_state_active js-item" id="descriptionItem">
                            <i class="cs-tab-control__icon cs-tab-control__icon_type_description"></i>
                            <span class="cs-tab-control__title">Опис</span>
                        </div>
                        <div class="cs-tab-control__item js-item" id="charactersItem">
                            <i class="cs-tab-control__icon cs-tab-control__icon_type_characteristics"></i>
                            <span class="cs-tab-control__title">Характеристики</span>
                        </div>
                    </div>
                    <div class="cs-tab-list">
                        <div class="cs-page__row">
                            <div class="cs-tab-list">
                                <div id="description"
                                    class="cs-tab-list__item cs-tab-list__item_state_active js-content-item cs-online-edit">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="b-product-info__cell">{{ $product->description }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="cs-tab-list__item js-content-item cs-online-edit"><a
                                        class="cs-online-edit__link" data-edit-role="productInfo"
                                        data-edit-id="1131725397" title="Редактировать характеристики товара"
                                        style="display:none"></a><a class="cs-online-edit__horizontal-borders"
                                                                    data-edit-role="productInfo"
                                                                    data-edit-id="1131725397"
                                                                    style="display:none"></a><a
                                        class="cs-online-edit__vertical-borders" data-edit-role="productInfo"
                                        data-edit-id="1131725397" style="display:none"></a>
                                    <table class="b-product-info">
                                        <tbody>
                                        <tr>
                                            <th class="b-product-info__header" colspan="2">Основні</th>
                                        </tr>
                                        <tr>
                                            <td class="b-product-info__cell">Країна виробник</td>
                                            <td class="b-product-info__cell">Польща</td>
                                        </tr>
                                        <tr>
                                            <td class="b-product-info__cell">Тип</td>
                                            <td class="b-product-info__cell">Комплект</td>
                                        </tr>
                                        <tr>
                                            <td class="b-product-info__cell">Виробник

                                                <span data-bazooka="Tooltip"
                                                      data-tooltip-body="Бренд, торгова марка або назва підприємства-виробника, під знаком якого виготовлений товар. &amp;laquo;Власне виробництво означає&amp;raquo;, що товар виготовлений продавцем або не сертифікований."
                                                      data-tooltip-icon-class-name="" data-bazid="16"><span
                                                        class="icon-help">&nbsp;</span></span>
                                            </td>
                                            <td class="b-product-info__cell">Helikon-tex</td>
                                        </tr>
                                        <tr>
                                            <th class="b-product-info__header" colspan="2">Характеристика</th>
                                        </tr>
                                        <tr>
                                            <td class="b-product-info__cell">Розмір</td>
                                            <td class="b-product-info__cell">XS</td>
                                        </tr>
                                        <tr>
                                            <td class="b-product-info__cell">Тип тканини</td>
                                            <td class="b-product-info__cell">Helikon-Tex® Comfort Dry 210g/m2,
                                                Breathable Grid: Poliester 95%, Elastane 5%
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="b-product-info__cell">EAN</td>
                                            <td class="b-product-info__cell">5908218755512</td>
                                        </tr>
                                        <tr>
                                            <td class="b-product-info__cell">Вага</td>
                                            <td class="b-product-info__cell">554</td>
                                        </tr>
                                        <tr>
                                            <td class="b-product-info__cell">Артикул виробника</td>
                                            <td class="b-product-info__cell">KP-UN2-PO</td>
                                        </tr>
                                        <tr>
                                            <td class="b-product-info__cell">Колір</td>
                                            <td class="b-product-info__cell">Olive Green</td>
                                        </tr>
                                        <tr>
                                            <td class="b-product-info__cell">Технологія плоских швів</td>
                                            <td class="b-product-info__cell">+</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="cs-tab-list__item js-content-item cs-online-edit"><a
                                        class="cs-online-edit__link" data-edit-role="productInfo"
                                        data-edit-id="1131725397" title="Редактировать характеристики товара"
                                        style="display:none"></a><a class="cs-online-edit__horizontal-borders"
                                                                    data-edit-role="productInfo"
                                                                    data-edit-id="1131725397"
                                                                    style="display:none"></a><a
                                        class="cs-online-edit__vertical-borders" data-edit-role="productInfo"
                                        data-edit-id="1131725397" style="display:none"></a>
                                    <ul class="b-order-info" data-qaid="order_info_block">
                                        <li class="b-order-info__item" data-qaid="order_info_item"><b>Ціна:</b> 2&nbsp;060&nbsp;<span
                                                class="notranslate">₴</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="cs-tab-list__item js-content-item cs-online-edit cs-tab-list__item_state_active"><a
                                class="cs-online-edit__link" data-edit-role="productInfo" data-edit-id="1131725397"
                                title="Редактировать характеристики товара" style="display:none"></a><a
                                class="cs-online-edit__horizontal-borders" data-edit-role="productInfo"
                                data-edit-id="1131725397" style="display:none"></a><a
                                class="cs-online-edit__vertical-borders" data-edit-role="productInfo"
                                data-edit-id="1131725397" style="display:none"></a>
                            <table class="b-product-info" id="characters" style="display: none">
                                <tbody>
                                    <tr>
                                        <td class="b-product-info__cell">
                                            <ul>
                                                @foreach($product->getModifiedCharacters() as $character)
                                                    <li>{{ $character }}</li><br>
                                                @endforeach
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="cs-tab-list__item js-content-item cs-online-edit"><a class="cs-online-edit__link"
                                                                                         data-edit-role="productInfo"
                                                                                         data-edit-id="1131725397"
                                                                                         title="Редактировать характеристики товара"
                                                                                         style="display:none"></a><a
                                class="cs-online-edit__horizontal-borders" data-edit-role="productInfo"
                                data-edit-id="1131725397" style="display:none"></a><a
                                class="cs-online-edit__vertical-borders" data-edit-role="productInfo"
                                data-edit-id="1131725397" style="display:none"></a>
                            <ul class="b-order-info" data-qaid="order_info_block">
                                <li class="b-order-info__item" data-qaid="order_info_item"><b>Ціна:</b> 2&nbsp;060&nbsp;<span
                                        class="notranslate">₴</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="cs-page__row cs-page__row_type_product">
                    <div class="cs-similar-products">
                        <div data-qaid="accessory_products_block" data-bazooka="LazyDiv"
                             data-lazydiv-url="/ua/accessory_slider_block_html?product_id=1131725397&amp;page_type=cs_product_view"
                             data-lazydiv-classname="" data-lazydiv-margintop="300px" data-bazid="17">
                            <div class=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/product-item.js') }}"></script>
@endsection
