@extends('layout.app')

@push('pagename')  @endpush

@push('content')
    @include('discover.search')
    <main>
        <div id="position">
            <div class="container">
                <ul>
                    <li><a href="{{ route('home') }}">{{ __('text.page.home') }}</a></li>
                    <li><a href="{{ route('discover') }}">{{ __('text.page.discover') }}</a></li>
                </ul>
            </div>
        </div>
        <!-- End Position -->

        <div class="collapse" id="collapseMap">
            <div id="map" class="map"></div>
        </div>
        <!-- End Map -->

        <div class="container margin_60">
            <div class="row">
                <aside class="col-lg-3">
                    <p>
                        <a class="btn_map" data-bs-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">View on map</a>
                    </p>

                    @include('layout.left-nav')
                    @include('layout.help-box')
                </aside>
                <!--End aside -->

                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-md-6 wow zoomIn" data-wow-delay="0.1s">
                            <div class="tour_container">
                                <div class="img_container">
                                    <a href="{{ route('discover.place') }}">
                                        <img src="img/bg_tour.jpg" width="800" height="533" class="img-fluid" alt="Image">
                                        <div class="short_info">
                                            <i class="icon_set_1_icon-44"></i>Historic Buildings
                                        </div>
                                    </a>
                                </div>
                                <div class="tour_title">
                                    <h3><strong>Palais Rohan</strong></h3>
                                    <span>asdfasdf asdfasdf asdfasdf</span>
<!--                                     <div class="wishlist"> -->
<!--                                         <a class="tooltip_flip tooltip-effect-1" href="#">+<span class="tooltip-content-flip"><span class="tooltip-back">Add to wishlist</span></span></a> -->
<!--                                     </div> -->
                                </div>
                            </div>
                            <!-- End box tour -->
                        </div>
                        <!-- End col-md-6 -->

                        <div class="col-md-6 wow zoomIn" data-wow-delay="0.2s">
                            <div class="tour_container">
                                <div class="img_container">
                                    <a href="{{ route('discover.place') }}">
                                        <img src="img/bg_tour.jpg" width="800" height="533" class="img-fluid" alt="Image">
                                        <div class="short_info">
                                            <i class="icon_set_1_icon-43"></i>Churches
                                        </div>
                                    </a>
                                </div>
                                <div class="tour_title">
                                    <h3><strong>Notredame</strong></h3>
                                    <span>asdfasdf asdfasdf asdfasdf</span>
                                </div>
                            </div>
                            <!-- End box tour -->
                        </div>
                        <!-- End col-md-6 -->
                    </div>
                    <!-- End row -->

                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active"><span class="page-link">1</span>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- end pagination-->

                </div>
                <!-- End col lg 9 -->
            </div>
            <!-- End row -->
        </div>
        <!-- End container -->
    </main>
    <!-- End main -->
@endpush

@push('js')
    <!-- Map -->
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script src="js/map.js"></script>
    <script src="js/infobox.js"></script>
@endpush