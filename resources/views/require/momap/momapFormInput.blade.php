

<script type="text/javascript">
 function initMap() {
        // Create a map object and specify the DOM element for display.
      var momap= new Momap();
      }
function MOmapClick(datAR) {
     $('#address').html(datAR.address);
    $('#name').val(datAR.name);
    $('#country').val(datAR.countryCode);
    $('#level1').val(datAR.level1);
    $('#level2').val(datAR.locality);
    $('#lat').val(datAR.lat);
    $('#lng').val(datAR.lng);
}
</script>

<div id="map_canvas" style="height:400px; " ></div>
<h3 id="address"> ..</h3>
<div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>name:</strong>
               <input type="text" class="form-control"id="name" name="name">
            </div>
        </div>
<div class="col-xs-12 col-sm-2 col-md-2">
            <div class="form-group">
               <strong>country code:</strong>
               <input type="text" id="country" class="form-control" name="country"><br/>
            </div>
        </div>
 <div class="col-xs-12 col-sm-4 col-md-2">
            <div class="form-group">
               <strong>lng:</strong>
               <input type="text" id="lng" class="form-control" name="lng"><br/>
            </div>
        </div>
  <div class="col-xs-12 col-sm-4 col-md-2">
            <div class="form-group">
               <strong>lat:</strong>
               <input type="text" id="lat" class="form-control" name="lat"><br/>
            </div>
        </div>             
<div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>administrative area 1:</strong>
               <input type="text" class="form-control" id="level1" name="level1">
            </div>
        </div>
  <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>administrative area 2:</strong>
               <input type="text" class="form-control"id="level2" name="level2">
            </div>
        </div>      

<script src="{{ URL::asset('js/menkuotto/momap.js') }}" ></script>
  <script src="https://maps.googleapis.com/maps/api/js?key={{config('menkuotto.map.key')}}&callback=initMap"
  async defer></script>