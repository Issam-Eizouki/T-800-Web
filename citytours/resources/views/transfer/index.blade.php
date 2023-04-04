@extends('layout.app')

@push('pagename')  @endpush

@push('content')
    @include('transfer.banner')

    <main>
        <div id="position">
            <div class="container">
                <ul>
                    <li><a href="{{ route('home') }}">{{ __('text.page.home') }}</a></li>
                    <li><a href="{{ route('transfers') }}">{{ __('text.page.transfer_serivces') }}</a></li>
                </ul>
            </div>
        </div>
        <!-- End Position -->

        <div class="container margin_60">
            <div class="row">
                <aside class="col-lg-3">
                    @include('layout.help-box')
                </aside>
                <!--End aside -->

                <div class="col-lg-9">
                    <div class="strip_all_tour_list wow fadeIn" data-wow-delay="0.1s">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 position-relative">
                                <div class="ribbon_3"><span>New</span>
                                </div>
                                <div class="img_list">
                                    <a href="single_transfer.html"><img src="img/transfer_1.jpg" alt="Image"></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="tour_list_desc">
                                    <h3><strong>Luxury</strong> Car Transfer</h3>
                                    <p>Lorem ipsum dolor sit amet, quem convenire interesset ut vix, ad dicat sanctus detracto vis. Eos modus dolorum ex...</p>
                                    <ul class="add_info">
                                        <li>
                                            <div class="tooltip_styled tooltip-effect-4">
                                                <span class="tooltip-item"><i class="icon_set_1_icon-70"></i></span>
                                                <div class="tooltip-content">
                                                    <h4>Passengers</h4> Up to 40 passengers.
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tooltip_styled tooltip-effect-4">
                                                <span class="tooltip-item"><i class="icon_set_1_icon-6"></i></span>
                                                <div class="tooltip-content">
                                                    <h4>Pick up</h4> Hotel pick up or different place with an extra cost.
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tooltip_styled tooltip-effect-4">
                                                <span class="tooltip-item"><i class="icon_set_1_icon-13"></i></span>
                                                <div class="tooltip-content">
                                                    <h4>Accessibility</h4> On request accessibility available.
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tooltip_styled tooltip-effect-4">
                                                <span class="tooltip-item"><i class="icon_set_1_icon-22"></i></span>
                                                <div class="tooltip-content">
                                                    <h4>Pet allowed</h4> On request pet allowed.
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tooltip_styled tooltip-effect-4">
                                                <span class="tooltip-item"><i class="icon_set_1_icon-33"></i></span>
                                                <div class="tooltip-content">
                                                    <h4>Baggage</h4> Large baggage drop available.
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <div class="price_list">
                                    <div><sup>$</sup>39*<span class="normal_price_list">$99</span><small>{{ __('text.service_price_notice') }}</small>
                                        <p><a href="{{ route('transfers.service') }}" class="btn_1">{{ __('text.details') }}</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End strip -->
                </div>
                <!-- End col lg-9 -->
            </div>
            <!-- End row -->
        </div>
        <!-- End container -->
    </main>
    <!-- End main -->
@endpush
