@extends('auth.layout.index')

@push('content')
    <div class="cui__auth__containerInner">
        <a class="text-center mb-5" href="{{ route('home') }}">
            <h1 class="mb-5 px-3 font-weight-bold">
                City<span class="text-primary"> Tours</span>
            </h1>
        </a>
        <div class="card cui__auth__boxContainer">
            <div class="mb-5">
                <a class="btn btn-danger text-center w-100" href="{{ route('login.google') }}">
                    <i class="icmn-google mr-1"></i> Google
                </a>
            </div>
            <div class="text-dark font-size-24 mb-4">Your Account</div>
            <form id="form-validation-login" name="form-validation-login"
                class="mb-2" method="post" action="{{ route('login') }}">
            @csrf
                <div class="form-group mb-4">
                    <input name="email"
                        class="form-control"
                        type="text" maxlength="255" autofocus="autofocus"
                        placeholder="{{ trans('label.email.pld') }}"
                        name-validation="{{ trans('label.email.vln') }}"
                        data-validation="[NOTEMPTY,EMAIL]">
                </div>
                <div class="form-group mb-4">
                    <input name="password" autocomplete="cc-csc"
                        class="form-control show-password"
                        type="password" maxlength="255"
                        placeholder="{{ trans('label.password.pld') }}"
                        name-validation="{{ trans('label.password.vln') }}"
                        data-validation="[NOTEMPTY]">
                </div>
                <button id="button-login" type="submit" data-style="slide-right"
                    class="btn btn-primary text-center w-100 mt-2 ladda-button">
                        <span class="ladda-label">Sign In</span>
                </button>
            </form>
        </div>
    </div>
@endpush

@push('js')
    <script>
    $('#alert-error').on('hidden.bs.modal', function(e) {
        e.preventDefault();
        $('input[name=email]').focus();
    });
    $('#alert-success').on('hidden.bs.modal', function(e) {
        e.preventDefault();
        $('input[name=email]').focus();
    });
    
    $(function() {
        $('#form-validation-login').validate({
            messages: {
                'NOTEMPTY': "{{ trans('validation.required', ['field' => '$']) }}",
                'EMAIL': "{{ trans('validation.email') }}",
            },
            submit: {
                settings: {
                    inputContainer: '.form-group',
                    errorListClass: 'form-control-error-list',
                    errorClass: 'has-danger',
                },
                callback: {
                    onBeforeSubmit: function() {
                        var l = Ladda.create(document.querySelector("button[type='submit']"));
                        l.start();
                    }
                }
            }
        })
        $('#form-validation-login .remove-error').on('click', function() {
            $('#form-validation-login').removeError();
        })
    })
    </script>
@endpush