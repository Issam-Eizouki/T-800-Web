<header id="colored">
    <div id="top_line" class="visible_on_mobile">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-5" id="social_top">
                    <a href="#0"><i class="icon-facebook"></i></a>
                    <a href="#0"><i class="icon-twitter"></i></a>
                    <a href="#0"><i class="icon-google"></i></a>
                    <a href="#0"><i class="icon-instagramm"></i></a>
                    </div>

                <div class="col-sm-6 col-7">
                    <ul id="top_links">
                        @if (!Session::has('access_token'))
                        <li><a href="#sign-in-dialog" id="access_link" class="access_link">{{ __('text.auth.login') }}</a></li>
                        @else
                        <li>
                            <!-- Language -->
                            <div class="dropdown dropdown-mini">
                                <a href="#" data-bs-toggle="dropdown" id="user_link" title="{{ Session::get('email') }}">{{ substr(Session::get('email'), 0, 10).'...' }}</a>
                                <div class="dropdown-menu" data-popper-placement="left-start">
                                    <ul id="lang_menu" class="header_sub_menu">
                                        <li><a href="{{ route('logout') }}">{{ __('text.auth.logout') }}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        @endif
                        <li>
                            <!-- Language -->
                            <div class="dropdown dropdown-mini">
                                <a href="#" data-bs-toggle="dropdown" id="lang_link">{{ app()->getLocale() == 'fr' ? __('text.language.fr') : __('text.language.en') }}</a>
                                <div class="dropdown-menu" data-popper-placement="left-start">
                                    <ul id="lang_menu" class="header_sub_menu">
                                        <li><a href="{{ route('locale', 'fr') }}">{{ __('text.language.fr') }}</a></li>
                                        <li><a href="{{ route('locale', 'en') }}">{{ __('text.language.en') }}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- End row -->
        </div>
        <!-- End container-->
    </div>

    <div class="container">
            <div class="row">
                <div class="col-3">
                    <div id="logo_home">
                        <h1><a href="{{ route('home') }}" title="City Tours">City Tours</a></h1>
                    </div>
                </div>

                <nav class="col-9">
                    <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
                    <div class="main-menu">
                        <div id="header_menu">
                            <img src="img/logo_sticky.png" width="160" height="34" alt="Strastour">
                        </div>
                        <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
                         <ul>
                            <li>
                                <a href="{{ route('home') }}" class="show-submenu" style="padding-right: 20px;">{{ __('text.page.home') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('discover') }}" class="show-submenu" style="padding-right: 20px;">{{ __('text.page.discover') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('hotel') }}" class="show-submenu" style="padding-right: 20px;">{{ __('text.page.hotels') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('restaurant') }}" class="show-submenu" style="padding-right: 20px;">{{ __('text.page.restaurants') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('bar') }}" class="show-submenu" style="padding-right: 20px;">{{ __('text.page.place_to_drink') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('trip') }}" class="show-submenu" style="padding-right: 20px;">{{ __('text.page.trip') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('transfers') }}" class="show-submenu" style="padding-right: 20px;">{{ __('text.page.transfer_serivces') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('blog') }}" class="show-submenu">{{ __('text.page.blog') }}</a>
                            </li>
                        </ul>
                    </div><!-- End main-menu -->
                    <ul id="top_tools">
                        <li>
                            <div class="dropdown dropdown-cart">
                                <a href="#" data-bs-toggle="dropdown" class="cart_bt"><i class="icon_bag_alt"></i><strong>3</strong></a>
                                <ul class="dropdown-menu" id="cart_items">
                                    <li>
                                        <div class="image"><img src="img/thumb.jpg" alt="image"></div>
                                        <strong><a href="#">Louvre museum</a>1x $36.00 </strong>
                                        <a href="#" class="action"><i class="icon-trash"></i></a>
                                    </li>
                                    <li>
                                        <div class="image"><img src="img/thumb.jpg" alt="image"></div>
                                        <strong><a href="#">Versailles tour</a>2x $36.00 </strong>
                                        <a href="#" class="action"><i class="icon-trash"></i></a>
                                    </li>
                                    <li>
                                        <div class="image"><img src="img/thumb.jpg" alt="image"></div>
                                        <strong><a href="#">Versailles tour</a>1x $36.00 </strong>
                                        <a href="#" class="action"><i class="icon-trash"></i></a>
                                    </li>
                                    <li>
                                        <div>Total: <span>$120.00</span></div>
                                        <a href="{{ route('transfers.cart') }}" class="button_drop">{{ __('text.go_to_cart') }}</a>
                                        <a href="{{ route('transfers.booking.payment') }}" class="button_drop outline">{{ __('text.check_out') }}</a>
                                    </li>
                                </ul>
                            </div><!-- End dropdown-cart-->
                        </li>
                    </ul>
                </nav>
            </div>
        </div><!-- container -->
</header>
