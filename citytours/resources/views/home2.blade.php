@extends('layout.app')

@push('pagename')  @endpush

@push('content')
    @include('layout.home-search')
    <main>
        <div class="white_bg">
            <div class="container margin_60">
                <!-- Top restaurants -->
                @if ($restaurants)
                    <div class="main_title">
                        <h2>Strasbourg <span>Top</span> Restaurants</h2>
                        <p>Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.</p>
                    </div>

                    <div class="owl-carousel owl-theme list_carousel add_bottom_30">
                        @foreach ($restaurants as $key=>$resto)
                        <div class="item">
                            <div class="hotel_container">
                                @if ($resto->rating > 4)
                                    <div class="ribbon_3"><span>Top rated</span></div>
                                @else
                                    <div class="ribbon_3 popular"><span>Popular</span></div>
                                @endif
                                <div class="img_container">
                                    <a href="single_hotel.html">
                                        <img src="img/hotel_1.jpg" onerror="this.src='img/default_resto.jpg'" width="800" height="533" class="img-fluid" alt="image">
                                        <div class="short_info hotel">
                                            <span class="price"><sup>$</sup>59</span>
                                        </div>
                                    </a>
                                </div>

                                <div class="hotel_title">
                                    <h3><strong>{{ $resto->name }}</strong></h3>
                                    <span>{{ $resto->formatted_address }}</span>
                                    <div class="rating">
                                        @for ($i = 1; $i <= $resto->rating; $i++)
                                        <i class="icon-star voted"></i>
                                        @endfor
                                        @for ($i = 5; $i > $resto->rating; $i--)
                                        <i class="icon-star-empty"></i>
                                        @endfor
                                        <small>({{ $resto->user_ratings_total }})</small>
                                    </div>
                                    <!-- end rating -->
                                </div>
                            </div>
                            <!-- End box -->
                        </div>
                        <!-- /item -->
                        @endforeach

                        <div class="item">
                            <div class="hotel_container">
                                <div class="ribbon_3 popular"><span>Popular</span></div>
                                <div class="img_container">
                                    <a href="single_hotel.html">
                                        <img src="img/hotel_1.jpg" width="800" height="533" class="img-fluid" alt="image">
                                        <div class="score"><span>7.5</span>Good</div>
                                        <div class="short_info hotel">
                                            <span class="price"><sup>$</sup>59</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="hotel_title">
                                    <h3><strong>Park Hyatt</strong> Hotel</h3>
                                    <div class="rating">
                                        <i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star-empty"></i>
                                    </div>
                                    <!-- end rating -->
                                    <div class="wishlist">
                                        <a class="tooltip_flip tooltip-effect-1" href="#">+<span class="tooltip-content-flip"><span class="tooltip-back">Add to wishlist</span></span></a>
                                    </div>
                                    <!-- End wish list-->
                                </div>
                            </div>
                            <!-- End box -->
                        </div>
                        <!-- /item -->
                        <div class="item">
                            <div class="hotel_container">
                                <div class="ribbon_3 popular"><span>Popular</span></div>
                                <div class="img_container">
                                    <a href="single_hotel.html">
                                        <img src="img/hotel_2.jpg" width="800" height="533" class="img-fluid" alt="image">
                                        <div class="score"><span>9.0</span>Superb</div>
                                        <div class="short_info hotel">
                                            <span class="price"><sup>$</sup>45</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="hotel_title">
                                    <h3><strong>Mariott</strong> Hotel</h3>
                                    <div class="rating">
                                        <i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star-empty"></i>
                                    </div>
                                    <!-- end rating -->
                                    <div class="wishlist">
                                        <a class="tooltip_flip tooltip-effect-1" href="#">+<span class="tooltip-content-flip"><span class="tooltip-back">Add to wishlist</span></span></a>
                                    </div>
                                    <!-- End wish list-->
                                </div>
                            </div>
                            <!-- End box -->
                        </div>
                        <!-- /item -->
                        <div class="item">
                            <div class="hotel_container">
                                <div class="ribbon_3"><span>Top rated</span></div>
                                <div class="img_container">
                                    <a href="single_hotel.html">
                                        <img src="img/hotel_3.jpg" width="800" height="533" class="img-fluid" alt="image">
                                        <div class="score"><span>9.5</span>Superb</div>
                                        <div class="short_info hotel">
                                            <span class="price"><sup>$</sup>39</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="hotel_title">
                                    <h3><strong>Lumiere</strong> Hotel</h3>
                                    <div class="rating">
                                        <i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star-empty"></i>
                                    </div>
                                    <!-- end rating -->
                                    <div class="wishlist">
                                        <a class="tooltip_flip tooltip-effect-1" href="#">+<span class="tooltip-content-flip"><span class="tooltip-back">Add to wishlist</span></span></a>
                                    </div>
                                    <!-- End wish list-->
                                </div>
                            </div>
                            <!-- End box -->
                        </div>
                        <!-- /item -->
                        <div class="item">
                            <div class="hotel_container">
                                <div class="ribbon_3"><span>Top rated</span></div>
                                <div class="img_container">
                                    <a href="single_hotel.html">
                                        <img src="img/hotel_4.jpg" width="800" height="533" class="img-fluid" alt="image">
                                        <div class="score"><span>7.5</span>Good</div>
                                        <div class="short_info hotel">
                                            <span class="price"><sup>$</sup>45</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="hotel_title">
                                    <h3><strong>Novelle</strong> Hotel</h3>
                                    <div class="rating">
                                        <i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star-empty"></i>
                                    </div>
                                    <!-- end rating -->
                                    <div class="wishlist">
                                        <a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);">+<span class="tooltip-content-flip"><span class="tooltip-back">Add to wishlist</span></span></a>
                                    </div>
                                    <!-- End wish list-->
                                </div>
                            </div>
                            <!-- End box -->
                        </div>
                        <!-- /item -->
                        <div class="item">
                            <div class="hotel_container">
                                <div class="ribbon_3"><span>Top rated</span></div>
                                <div class="img_container">
                                    <a href="single_hotel.html">
                                        <img src="img/hotel_5.jpg" width="800" height="533" class="img-fluid" alt="image">
                                        <div class="score"><span>8.0</span>Good</div>
                                        <div class="short_info hotel">
                                            <span class="price"><sup>$</sup>39</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="hotel_title">
                                    <h3><strong>Louvre</strong> Hotel</h3>
                                    <div class="rating">
                                        <i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star-empty"></i>
                                    </div>
                                    <!-- end rating -->
                                    <div class="wishlist">
                                        <a class="tooltip_flip tooltip-effect-1" href="#">+<span class="tooltip-content-flip"><span class="tooltip-back">Add to wishlist</span></span></a>
                                    </div>
                                    <!-- End wish list-->
                                </div>
                            </div>
                            <!-- End box -->
                        </div>
                        <!-- /item -->
                    </div>
                    <!-- /carousel -->

                    <p class="text-center nopadding">
                        <a href="{{ route('restaurant', ['city' => 'strasbourg']) }}" class="btn_1">View all</a>
                    </p>
                @endif
            </div>
            <!-- End container -->

            <div class="container margin_60">
                <div class="main_title">
                    <h2>Plan <span>Your Tour</span> Easly</h2>
                    <p>
                        Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.
                    </p>
                </div>
                <div class="row feature_home_2">
                    <div class="col-md-4 text-center">
                        <img src="img/adventure_icon_1.svg" alt="" width="75" height="75">
                        <h3>Itineraries studied in detail</h3>
                        <p>Suscipit invenire petentium per in. Ne magna assueverit vel. Vix movet perfecto facilisis in, ius ad maiorum corrumpit, his esse docendi in.</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <img src="img/adventure_icon_2.svg" alt="" width="75" height="75">
                        <h3>Room and food included</h3>
                        <p> Cum accusam voluptatibus at, et eum fuisset sententiae. Postulant tractatos ius an, in vis fabulas percipitur, est audiam phaedrum electram ex.</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <img src="img/adventure_icon_3.svg" alt="" width="75" height="75">
                        <h3>Everything organized</h3>
                        <p>Integre vivendo percipitur eam in, graece suavitate cu vel. Per inani persius accumsan no. An case duis option est, pro ad fastidii contentiones.</p>
                    </div>
                </div>

                <div class="banner_2">
                    <div class="wrapper d-flex align-items-center opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.3)" style="background-color: rgba(0, 0, 0, 0.3);">
                        <div>
                            <h3>Your Perfect<br>Tour Experience</h3>
                            <p>Activities and accommodations</p>
                            <a href="all_tours_list.html" class="btn_1">Read more</a>
                        </div>
                    </div>
                    <!-- /wrapper -->
                </div>
                <!-- /banner_2 -->

            </div>
            <!-- End container -->

            <div class="container margin_60">
                <div class="main_title">
                    <h2>Lates <span>Blog</span> News</h2>
                    <p>Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.</p>
                </div>

                <div class="row">
                        <div class="col-lg-6">
                            <a class="box_news" href="blog.html">
                                <figure><img src="img/news_home_1.jpg" onerror="this.src='img/default_blog.jpg'" alt="">
                                    <figcaption><strong>28</strong>Dec</figcaption>
                                </figure>
                                <ul>
                                    <li>Mark Twain</li>
                                    <li>20.11.2017</li>
                                </ul>
                                <h4>Pri oportere scribentur eu</h4>
                                <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
                            </a>
                        </div>
                        <!-- /box_news -->
                        <div class="col-lg-6">
                            <a class="box_news" href="blog.html">
                                <figure><img src="img/news_home_2.jpg" alt="">
                                    <figcaption><strong>28</strong>Dec</figcaption>
                                </figure>
                                <ul>
                                    <li>Jhon Doe</li>
                                    <li>20.11.2017</li>
                                </ul>
                                <h4>Duo eius postea suscipit ad</h4>
                                <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
                            </a>
                        </div>
                        <!-- /box_news -->
                        <div class="col-lg-6">
                            <a class="box_news" href="blog.html">
                                <figure><img src="img/news_home_3.jpg" alt="">
                                    <figcaption><strong>28</strong>Dec</figcaption>
                                </figure>
                                <ul>
                                    <li>Luca Robinson</li>
                                    <li>20.11.2017</li>
                                </ul>
                                <h4>Elitr mandamus cu has</h4>
                                <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
                            </a>
                        </div>
                        <!-- /box_news -->
                        <div class="col-lg-6">
                            <a class="box_news" href="blog.html">
                                <figure><img src="img/news_home_4.jpg" alt="">
                                    <figcaption><strong>28</strong>Dec</figcaption>
                                </figure>
                                <ul>
                                    <li>Paula Rodrigez</li>
                                    <li>20.11.2017</li>
                                </ul>
                                <h4>Id est adhuc ignota delenit</h4>
                                <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
                            </a>
                        </div>
                        <!-- /box_news -->
                    </div>
                    <!-- /row -->
                    <p class="btn_home_align"><a href="blog.html" class="btn_1 rounded">View all news</a></p>
            </div>
            <!-- End container -->

        </div>
        <!-- End white_bg -->
    </main>
@endpush
