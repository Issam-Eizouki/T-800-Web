@extends('layout.app')

@push('pagename')  @endpush

@push('content')
    <section class="parallax-window" data-parallax="scroll" data-image-src="img/banner.jpg" data-natural-width="1400" data-natural-height="470">
        <div class="parallax-content-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h1>Palaise Rohan</h1>
                        <span>Champ de Mars, 5 Avenue Anatole, 67000 Strasbourg.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End section -->
    
    <main>
        <div id="position">
            <div class="container">
                <ul>
                    <li><a href="{{ route('home') }}">{{ __('text.page.home') }}</a></li>
                    <li><a href="{{ route('hotel') }}">{{ __('text.page.hotels') }}</a></li>
                    <li>Place ABC</li>
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
                <div class="col-lg-12" id="single_tour_desc">
                    <div id="single_tour_feat">
                        <ul>
                            <li><i class="icon_set_1_icon-4"></i>Museum</li>
                            <li><i class="icon_set_1_icon-83"></i>3 Hours</li>
                            <li><i class="icon_set_1_icon-13"></i>Accessibiliy</li>
                            <li><i class="icon_set_1_icon-82"></i>144 Likes</li>
                            <li><i class="icon_set_1_icon-22"></i>Pet allowed</li>
                            <li><i class="icon_set_1_icon-97"></i>Audio guide</li>
                            <li><i class="icon_set_1_icon-29"></i>Tour guide</li>
                        </ul>
                    </div>

                    <p class="d-block d-lg-none"><a class="btn_map" data-bs-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">View on map</a>
                    </p><!-- Map button for tablets/mobiles -->

                    <div id="Img_carousel" class="slider-pro">
                        <div class="sp-slides">

                            <div class="sp-slide">
                                <img alt="Image" class="sp-image" src="css/images/blank.gif" data-src="img/slider_single_tour/1_medium.jpg" data-small="img/slider_single_tour/1_small.jpg" data-medium="img/slider_single_tour/1_medium.jpg" data-large="img/slider_single_tour/1_large.jpg" data-retina="img/slider_single_tour/1_large.jpg">
                            </div>
                            <div class="sp-slide">
                                <img alt="Image" class="sp-image" src="css/images/blank.gif" data-src="img/slider_single_tour/2_medium.jpg" data-small="img/slider_single_tour/2_small.jpg" data-medium="img/slider_single_tour/2_medium.jpg" data-large="img/slider_single_tour/2_large.jpg" data-retina="img/slider_single_tour/2_large.jpg">
                            </div>

                            <div class="sp-slide">
                                <img alt="Image" class="sp-image" src="css/images/blank.gif" data-src="img/slider_single_tour/3_medium.jpg" data-small="img/slider_single_tour/3_small.jpg" data-medium="img/slider_single_tour/3_medium.jpg" data-large="img/slider_single_tour/3_large.jpg" data-retina="img/slider_single_tour/3_large.jpg">
                            </div>

                            <div class="sp-slide">
                                <img alt="Image" class="sp-image" src="css/images/blank.gif" data-src="img/slider_single_tour/4_medium.jpg" data-small="img/slider_single_tour/4_small.jpg" data-medium="img/slider_single_tour/4_medium.jpg" data-large="img/slider_single_tour/4_large.jpg" data-retina="img/slider_single_tour/4_large.jpg">
                            </div>

                            <div class="sp-slide">
                                <img alt="Image" class="sp-image" src="css/images/blank.gif" data-src="img/slider_single_tour/5_medium.jpg" data-small="img/slider_single_tour/5_small.jpg" data-medium="img/slider_single_tour/5_medium.jpg" data-large="img/slider_single_tour/5_large.jpg" data-retina="img/slider_single_tour/5_large.jpg">
                            </div>

                            <div class="sp-slide">
                                <img alt="Image" class="sp-image" src="css/images/blank.gif" data-src="img/slider_single_tour/6_medium.jpg" data-small="img/slider_single_tour/6_small.jpg" data-medium="img/slider_single_tour/6_medium.jpg" data-large="img/slider_single_tour/6_large.jpg" data-retina="img/slider_single_tour/6_large.jpg">
                            </div>

                            <div class="sp-slide">
                                <img alt="Image" class="sp-image" src="css/images/blank.gif" data-src="img/slider_single_tour/7_medium.jpg" data-small="img/slider_single_tour/7_small.jpg" data-medium="img/slider_single_tour/7_medium.jpg" data-large="img/slider_single_tour/7_large.jpg" data-retina="img/slider_single_tour/7_large.jpg">
                            </div>

                            <div class="sp-slide">
                                <img alt="Image" class="sp-image" src="css/images/blank.gif" data-src="img/slider_single_tour/8_medium.jpg" data-small="img/slider_single_tour/8_small.jpg" data-medium="img/slider_single_tour/8_medium.jpg" data-large="img/slider_single_tour/8_large.jpg" data-retina="img/slider_single_tour/8_large.jpg">
                            </div>

                            <div class="sp-slide">
                                <img alt="Image" class="sp-image" src="css/images/blank.gif" data-src="img/slider_single_tour/9_medium.jpg" data-small="img/slider_single_tour/9_small.jpg" data-medium="img/slider_single_tour/9_medium.jpg" data-large="img/slider_single_tour/9_large.jpg" data-retina="img/slider_single_tour/9_large.jpg">
                            </div>
                        </div>
                        <div class="sp-thumbnails">
                            <img alt="Image" class="sp-thumbnail" src="img/slider_single_tour/1_medium.jpg">
                            <img alt="Image" class="sp-thumbnail" src="img/slider_single_tour/2_medium.jpg">
                            <img alt="Image" class="sp-thumbnail" src="img/slider_single_tour/3_medium.jpg">
                            <img alt="Image" class="sp-thumbnail" src="img/slider_single_tour/4_medium.jpg">
                            <img alt="Image" class="sp-thumbnail" src="img/slider_single_tour/5_medium.jpg">
                            <img alt="Image" class="sp-thumbnail" src="img/slider_single_tour/6_medium.jpg">
                            <img alt="Image" class="sp-thumbnail" src="img/slider_single_tour/7_medium.jpg">
                            <img alt="Image" class="sp-thumbnail" src="img/slider_single_tour/8_medium.jpg">
                            <img alt="Image" class="sp-thumbnail" src="img/slider_single_tour/9_medium.jpg">
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-lg-3">
                            <h3>Description</h3>
                        </div>
                        <div class="col-lg-9">
                            <h4>Paris in love</h4>
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
                    <hr>
                </div>
                <!--End  single_tour_desc-->
            </div>
            <!--End row -->
        </div>
        <!--End container -->
    </main>
    <!-- End main -->
@endpush

@push('js')
    <!-- Gallery -->
    <script src="js/jquery.sliderPro.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function ($) {
            $('#Img_carousel').sliderPro({
                width: 960,
                height: 500,
                fade: true,
                arrows: true,
                buttons: false,
                fullScreen: false,
                smallSize: 500,
                startSlide: 0,
                mediumSize: 1000,
                largeSize: 3000,
                thumbnailArrows: true,
                autoplay: false
            });
        });
    </script>
@endpush