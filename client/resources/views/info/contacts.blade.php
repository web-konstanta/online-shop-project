@extends('layouts.app')

@section('title', __('contacts.title'))

@section('content')
    <div class="cs-page__main-content" style="border-top: none">
        <aside class="cs-sidebar-right">
            <div class="cs-sidebar-right__row">
                <div class="cs-sked cs-online-edit"><span class="cs-title cs-title_type_sidebar">@lang('contacts.calendar.title')</span><a
                        class="cs-online-edit__link" data-edit-role="scheduleInfo" title="Редактировать график"
                        style="display:none"></a><a class="cs-online-edit__horizontal-borders"
                                                    data-edit-role="scheduleInfo" style="display:none"></a><a
                        class="cs-online-edit__vertical-borders" data-edit-role="scheduleInfo" style="display:none"></a>
                    <ul class="cs-sked__holder">
                        <li class="cs-sked__list">
                            <div class="cs-sked__item"><span class="cs-sked__day">@lang('contacts.calendar.monday')</span></div>
                            <div class="cs-sked__item"><span class="cs-sked__time">10:00</span><span
                                    class="cs-sked__time">18:00</span></div>
                        </li>
                        <li class="cs-sked__list">
                            <div class="cs-sked__item"><span class="cs-sked__day">@lang('contacts.calendar.tuesday')</span></div>
                            <div class="cs-sked__item"><span class="cs-sked__time">10:00</span><span
                                    class="cs-sked__time">18:00</span></div>
                        </li>
                        <li class="cs-sked__list">
                            <div class="cs-sked__item"><span class="cs-sked__day">@lang('contacts.calendar.wednesday')</span></div>
                            <div class="cs-sked__item"><span class="cs-sked__time">10:00</span><span
                                    class="cs-sked__time">18:00</span></div>
                        </li>
                        <li class="cs-sked__list">
                            <div class="cs-sked__item"><span class="cs-sked__day">@lang('contacts.calendar.thursday')</span></div>
                            <div class="cs-sked__item"><span class="cs-sked__time">10:00</span><span
                                    class="cs-sked__time">18:00</span></div>
                        </li>
                        <li class="cs-sked__list">
                            <div class="cs-sked__item"><span class="cs-sked__day">@lang('contacts.calendar.friday')</span></div>
                            <div class="cs-sked__item"><span class="cs-sked__time">10:00</span><span
                                    class="cs-sked__time">18:00</span></div>
                        </li>
                        <li class="cs-sked__list">
                            <div class="cs-sked__item"><span class="cs-sked__day">@lang('contacts.calendar.saturday')</span></div>
                            <div class="cs-sked__item"><span class="cs-sked__time">10:00</span><span
                                    class="cs-sked__time">18:00</span></div>
                        </li>
                        <li class="cs-sked__list">
                            <div class="cs-sked__item"><span class="cs-sked__day">@lang('contacts.calendar.sunday')</span></div>
                            <div class="cs-sked__item"><span class="cs-sked__time">10:00</span><span
                                    class="cs-sked__time">17:00</span></div>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
        <div class="cs-page__content-wrapper">
            <div class="cs-page__content">
                <div class="b-breadcrumb" data-bazooka="Breadcrumbs"
                     data-crumbs-path="[{&quot;name&quot;: &quot;SPARTA-GEAR&quot;, &quot;url&quot;: &quot;/ua/&quot;}, {&quot;name&quot;: &quot;\u041a\u043e\u043d\u0442\u0430\u043a\u0442\u0438&quot;, &quot;url&quot;: null}]"
                     data-crumbs-classnames="{}" data-qaid="breadcrumbs" data-bazid="7">
                    <ul class="styles__breadcrumbs--21aTH">
                        <li class="styles__item--3-4yf" title="Sparta-gear"><a href="{{ route('product.index') }}" data-qaid="breadcrumbs_item"
                                                                               class="styles__link--3o56i styles__icon--1Dim7">
                                <svg baseProfile="full" version="1.1" viewBox="0 0 16 16"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="m15.316708,6.684536l-6.592088,-6.225863c-0.196815,-0.148935 -0.39563,-0.379723 -0.646938,-0.379723l-0.105259,0c-0.251308,0 -0.450145,0.290621 -0.646915,0.439806l-6.655034,6.168643c-0.758855,0.622327 -0.775762,1.072473 -0.477278,1.433993c0.150685,0.182885 0.187566,0.280145 0.819165,0.280145l1.197615,-0.000341l0,5.967352c0,1.070859 0.535543,1.552478 1.387499,1.552478l1.417132,0l0.836867,-0.004999l0,-5.271193c0,-0.582673 0.332865,-0.757673 0.753469,-0.757673l2.884484,0c0.374973,0 0.702362,0.158002 0.702362,0.787465l0,5.234607l0.630303,0.011817l1.625173,0c0.897177,0 1.38759,-0.540134 1.38759,-1.464376l0,-6.058021l1.162688,-0.000205c0.588582,0 0.602284,0.016452 0.796441,-0.185521c0.395516,-0.411582 0.15732,-1.107468 -0.477278,-1.52839z"></path>
                                </svg>
                            </a></li>
                        <li class="styles__item--3-4yf" title="Контакти"><span
                                class="styles__text--1Pr_E styles__link--3o56i"
                                data-qaid="breadcrumbs_item">@lang('contacts.title')</span></li>
                    </ul>
                </div>
                <div class="cs-page__row">
                    <div
                        data-tg-ready="[{&quot;ns&quot;: &quot;main&quot;, &quot;method&quot;: &quot;gatrackQueueNi&quot;, &quot;args&quot;: [&quot;contact_view&quot;, &quot;view_contacts&quot;, {&quot;label/label&quot;: &quot;company_site-contact_view&quot;}], &quot;uuid&quot;: &quot;f6215e641744ac5ad223e8f84b11318839964456&quot;}, {&quot;ns&quot;: &quot;ga4&quot;, &quot;method&quot;: &quot;ga4trackQueueNi&quot;, &quot;args&quot;: [&quot;go_to_contact_page&quot;, {}], &quot;uuid&quot;: &quot;6433a9be9dc1c99e3e135643f54c68694cee57aa&quot;}, {&quot;ns&quot;: &quot;ym&quot;, &quot;method&quot;: &quot;reachGoal&quot;, &quot;args&quot;: [&quot;company_contacts_page&quot;], &quot;uuid&quot;: false}]">
                        <h1 class="cs-title-wrapper"><span class="cs-title">@lang('contacts.title')</span></h1>
                        <div class="cs-contact-info">
                            <div class="cs-online-edit"><a class="cs-online-edit__link" data-edit-role="companyInfo"
                                                           title="Редактировать контактную информацию"
                                                           style="display:none"></a><a
                                    class="cs-online-edit__vertical-borders" data-edit-role="companyInfo"
                                    style="display:none"></a><a class="cs-online-edit__horizontal-borders"
                                                                data-edit-role="companyInfo"
                                                                style="display:none"></a><span
                                    class="cs-contact-info__row" title="@lang('contacts.name')"
                                    data-qaid="company_name">{{ $info->company_name }}</span><span class="cs-contact-info__row"
                                                                                     title="@lang('contacts.person')"
                                                                                     data-qaid="contact_person_name">{{ $info->contact_person }}</span>
                                <address class="cs-contact-info__row" title="@lang('contacts.address')" data-qaid="company_address"><span
                                        class="cs-contact-info__comma" title="Хмельницький, Хмельницький, Україна">{{ $info->address }}</span>
                                </address>
                                <div id="ID-1aeeb2ff-ce5a-43bd-a087-16b50ee471bc" class="cs-contact-info__row"
                                     title="@lang('contacts.phone')" data-qaid="company_phones">
                                    <div class="cs-contact-info__phone-line js-ga-phone-hover"
                                         data-tg-hovered="[{&quot;ns&quot;: &quot;main&quot;, &quot;method&quot;: &quot;gatrackQueue&quot;, &quot;args&quot;: [&quot;contact_view&quot;, &quot;hover_phones&quot;, {&quot;label/label&quot;: &quot;company_site-contact_view&quot;}], &quot;uuid&quot;: &quot;cec63f85beae20842c7499c7181f9aa43a5b0b2e&quot;}, {&quot;ns&quot;: &quot;ga4&quot;, &quot;method&quot;: &quot;ga4trackQueue&quot;, &quot;args&quot;: [&quot;hover_phones&quot;, {}], &quot;uuid&quot;: &quot;4e92a0387e6f34f29450d658153e2311a9a4bd8f&quot;}, {&quot;ns&quot;: &quot;ym&quot;, &quot;method&quot;: &quot;reachGoal&quot;, &quot;args&quot;: [&quot;company_contacts_hovered&quot;], &quot;uuid&quot;: &quot;4e4e38200b10121d2620b45f0cb38f2ce6db161d&quot;}]"
                                         data-tg-clicked="[{&quot;ns&quot;: &quot;ga4&quot;, &quot;method&quot;: &quot;ga4trackQueue&quot;, &quot;args&quot;: [&quot;call_phones&quot;, {}], &quot;uuid&quot;: &quot;0fb6dc9f679fb331c05ab91bc83b3be7618dbfaa&quot;}]">
                                        <span class="cs-contact-info__phone notranslate">{{ $info->phone }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
