

<!--push------|||head|||momap|||
<script src="https://maps.googleapis.com/maps/api/js?key={{config('menkuotto.map.key')}}&callback=initMap"
    async defer></script>
-->

<!--a head html megjegyzés helyére teszi ha van másik momap2 akkor csak az utolsót tartja meg      -->
<!--push|||head|||momap2|||
<script src="{{ URL::asset('js/menkuotto/momap.js') }}" ></script>
-->
<script type="text/javascript">
 function initMap() {
        // Create a map object and specify the DOM element for display.
      var momap= new Momap();
      }
function MOmapClick(datAR) {
$.each(datAR, function(index, value) {
     $('#mo-info').append(index+':'+value+'<br/>');

    });

}
</script>
<div >
	<div id="map_canvas" style="height:400px; " class="col-md-8 col-md-offset-2"></div>
</div>


<div id="mo-info" class="col-md-8 col-md-offset-2" style=" border-style: solid;
    border-width: 1px;min-height:500px;">
</div> 
  <script src="https://maps.googleapis.com/maps/api/js?key={{config('menkuotto.map.key')}}&callback=initMap"
  async defer></script>
