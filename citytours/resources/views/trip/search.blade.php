<div id="search_container_2" style="height:450px; background-image: url('img/banners/events_bg.jpg')">
    <div id="search_2">
        <ul class="nav nav-tabs" role="tablist">
            <li><a href="javascrip:void(0);" data-bs-toggle="tab" class="show active" aria-selected="true" role="tab" id="tab_bt_1">{{ __('text.page.trip') }}</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active show">
                <form action="{{ route('travel') }}">
                    <div class="row g-0 custom-search-input-2">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <input class="form-control" type="text" id="originSearch" name="origin" value="{{ old('origin') }}">
                                <i class="icon-right-outline"></i>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <input class="form-control" type="text" id="destinationSearch" name="destination" value="{{ old('destination') }}">
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
        const originSearch = new autoComplete({
            selector: "#originSearch",
            placeHolder: "Departure city",
            data: {
                src: ["Strasbourg", "Paris", "Toulouse"],
                cache: true,
            },
            resultItem: { highlight: true },
            events: {
                input: {
                    selection: (event) => {
                        originSearch.input.value = event.detail.selection.value;
                    }
                }
            }
        });
        const destinationSearch = new autoComplete({
            selector: "#destinationSearch",
            placeHolder: "Destination city",
            data: {
                src: ["Strasbourg", "Paris", "Toulouse"],
                cache: true,
            },
            resultItem: { highlight: true },
            events: {
                input: {
                    selection: (event) => {
                        destinationSearch.input.value = event.detail.selection.value;
                    }
                }
            }
        });
    </script>
@endpush
