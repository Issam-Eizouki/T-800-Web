<!-- Sign In Popup -->
<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">
    <div class="small-dialog-header">
        <h3>Sign In</h3>
    </div>
    <div class="sign-in-wrapper">
        <div>
            <a href="{{ route('login.google') }}" class="social_bt google">Login with Google</a>
            <div class="divider"><span>Or</span></div>
            <form id="login-form" method="post" action="{{ route('login') }}">
            @csrf
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" id="lemail">
                    <i class="icon_mail_alt"></i>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="password form-control" name="password" id="lpassword">
                    <i class="icon_lock_alt"></i>
                </div>
                <div id="lerrorInfo" class="clearfix"></div>
                <div class="clearfix add_bottom_15">
                    <div class="float-end"><a href="#forgot-dialog" id="forgot_link">{{ __('text.forgot_password') }}</a></div>
                </div>
                <div class="text-center add_bottom_15">
                    <button class="btn_1">{{ __('text.auth.login') }}</button>
                </div>
            </form>
            <div class="text-center">
                {{ __('text.do_not_have_account') }} <a href="#register-dialog" id="register_link">{{ __('text.auth.register') }}</a>
            </div>
        </div>
    </div>
</div>
<!-- /Sign In Popup -->