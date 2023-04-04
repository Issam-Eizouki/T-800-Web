@extends('layout.app')

@push('pagename')  @endpush

@push('content')
    <!-- Banner -->
    <section class="parallax-window" data-parallax="scroll" data-image-src="img/banners/transfer_top.jpg" data-natural-width="1400" data-natural-height="470">
        <div class="parallax-content-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h1>Luxury Car Transfer</h1>
                    </div>
                    <div class="col-md-4">
                        <div id="price_single_main">
                            {{ __('text.service_price_notice') }} <span>39<sup>€</sup></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner -->

    <main>
        <div id="position">
            <div class="container">
                <ul>
                    <li><a href="{{ route('home') }}">{{ __('text.page.home') }}</a></li>
                    <li><a href="{{ route('transfers') }}">{{ __('text.page.transfer_serivces') }}</a></li>
                    <li>Luxury Car Transfer</li>
                </ul>
            </div>
        </div>
        <!-- End Position -->

        <div class="container margin_60">
            <div class="row">
                <div class="col-lg-8" id="single_tour_desc">

                    <div id="single_tour_feat">
                        <ul>
                            <li><i class="icon_set_1_icon-29"></i>Up to 6 passengers</li>
                            <li><i class="icon_set_1_icon-6"></i>Hotel Pick up</li>
                            <li><i class="icon_set_1_icon-13"></i>Accessibiliy</li>
                            <li><i class="icon_set_1_icon-82"></i>144 Likes</li>
                            <li><i class="icon_set_1_icon-22"></i>Pet allowed</li>
                            <li><i class="icon_set_1_icon-33"></i>Large baggage</li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="col-lg-3">
                            <h3>Description</h3>
                        </div>
                        <div class="col-lg-9">
                            <p>
                                Lorem ipsum dolor sit amet, at omnes deseruisse pri. Quo aeterno legimus insolens ad. Sit cu detraxit constituam, an mel iudico constituto efficiendi. Eu ponderum mediocrem has, vitae adolescens in pro. Mea liber ridens inermis ei, mei legendos vulputate an, labitur tibique te qui.
                            </p>
                            <h4>What's include</h4>
                            <p>
                                Lorem ipsum dolor sit amet, at omnes deseruisse pri. Quo aeterno legimus insolens ad. Sit cu detraxit constituam, an mel iudico constituto efficiendi.
                            </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list_ok">
                                        <li>Lorem ipsum dolor sit amet</li>
                                        <li>No scripta electram necessitatibus sit</li>
                                        <li>Quidam percipitur instructior an eum</li>
                                        <li>Ut est saepe munere ceteros</li>
                                        <li>No scripta electram necessitatibus sit</li>
                                        <li>Quidam percipitur instructior an eum</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list_ok">
                                        <li>Lorem ipsum dolor sit amet</li>
                                        <li>No scripta electram necessitatibus sit</li>
                                        <li>Quidam percipitur instructior an eum</li>
                                        <li>No scripta electram necessitatibus sit</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End row  -->
                        </div>
                    </div>
                </div>
                <!--End  single_tour_desc-->

                <aside class="col-lg-4">
                    <div class="box_style_1 expose">
                        <h3 class="inner">- Booking -</h3>
                        <form method="post" action="{{ route('transfers.service.book') }}">
                            @csrf
                            <div class="form-group">
                                <label>Pick up Airport</label>
                                @if ($airports)
                                <div class="styled-select-common">
                                    <select id="pickup" name="pickup">
                                        @foreach ($airports as $airport)
                                            <option value="{{ $airport->id }}">{{ $airport->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label><i class="icon-calendar-7"></i> Date</label>
                                        <input class="date-pick form-control" type="text" name="date">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label><i class="icon-clock"></i> Time</label>
                                        <input class="time-pick form-control" value="08:00" type="text" name="time">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Adults</label>
                                        <div class="numbers-row">
                                            <input type="text" value="1" id="adults" class="qty2 form-control" name="adults" onchange="changeQty();">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Children</label>
                                        <div class="numbers-row">
                                            <input type="text" value="0" id="children" class="qty2 form-control" name="children">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button class="btn_full" type="submit">{{ __('text.book') }}</button>
                        </form>
                    </div>
                    <!--/box_style_1 -->

                    @include('layout.help-box')
                </aside>
            </div>
            <!--End row -->
        </div>
        <!--End container -->

        <div id="overlay"></div>
        <!-- Mask on input focus -->

    </main>
    <!-- End main -->
@endpush

@push('js')
<script>
    <!-- Date and time pickers -->
    $(function() {
        $('input.date-pick').daterangepicker({
            autoUpdateInput: true,
            singleDatePicker: true,
            autoApply: true,
            minDate: new Date(),
            showCustomRangeLabel: false,
            locale: { format: 'MM/DD/YYYY' }
        }, function(start, end, label) {
            console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('DD-MM-YYYY') + ' (predefined range: ' + label + ')');
        });
        $('input.time-pick').timepicker({
            timeFormat: 'HH:mm',
            minuteStep: 15,
            showInpunts: false,
            showMeridian: false,
        });
    });
</script>
@endpush
