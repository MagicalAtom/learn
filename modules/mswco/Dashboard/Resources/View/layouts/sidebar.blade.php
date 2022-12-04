<div class="sidebar__nav border-top border-left  ">
    <span class="bars d-none padding-0-18"></span>
    <a class="header__logo  d-none" href="https://webamooz.net"></a>
   <x-profilephoto></x-profilephoto>
    <ul>
    @foreach(config('sidebar.items') as $sidebar)
            <li class="item-li {{ $sidebar['icon'] }} @if(str_starts_with(request()->url(),$sidebar['url'])) is-active @endif"><a href="{{  $sidebar['url'] }}">{{ $sidebar['title']  }}</a></li>
        @endforeach
{{--        <li class="item-li i-courses "><a href="courses.html">دوره ها</a></li>--}}
{{--        <li class="item-li i-users"><a href="users.html"> کاربران</a></li>--}}
{{--        <li class="item-li i-categories"><a href="categories.html">دسته بندی ها</a></li>--}}
{{--        <li class="item-li i-slideshow"><a href="slideshow.html">اسلایدشو</a></li>--}}
{{--        <li class="item-li i-banners"><a href="banners.html">بنر ها</a></li>--}}
{{--        <li class="item-li i-articles"><a href="articles.html">مقالات</a></li>--}}
{{--        <li class="item-li i-ads"><a href="ads.html">تبلیغات</a></li>--}}
{{--        <li class="item-li i-comments"><a href="comments.html"> نظرات</a></li>--}}
{{--        <li class="item-li i-tickets"><a href="tickets.html"> تیکت ها</a></li>--}}
{{--        <li class="item-li i-discounts"><a href="discounts.html">تخفیف ها</a></li>--}}
{{--        <li class="item-li i-transactions"><a href="transactions.html">تراکنش ها</a></li>--}}
{{--        <li class="item-li i-checkouts"><a href="checkouts.html">تسویه حساب ها</a></li>--}}
{{--        <li class="item-li i-checkout__request "><a href="checkout-request.html">درخواست تسویه </a></li>--}}
{{--        <li class="item-li i-my__purchases"><a href="mypurchases.html">خرید های من</a></li>--}}
{{--        <li class="item-li i-my__peyments"><a href="mypeyments.html">پرداخت های من</a></li>--}}
{{--        <li class="item-li i-notification__management"><a href="notification-management.html">مدیریت اطلاع رسانی</a>--}}
{{--        </li>--}}
    </ul>

</div>
