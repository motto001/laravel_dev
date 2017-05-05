
//kell hozzá: <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCLd72NuWtHwKed5hzXNMXULr5yqfTx06A&callback=initMap" async defer></script>
class momap extends google.maps.Map {


constructor(param) {
 this.Id = 'map_'; //ezzel kell kezdődnie a használt diveknek mezőknek(canvas,info,contrycode stb)
 this.map = null;
 this.resdata = 'cim'; // lehetmég:latlong,full
  this.mapParam = {
    center: { lat: 47.45780853075031, lng: 12.422103881835938 },
    scrollwheel: true,
    zoom: 5
  }

  }
  initMap() {
    // Create a map object and specify the DOM element for display.
    this.map = new google.maps.Map(document.getElementById(this.Id + 'canvas'), this.mapParam);
    this.map.addListener('click', function (e) {
      clickedLatlong = ("" + e.latLng).replace('(', ''); //átalakítja stringé különben nem működik a replace
      clickedLatlong = clickedLatlong.replace(')', '');
      if (this.resdata == 'latlong') {
        if (typeof (MOmapClick) == "function")
        { MOmapClick(clickedLatlong); }
        elseif(typeof (baseMOmapClick) == "function")
        { baseMOmapClick(clickedLatlong); }
      }
      else {
        this.getClickedData(lickedLatlong);
      }

    });
  }


  getClickedData(latLng) {
    $.ajax({
      url: "http://maps.googleapis.com/maps/api/geocode/json?latlng=" + latLng + "&sensor=true",
      dataType: 'json'
    }).done(function (data) {
      if (this.resdata == 'full') { datAR = data; }
      else {
        var datAR = {
          'countryCode': data.results[0].address_components[0].long_name,
        };
      }

     $('#mo-info').append(data.results[0].address_components[0].long_name + data.results[0].formatted_address);
      //$('#mo-info').append("jsdfklajlfj");
      if (typeof (MOmapClick) == "function")
      { MOmapClick(datAR); }
      elseif(typeof (baseMOmapClick) == "function")
      { baseMOmapClick(datAR); }

    });

  }

  baseMOmapClick(datAR) {
    
  }

}