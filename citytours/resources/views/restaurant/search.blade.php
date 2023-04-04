<div id="search_container_2" style="background-image: url('img/banners/restaurant_top.jpg')">
    <div id="search_2">
        <ul class="nav nav-tabs" role="tablist">
            <li><a href="javascrip:void(0);" data-bs-toggle="tab" class="show active"
                aria-selected="true" role="tab" id="tab_bt_2">{{ __('text.page.restaurants') }}</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active show">
               <form action={{ route('restaurant') }}>
                    <div class="row g-0 custom-search-input-2">
                        <div class="col-lg-10">
                            <div class="form-group">
                                <input class="form-control" type="text" id="restoSearch" name="city" value="{{ Request::get('city') }}">
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
        const restoSearch = new autoComplete({
            selector: "#restoSearch",
            placeHolder: "Departure city",
            data: {
                src: ["Strasbourg", "Paris", "Toulouse"],
                cache: true,
            },
            resultItem: { highlight: true },
            events: {
                input: {
                    selection: (event) => {
                        restoSearch.input.value = event.detail.selection.value;
                    }
                }
            }
        });
    </script>
@endpush
