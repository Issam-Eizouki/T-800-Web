<section id="hero_2" class="background-image" data-background="url(img/banners/transfer_top.jpg)">
    <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
        <div class="intro_title">
            <h1>{{ __('text.cart.title') }}</h1>
            <div class="bs-wizard row">
                <div class="col-4 bs-wizard-step {{ Route::currentRouteName() == 'transfers.cart' ? 'active' : 'complete' }}">
                    <div class="text-center bs-wizard-stepnum">{{ __('text.cart.step_cart') }}</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    @if (Route::currentRouteName() == 'transfers.booking.complete')
                    <a href="javascript:void('0');" class="bs-wizard-dot"></a>
                    @else
                    <a href="{{ route('transfers.cart') }}" class="bs-wizard-dot"></a>
                    @endif
                </div>
                @if (Route::currentRouteName() == 'transfers.cart')
                <div class="col-4 bs-wizard-step disabled">
                @else
                <div class="col-4 bs-wizard-step {{ Route::currentRouteName() == 'transfers.booking.payment' ? 'active' : 'complete' }}">
                @endif
                    <div class="text-center bs-wizard-stepnum">{{ __('text.cart.step_info') }}</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    @if (Route::currentRouteName() == 'transfers.booking.complete')
                    <a href="javascript:void('0');" class="bs-wizard-dot"></a>
                    @else
                    <a href="{{ route('transfers.booking.payment') }}" class="bs-wizard-dot"></a>
                    @endif
                </div>
                <div class="col-4 bs-wizard-step {{ Route::currentRouteName() == 'transfers.booking.complete' ? 'active' : 'disabled' }}">
                    <div class="text-center bs-wizard-stepnum">{{ __('text.cart.step_finish') }}</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="{{ route('transfers.booking.complete') }}" class="bs-wizard-dot"></a>
                </div>

            </div>
            <!-- End bs-wizard -->
        </div>
        <!-- End intro-title -->
    </div>
    <!-- End opacity-mask-->
</section>
<!-- End Section hero_2 -->
