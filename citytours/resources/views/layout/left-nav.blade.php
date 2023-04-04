<div class="box_style_cat">
    <ul id="cat_nav">
        <li>
            <a href="{{ route('discover') }}"><i class="icon_set_1_icon-3"></i>{{ __('text.page.activities') }} <span>(20)</span></a>
        </li>
        <li>
            <a href="{{ route('hotel') }}"><i class="icon_set_2_icon-104"></i>{{ __('text.page.hotels') }} <span>(11)</span></a>
        </li>
        <li>
            <a href="{{ route('restaurant') }}"><i class="icon_set_1_icon-14"></i>{{ __('text.page.restaurants') }} <span>(16)</span></a>
        </li>
        <li>
            <a href="{{ route('bar') }}"><i class=" icon_set_1_icon-20"></i>{{ __('text.page.place_to_drink') }} <span>(12)</span></a>
        </li>
        <li>
            <a href="#"><i class="icon_set_1_icon-37"></i>{{ __('text.page.restaurants') }} <span>(16)</span></a>
        </li>
    </ul>
</div>


@push('js')
    <!-- Cat nav mobile -->
    <script src="js/cat_nav_mobile.js"></script>
    <script>
        $('#cat_nav').mobileMenu();
    </script>
@endpush