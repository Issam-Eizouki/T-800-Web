@extends('layout.app')

@push('pagename')  @endpush

@push('content')
    @include('trip.search')

    <main>
        <div id="map" class="map" style="border-bottom:none; height:800px; width:100%;"></div>
    </main>
    <!-- End main -->
@endpush

@push('js')
<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA3OcaCH4QDHupPTSIK8K6Jj9CxVZzGAMs&callback=initMap&language=fr"></script>

<script>
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
</script>
@endpush
