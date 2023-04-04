<!-- Sign In Popup -->
<div id="register-dialog" class="zoom-anim-dialog mfp-hide">
	<div class="small-dialog-header">
        <h3>Sign Up</h3>
    </div>
    <div class="sign-in-wrapper">
        <form id="formRegister" method="post" action="{{ route('register') }}">
        @csrf
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                <i class="icon_mail_alt"></i>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="password form-control" name="password" id="password1">
                <i class="icon_lock_alt"></i>
            </div>
            <div class="form-group">
                <label>Confirm password</label>
                <input type="password" class="password form-control" id="password2">
                <i class="icon_lock"></i>
            </div>
            <div id="errorInfo" class="clearfix"></div>
            <div class="text-center add_bottom_15">
                <button class="btn_1">{{ __('text.auth.register') }}</button>
            </div>
            <div class="text-center">
                {{ __('text.already_have_account') }} <a href="#sign-in-dialog" class="access_link">{{ __('text.auth.login') }}</a>
            </div>
        </form>
    </div>
    <!--form -->
</div>
<!-- /Sign In Popup -->
