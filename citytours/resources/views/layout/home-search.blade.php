<div id="search_container_2" style="background-image: url('img/banners/slide_home_3.jpg')">
    <div id="search_2">
        <ul class="nav nav-tabs">
            <li><a href="#discover" data-bs-toggle="tab" class="active show" id="tab_bt_1"><span>{{ __('text.page.discover') }}</span></a></li>
            <li><a href="#hotels" data-bs-toggle="tab" id="tab_bt_3"><span>{{ __('text.page.hotels') }}</span></a></li>
            <li><a href="#restaurants" data-bs-toggle="tab" id="tab_bt_2"><span>{{ __('text.page.restaurants') }}</span></a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade active show" id="discover">
                <form action="{{ route('discover') }}">
                    <div class="row g-0 custom-search-input-2">
                        <div class="col-lg-10">
                            <div class="form-group">
                                <input class="form-control" type="text" name="city" id="discoverSearch">
                                <i class="icon-location-2"></i>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <input type="submit" class="btn_search" value="{{ __('text.search_now') }}">
                        </div>
                    </div>
                    <!-- /row -->
                </form>
            </div>
            <!-- End tab -->
            <div class="tab-pane fade" id="hotels">
               <form>
                    <div class="row g-0 custom-search-input-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input class="form-control" type="text" name="city" id="hotelSearch">
                                <i class="icon-location-2"></i>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <input class="form-control date-pick" type="text" name="dates" placeholder="When..">
                                <i class="icon_calendar"></i>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="panel-dropdown">
                                <a href="#">Guests <span class="qtyTotal discover">1</span></a>
                                <div class="panel-dropdown-content">
                                    <!-- Quantity Buttons -->
                                    <div class="qtyButtons discover">
                                        <label>Adults</label>
                                        <input type="text" name="qtyInput_discover" value="1">
                                    </div>
                                    <div class="qtyButtons discover">
                                        <label>Childrens</label>
                                        <input type="text" name="qtyInput_discover" value="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <input type="submit" class="btn_search" value="{{ __('text.search_now') }}">
                        </div>
                    </div>
                    <!-- /row -->
                </form>
            </div>
            <!-- End tab -->
            <div class="tab-pane fade" id="restaurants">
                <form action="{{ route('restaurant') }}">
                    <div class="row g-0 custom-search-input-2">
                        <div class="col-lg-10">
                            <div class="form-group">
                                <input class="form-control" type="text" name="city" id="restoSearch">
                                <i class="icon-location-2"></i>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <input type="submit" class="btn_search" value="{{ __('text.search_now') }}">
                        </div>
                    </div>
                    <!-- /row -->
                </form>
            </div>
            <!-- End tab -->
        </div>
    </div>
    <!-- End search_container_2 -->
</div>
<!-- End search_container -->

@push('js')
    <script>
        const discoverSearch = new autoComplete({
            selector: "#discoverSearch",
            placeHolder: "Search for our cities ...",
            data: {
                src: ["Strasbourg - France", "Paris - France", "London - England"],
                cache: true,
            },
            resultItem: { highlight: true },
            events: {
                input: {
                    selection: (event) => {
                        const selection = event.detail.selection.value;
                        discoverSearch.input.value = selection;
                        hotelSearch.input.value = selection;
                        restoSearch.input.value = selection;
                    }
                }
            }
        });

        const hotelSearch = new autoComplete({
            selector: "#hotelSearch",
            placeHolder: "Search for our cities ...",
            data: {
                src: ["Strasbourg - France", "Paris - France", "London - England"],
                cache: true,
            },
            resultItem: { highlight: true },
            events: {
                input: {
                    selection: (event) => {
                        const selection = event.detail.selection.value;
                        hotelSearch.input.value = selection;
                        discoverSearch.input.value = selection;
                        restoSearch.input.value = selection;
                    }
                }
            }
        });

        const restoSearch = new autoComplete({
            selector: "#restoSearch",
            placeHolder: "Search for our cities ...",
            data: {
                src: ["Strasbourg", "Paris - France", "London - England"],
                cache: true,
            },
            resultItem: { highlight: true },
            events: {
                input: {
                    selection: (event) => {
                        const selection = event.detail.selection.value;
                        hotelSearch.input.value = selection;
                        discoverSearch.input.value = selection;
                        restoSearch.input.value = selection;
                    }
                }
            }
        });

        $(function() {
            'use strict';
            $('input[name="dates"]').daterangepicker({
                autoUpdateInput: false,
                minDate: new Date(),
                autoApply: true,
                locale: { cancelLabel: "{{ __('text.clear') }}", applyLabel: "{{ __('text.apply') }}" }
            });
            $('input[name="dates"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('MM/DD') + ' - ' + picker.endDate.format('MM/DD'));
            });
            $('input[name="dates"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });
        });
    </script>

    <!-- Input quantity  -->
    <script src="js/input_qty.js"></script>
@endpush
