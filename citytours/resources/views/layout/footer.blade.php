<footer id="pattern_4">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <h3>{{ __('text.need_help') }}</h3>
                <a href="tel://004542344599" id="phone">+45 423 445 99</a>
                <a href="mailto:help@Strastour.com" id="email_footer">help@Strastour.com</a>
            </div>
            <div class="col-lg-2 col-md-3">
                <h3>{{ __('text.footer.about') }}</h3>
                <ul>
                    <li><a href="{{ route('home') }}">{{ __('text.page.home') }}</a></li>
                    <li><a href="#">{{ __('text.page.transfer_serivces') }}</a></li>
                    <li><a href="#">Register</a></li>
                    <li><a href="#">{{ __('text.cookie.policy') }}</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-5">
                <h3>{{ __('text.footer.discover') }}</h3>
                <ul>
                    <li><a href="#">{{ __('text.footer.tours') }}</a></li>
                    <li><a href="#">{{ __('text.page.hotels') }}</a></li>
                    <li><a href="#">{{ __('text.page.restaurants') }}</a></li>
                    <li><a href="#">{{ __('text.page.blog') }}</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-12">
                <h3>Settings</h3>
                <ul id="lang_menu">
                    <li><a href="{{ route('locale', 'fr') }}">{{ __('text.language.fr') }}</a></li>
                    <li><a href="{{ route('locale', 'en') }}">{{ __('text.language.en') }}</a></li>
                </ul>
            </div>
        </div>
        <!-- End row -->
        <div class="row">
            <div class="col-lg-12">
                <div id="social_footer">
                    <ul>
                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icon-google"></i></a></li>
                        <li><a href="#"><i class="icon-instagram"></i></a></li>
                        <li><a href="#"><i class="icon-pinterest"></i></a></li>
                        <li><a href="#"><i class="icon-youtube-play"></i></a></li>
                    </ul>
                    <p>© City Tours 2023</p>
                </div>
            </div>
        </div>
        <!-- End row -->
    </div>
    <!-- End container -->
</footer>
<!-- End footer -->
