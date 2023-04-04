<div id="search_container_2" style="background-image: url('img/banners/bars_bg.jpg')">
    <div id="search_2">
        <div class="tab-content">
            <div class="tab-pane fade active show">
               <form>
                    <div class="row g-0 custom-search-input-2">
                        <div class="col-lg-10">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Where ..." id="autocomplete">
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