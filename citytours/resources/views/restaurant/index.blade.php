@extends('layout.app')

@push('pagename')  @endpush

@push('content')
    @include('restaurant.search')

    @if ($restaurants && sizeof($restaurants) > 0)
    <main>
        <div class="container-fluid full-height">
            <div class="row row-height">
                <div class="col-lg-7 content-left" style="padding-top: 50px">
                    <div class="main_title">
                        <h2><span>{{ Request::get('city') }}</span> Restaurants</h2>
                    </div>
                    <div class="row">
                        @foreach ($restaurants as $resto)
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.1s">
                            <div class="hotel_container">
                                <div class="img_container">
                                    <a href="{{ route('restaurant.place', 'text') }}">
                                        <img src="img/hotel_1.jpg" onerror="this.src='img/default_resto.jpg'" width="800" height="533" class="img-fluid" alt="Image">
                                        @if (in_array('meal_takeaway', $resto->types))
                                        <div class="short_info">
                                            <i class="icon_set_1_icon-50"></i>Take Away
                                        </div>
                                        @else
                                        <div class="short_info">
                                            <i class="icon_set_1_icon-14"></i>Restaurant
                                        </div>
                                        @endif
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
                            <!-- End box tour -->
                        </div>
                        <!-- End col-sm-6 -->
                        @endforeach
                    </div><!-- End row -->

                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                @if ($offset == 0)
                                <span class="page-link" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </span>
                                @else
                                <a class="page-link" href="javascript:viewMore({{ $offset }})" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                @endif
                            </li>
                            @if ($offset >= 1)
                            <li class="page-item"><a class="page-link" href="javascript:viewMore({{ $offset }})">{{ $offset }}</a></li>
                            @endif
                            <li class="page-item active"><span class="page-link">{{ $offset+1 }}<span class="sr-only"></span></span></li>
                            <li class="page-item"><a class="page-link" href="javascript:viewMore('{{ $offset+2 }}')">{{ $offset+2 }}</a></li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:viewMore('{{ $offset+2 }}')" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- end pagination-->
                </div>
                <!-- end col -->

                <div class="col-lg-5 map-right">
                    <div class="map" id="map" style="min-height: 1000px"></div>
                </div>

            </div><!-- End row-->
        </div><!-- End container-fluid -->

    </main>
    <!-- End main -->
    @endif
@endpush

@push('js')
    @if ($restaurants && sizeof($restaurants) > 0)
    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA3OcaCH4QDHupPTSIK8K6Jj9CxVZzGAMs&callback=initMap&language=fr"></script>

    <script>
        console.log({{ Request::get('offset') }});

        function initMap() {
            const directionsRenderer = new google.maps.DirectionsRenderer();
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom:5,
                center: { lat: 49.3166744, lng: 1.8499837 },
            });
            directionsRenderer.setMap(map);

            @if (Session::has('direction'))
            $.getJSON("json/trip.json").done(function(data) {
                console.log(data);

                directionsRenderer.setDirections(data);
            });
            @endif
        }

        window.initMap = initMap;

        function viewMore(offset) {
            let url = "{{ route('restaurant', ['city' => Request::get('city'), 'offset' => ':setOffset']) }}";
            url = url.replace(':setOffset', parseInt(offset));
            location.href = url;
        }
    </script>
    @endif
@endpush
