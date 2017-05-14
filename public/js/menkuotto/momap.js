
//kell hozzá: <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCLd72NuWtHwKed5hzXNMXULr5yqfTx06A&callback=initMap" async defer></script>
class Momap  {


constructor() {
 this.Id = 'map_'; //ezzel kell kezdődnie a használt diveknek mezőknek(canvas,info,contrycode stb)
 this.map = null;
 this.resdata = 'cim'; // lehetmég:latlong,full
  this.mapParam = {
    center: { lat: 47.45780853075031, lng: 12.422103881835938 },
    scrollwheel: true,
    zoom: 5
  }
  this.initMap() ;
  //this.getGeoData('dghsdfjhfds');
}
static callOutFunc(data) {
     if (typeof (MOmapClick) == "function")
        { MOmapClick(data); }
        else if(typeof (baseMOmapClick) == "function")
        { Momap.baseMOmapClick(data); }
}
initMap() {
    // Create a map object and specify the DOM element for display.
    this.map = new google.maps.Map(document.getElementById(this.Id + 'canvas'), this.mapParam);
    this.map.addListener('click', function (e) {
     var clickedLatlong = ("" + e.latLng).replace('(', ''); //átalakítja stringé különben nem működik a replace
      clickedLatlong = clickedLatlong.replace(')', '');
      if (this.resdata == 'latlong') {

         Momap.callOutFunc(clickedLatlong);
      }
      else {
         Momap.getGeoData(clickedLatlong);
      }

    });
  }
static getGeoDataHandler(data) { 
var res={
'address': data.results[0].formatted_address,
'lat': data.results[0].geometry.location.lat,
'lng': data.results[0].geometry.location.lng,
};

$.each(data.results[0].address_components, function(index, value) {
 // data.results[0].address_components.each(function(index, value) {
 
    if(value.types[0]=='country'){
      res.country=value.long_name;
      res.countryCode=value.short_name;}
    else if(value.types[0]=='postal_code'){res.postal_code=value.long_name;}
    else if(value.types[0]=='administrative_area_level_1'){
      res.level1=value.long_name;
      res.level1Code=value.short_name;
    }
    else if(value.types[0]=='administrative_area_level_2'){
      res.level2=value.long_name;
      res.level2Code=value.short_name;
    }
    else if(value.types[0]=='administrative_area_level_3'){
      res.level3=value.long_name;
      res.level3Code=value.short_name;
    }
    else if(value.types[0]=='locality'){res.locality=value.long_name;}
    else {
      res.type=value.type;
      res.name=value.long_name;
    }

});


return res;
}
 static getGeoData(latLng) {
    $.ajax({
      url: "http://maps.googleapis.com/maps/api/geocode/json?latlng=" + latLng + "&sensor=true",
      dataType: 'json'
    }).done(function (data) {
      if (this.resdata == 'full') { datAR = data; }
      else {
        var datAR = Momap.getGeoDataHandler(data);
      }
Momap.callOutFunc(datAR );
  });

 }

  baseMOmapClick(datAR) {
    
  }

}