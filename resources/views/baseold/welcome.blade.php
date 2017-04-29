<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
      <link href="{{ asset("/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />   
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset("/bower_components/AdminLTE/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.

	<script type="text/javascript" src="js/momap.js"></script>	  
    -->
    <link href="{{ asset("/bower_components/AdminLTE/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript">
  var map = null;
  var my_boundaries = {};
  var data_layer;
  var info_window;

  //initialize map on document ready
  $(document).ready(function(){
     //var bsWidth = $("#mo-info").innerWidth();
    // $("#map_canvas").css("width" ,bsWidth );  
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
  });

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

$('#mo-info').html('position:' +e.latLng+', a választott ország: '+ boundary_name+' id:'+boundary_id);

  	});
	
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
</head>
<body >
    <!-- Header -->
 @include('tmpl:header')

   

<div class="col-md-8 col-md-offset-2">
	<h1>Üdv! kattints az országra ahol vezetőt keresel!</h1>
</div>
<div >
	<div id="map_canvas" style="height:400px; " class="col-md-8 col-md-offset-2"></div>
</div>


<div id="mo-info" class="col-md-8 col-md-offset-2" style=" border-style: solid;
    border-width: 1px;min-height:500px;">
</div> 

   <!-- jQuery 2.1.3 -->
    <script src="{{ asset ("/bower_components/AdminLTE/plugins/jQuery/jQuery-2.2.3.min.js") }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset ("/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset ("/bower_components/AdminLTE/dist/js/app.min.js") }}" type="text/javascript"></script>
   
</body>
</html>
