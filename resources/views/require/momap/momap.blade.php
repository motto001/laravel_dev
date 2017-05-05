

<!--push------|||head|||momap|||
<script src="https://maps.googleapis.com/maps/api/js?key={{config('menkuotto.map.key')}}&callback=initMap"
    async defer></script>
-->
<!--push-----------|||head|||momap2|||
<script src="{{ URL::asset('js/menkuotto/momap.js') }}" ></script>
-->
<script type="text/javascript">
 function initMap() {
        // Create a map object and specify the DOM element for display.
        var map = new google.maps.Map(document.getElementById('map_canvas'), {
          center: {lat: -34.397, lng: 150.644},
          scrollwheel: false,
          zoom: 8
        });
      }

</script>
  <script src="https://maps.googleapis.com/maps/api/js?key={{config('menkuotto.map.key')}}&callback=initMap"
  async defer></script>
