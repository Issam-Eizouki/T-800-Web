<div class="cui__menuLeft">
    <div class="cui__menuLeft__mobileTrigger"><span></span></div>
    <div class="cui__menuLeft__trigger"></div>
    <div class="cui__menuLeft__outer">
        <a href="{{ route('home') }}" class="cui__menuLeft__logo__container">
            <div class="cui__menuLeft__logo">
                <img class="licorminer_logo mr-2" src="components/kit/core/img/logo.svg" alt="City Tours CMS">
                <div class="cui__menuLeft__logo__name ml-2">CityTours</div>
            </div>
        </a>
        <div class="cui__menuLeft__scroll kit__customScroll">
            <ul class="cui__menuLeft__navigation">
                <li class="cui__menuLeft__item">
                    <a class="cui__menuLeft__item__link" id="left-menu-" href="{{ route('home') }}">
                        <span class="cui__menuLeft__item__title">Dashboard</span>
                        <i class="cui__menuLeft__item__icon fe fe-home"></i>
                    </a>
                </li>
                
                <li class="cui__menuLeft__item">
                    <a class="cui__menuLeft__item__link" id="left-menu-" href="{{ route('discovers') }}">
                        <span class="cui__menuLeft__item__title">Activities</span>
                        <i class="cui__menuLeft__item__icon fe fe-chevron-right"></i>
                    </a>
                </li>
                
                <li class="cui__menuLeft__item">
                    <a class="cui__menuLeft__item__link" id="left-menu-hotels" href="{{ route('hotels') }}">
                        <span class="cui__menuLeft__item__title">Hotels</span>
                        <i class="cui__menuLeft__item__icon fe fe-chevron-right"></i>
                    </a>
                </li>
                
                <li class="cui__menuLeft__item">
                    <a class="cui__menuLeft__item__link" id="left-menu-" href="{{ route('restaurants') }}">
                        <span class="cui__menuLeft__item__title">Restaurants</span>
                        <i class="cui__menuLeft__item__icon fe fe-chevron-right"></i>
                    </a>
                </li>
                
                <li class="cui__menuLeft__item">
                    <a class="cui__menuLeft__item__link" id="left-menu-" href="{{ route('bars') }}">
                        <span class="cui__menuLeft__item__title">Bars</span>
                        <i class="cui__menuLeft__item__icon fe fe-chevron-right"></i>
                    </a>
                </li>
                
                <li class="cui__menuLeft__category mt-2">Account</li>
                <li class="cui__menuLeft__item">
                    <a class="cui__menuLeft__item__link" href="{{ route('logout') }}">
                        <span class="cui__menuLeft__item__title">Sign Out</span>
                        <i class="cui__menuLeft__item__icon fe fe-log-out"></i>
                    </a>
                </li>
                
        </div>
    </div>
</div>
