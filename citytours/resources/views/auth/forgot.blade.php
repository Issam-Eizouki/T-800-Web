<!-- Sign In Popup -->
<div id="forgot-dialog" class="zoom-anim-dialog mfp-hide">
	<div class="small-dialog-header">
        <h3>{{ __('text.forgot_password') }}</h3>
    </div>
    <div class="sign-in-wrapper">
        <form id="forgotForm" method="post" action="{{ route('password.forgot') }}">
        @csrf
            <div class="form-group add_bottom_15">
                <label>{{ __('text.forgot_password_title') }}</label>
                    <input type="email" class="form-control" name="email" id="femail" value="{{ old('email') }}">
                    <i class="icon_mail_alt"></i>
                </div>
                <p>{{ __('text.forgot_password_description') }}</p>
                <div id="ferrorInfo" class="clearfix"></div>
                <div class="text-center add_bottom_15">
                    <input type="submit" value="Reset Password" class="btn_1">
                </div>
        </form>
        <div class="text-center">
            <a href="#sign-in-dialog" class="access_link">{{ __('text.back_to_login') }}</a>
        </div>
    </div>
    <!--form -->
</div>
<!-- /Sign In Popup -->
