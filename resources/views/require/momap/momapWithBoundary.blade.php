@push('js_file')
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
@endpush



<script type="text/javascript">
@push('docready')
  
  	var latlng = new google.maps.LatLng(47.45780853075031, 12.422103881835938); //you can use any location as center on map startup
  	var myOptions = {
  		zoom: 4,
  		center: latlng,
  		mapTypeControl: true,
  		mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
  		navigationControl: true,
  		mapTypeId: google.maps.MapTypeId.ROADMAP
  	};
  	map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
  	google.maps.event.addListener(map, 'click', function(){
  		if(info_window){
  			info_window.setMap(null);
  			info_window = null;
  		}
   
  	});
google.maps.event.addDomListener(window, "resize", function() {
 var center = map.getCenter();
 google.maps.event.trigger(map, "resize");
 map.setCenter(center); 
});


	
	$('#boundary_load_select').change(function(){
		if($(this).val()==1){
			loadBoundariesFromGeoJson("https://raw.githubusercontent.com/matej-pavla/Google-Maps-Examples/master/BoundariesExample/geojsons/world.countries.geo.json");
		}else{
			loadBoundariesFromGeoJson("https://raw.githubusercontent.com/matej-pavla/Google-Maps-Examples/master/BoundariesExample/geojsons/us.states.geo.json");
		}
	});
	loadBoundariesFromGeoJson("https://raw.githubusercontent.com/matej-pavla/Google-Maps-Examples/master/BoundariesExample/geojsons/world.countries.geo.json");
  
@endpush

  var map = null;
  var my_boundaries = {};
  var data_layer;
  var info_window;

  // document ready-------------------------------

//end docready------------------------
  function initializeDataLayer(){
	if(data_layer){
		data_layer.forEach(function(feature) {
		    data_layer.remove(feature);
		});
		data_layer = null;
	}
	data_layer = new google.maps.Data({map: map}); //initialize data layer which contains the boundaries. It's possible to have multiple data layers on one map
  	data_layer.setStyle({ //using set style we can set styles for all boundaries at once
  		fillColor: 'white',
  		strokeWeight: 1,
  		fillOpacity: 0.1
  	});


data_layer.addListener('click', function(e) { //we can listen for a boundary click and identify boundary based on e.feature.getProperty('boundary_id'); we set when adding boundary to data layer
  		var boundary_id = e.feature.getProperty('boundary_id');
  		var boundary_name = "NOT SET";
  		if(boundary_id && my_boundaries[boundary_id] && my_boundaries[boundary_id].name) boundary_name = my_boundaries[boundary_id].name;
  	/*	if(info_window){
  			info_window.setMap(null);
  			info_window = null;
  		}
  		info_window = new google.maps.InfoWindow({
  			content: '<div>You have clicked a boundary: <span style="color:red;">' + boundary_name + '</span></div>',
  			size: new google.maps.Size(150,50),
  			position: e.latLng, map: map
  		});*/
    map.setCenter(e.latLng);
    map.setZoom(7);
var a=("" +e.latLng).replace('(',''); //átalakítja stringé különben nem működik a replace
a=a.replace(')','');
$('#mo-info').html('position:' +a+', a választott ország: '+ boundary_name+' id:'+boundary_id);
//friend_create(boundary_id);
friend_list(boundary_id);
MOmapClick(a) ;

  	});
function friend_create(boundary_id) {	
$.ajax({
  url: "authfriend/"+boundary_id,
  context: document.body
});
}
function getClickedData(latLng) {
	//var u	="http://maps.googleapis.com/maps/api/geocode/json?latlng="+latLng+"&sensor=true";
$.ajax({
  url: "http://maps.googleapis.com/maps/api/geocode/json?latlng="+latLng+"&sensor=true",
  dataType: 'json'
}).done(function( data ) {
   // $('#mo-info').html(data);
      
            $('#mo-info').append(data.results[0].address_components[0].long_name+data.results[0].formatted_address);
			//$('#mo-info').append("jsdfklajlfj");
  });

}




	data_layer.addListener('mouseover', function(e) {
		data_layer.overrideStyle(e.feature, {
			strokeWeight: 3,
			strokeColor: '#ff0000'
		});
	});
	
	data_layer.addListener('mouseout', function(e) {
		data_layer.overrideStyle(e.feature, {
			strokeWeight: 1,
			strokeColor: ''
		});
	});
  }

  function loadBoundariesFromGeoJson(geo_json_url)
  {
	initializeDataLayer();
  	$.getJSON(geo_json_url, function(data)
	  {
  		if(data.type == "FeatureCollection")
		  { //we have a collection of boundaries in geojson format
  			if(data.features)
			  {

  				for(var i = 0; i < data.features.length; i++)
				  {
					var boundary_id = i + 1;
  					var new_boundary = {};
  					if(!data.features[i].properties) data.features[i].properties = {}; 
					data.features[i].properties.boundary_id = boundary_id; //we will use this id to identify boundary later when clicking on it
  					data_layer.addGeoJson(data.features[i], {idPropertyName: 'boundary_id'});
					new_boundary.feature = data_layer.getFeatureById(boundary_id);
  					if(data.features[i].properties.name) new_boundary.name = data.features[i].properties.name;
					if(data.features[i].properties.NAME) new_boundary.name = data.features[i].properties.NAME;
  					my_boundaries[boundary_id] = new_boundary;

					if(my_boundaries[24])
					{ //just an example, that you can change styles of individual boundary
						data_layer.overrideStyle(my_boundaries[24].feature, 
						{
							fillColor: '#0000FF',
							fillOpacity: 0.9
						});
					}
				 }
  			}
		}	  
  	});
  }



google.load("maps", "3",{other_params:"sensor=false"});
</script>