<div class="cui__topbar">
    <div class="d-block d-sm-none">
        <a href="{{ route('home') }}" class="cui__menuLeft__logo__container pl-0 mr-4">
            <div class="cui__menuLeft__logo">
                <img class="licorminer_logo mr-2" src="components/kit/core/img/logo.svg" alt="City Tours CMS">
            </div>
        </a>
    </div>
    <div class="mr-auto">
    </div>
    @if (Session::has('access_token'))
    <div class="dropdown ml-4">
        <a href="" class="dropdown-toggle text-nowrap font-weight-bold" data-toggle="dropdown" aria-expanded="false" data-offset="5,15">
            {{ substr(Session::get('email'), 0, 3).'***'.substr(Session::get('email'), strpos(Session::get('email'), '@')) }}
        </a>
        <div class="dropdown-menu dropdown-menu-right" role="menu">
            <a class="dropdown-item" href="{{ route('logout') }}">
                <i class="dropdown-icon fe fe-log-out"></i>
                Sign Out
            </a>
        </div>
    </div>
    @else
    <div class="ml-4">
        <a class="font-weight-bold text-primary" href="{{ route('login') }}">Sign In</a>
    </div>
    @endif
</div>