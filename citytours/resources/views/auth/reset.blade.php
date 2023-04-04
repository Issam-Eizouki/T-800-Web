@extends('layout.app')

@push('pagename')  @endpush

@push('content')
<main>
    <section id="hero" class="login">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8">
                    <div id="reset">
                        <div class="text-center"><img src="img/logo_sticky.png" alt="Image" width="160" height="34"></div>
                        <hr>
                        <div class="sign-in-wrapper">
                            <form id="reset-form" method="post" action="{{ route('password.reset') }}">
                            <input type="hidden" name="reset_token" value="{{ request()->get('token') }}" />
                            @csrf
                                <div class="form-group">
                                    <label>{{ __('text.user.email') }}</label>
                                    <input type="email" class="form-control" name="email" value="{{ $email }}" readonly>
                                    <i class="icon_mail_alt"></i>
                                </div>
                                <div class="form-group">
                                	<label>{{ __('text.user.new_password') }}</label>
                                    <input type="password" class="form-control password" name="password" id="rpassword1">
                                    <i class="icon_lock_alt"></i>
                                </div>
                                <div class="form-group">
                                	<label>{{ __('text.user.confirm_password') }}</label>
                                    <input type="password" class="form-control password" id="rpassword2">
                                    <i class="icon_lock"></i>
                                </div>
                                <div id="rerrorInfo" class="clearfix"></div>
                                <div class="text-center add_bottom_15">
                                    <button class="btn_1">{{ __('text.reset_password') }}</button>
                                </div>
                                <div class="text-center">
                                    {{ __('text.already_have_account') }} <a href="#sign-in-dialog" class="access_link">{{ __('text.auth.login') }}</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endpush

@push('js')
<script src="custom/js/reset.js"></script>
@endpush

