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

  function loadBoundariesFromGeoJson(geo_json_url){
	initializeDataLayer();
  	$.getJSON(geo_json_url, function(data){
  		if(data.type == "FeatureCollection"){ //we have a collection of boundaries in geojson format
  			if(data.features){
 var iso2_3={"AND":"AD", "ARE":"AE", "AFG":"AF", "ATG":"AG", "AIA":"AI", "ALB":"AL", "ARM":"AM", "ANT":"AN", "AGO":"AO", "ATA":"AQ", "ARG":"AR", "ASM":"AS", "AUT":"AT", "AUS":"AU", "ABW":"AW", "ALA":"AX", "ALA":"AX", "AZE":"AZ", "BIH":"BA", "BIH":"BA", "BRB":"BB", "BGD":"BD", "BEL":"BE", "BFA":"BF", "BGR":"BG", "BHR":"BH", "BDI":"BI", "BEN":"BJ", "BLM":"BL", "BMU":"BM", "BRN":"BN", "BRN":"BN", "BOL":"BO", "BRA":"BR", "BHS":"BS", "BTN":"BT", "BVT":"BV", "BWA":"BW", "BLR":"BY", "BLZ":"BZ", "CAN":"CA", "CCK":"CC", "CCK":"CC", "COD":"CD", "COD":"CD", "CAF":"CF", "CAF":"CF", "COG":"CG", "CHE":"CH", "CIV":"CI", "CIV":"CI", "COK":"CK", "CHL":"CL", "CMR":"CM", "CHN":"CN", "COL":"CO", "CRI":"CR", "CUB":"CU", "CPV":"CV", "CXR":"CX", "CYP":"CY", "CZE":"CZ", "CZE":"CZ", "DEU":"DE", "DJI":"DJ", "DNK":"DK", "DMA":"DM", "DOM":"DO", "DOM":"DO", "DZA":"DZ", "ECU":"EC", "EST":"EE", "EGY":"EG", "ESH":"EH", "ESH":"EH", "ERI":"ER", "ESP":"ES", "ETH":"ET", "FIN":"FI", "FJI":"FJ", "FLK":"FK", "FLK":"FK", "FLK":"FK", "FLK":"FK", "FSM":"FM", "FRO":"FO", "FRA":"FR", "GAB":"GA", "GBR":"GB", "GRD":"GD", "GEO":"GE", "GUF":"GF", "GGY":"GG", "GHA":"GH", "GIB":"GI", "GRL":"GL", "GMB":"GM", "GIN":"GN", "GLP":"GP", "GNQ":"GQ", "GNQ":"GQ", "GRC":"GR", "SGS":"GS", "GTM":"GT", "GUM":"GU", "GNB":"GW", "GUY":"GY", "HKG":"HK", "HMD":"HM", "HND":"HN", "HRV":"HR", "HTI":"HT", "HUN":"HU", "IDN":"ID", "IRL":"IE", "ISR":"IL", "IMN":"IM", "IND":"IN", "IOT":"IO", "IRQ":"IQ", "IRN":"IR", "IRN":"IR", "ISL":"IS", "ITA":"IT", "JEY":"JE", "JAM":"JM", "JOR":"JO", "JPN":"JP", "KEN":"KE", "KGZ":"KG", "KHM":"KH", "KIR":"KI", "COM":"KM", "KNA":"KN", "PRK":"KP", "PRK":"KP", "KOR":"KR", "KOR":"KR", "KWT":"KW", "CYM":"KY", "KAZ":"KZ", "LAO":"LA", "LAO":"LA", "LBN":"LB", "LCA":"LC", "LIE":"LI", "LKA":"LK", "LBR":"LR", "LSO":"LS", "LTU":"LT", "LUX":"LU", "LVA":"LV", "LBY":"LY", "LBY":"LY", "MAR":"MA", "MCO":"MC", "MDA":"MD", "MDA":"MD", "MNE":"ME", "MAF":"MF", "MDG":"MG", "MHL":"MH", "MKD":"MK", "MKD":"MK", "MLI":"ML", "MMR":"MM", "MMR":"MM", "MNG":"MN", "MAC":"MO", "MNP":"MP", "MTQ":"MQ", "MRT":"MR", "MSR":"MS", "MLT":"MT", "MUS":"MU", "MDV":"MV", "MWI":"MW", "MEX":"MX", "MYS":"MY", "MOZ":"MZ", "NAM":"NA", "NCL":"NC", "NER":"NE", "NFK":"NF", "NGA":"NG", "NIC":"NI", "NLD":"NL", "NOR":"NO", "NPL":"NP", "NRU":"NR", "NIU":"NU", "NZL":"NZ", "OMN":"OM", "PAN":"PA", "PER":"PE", "PYF":"PF", "PNG":"PG", "PHL":"PH", "PAK":"PK", "POL":"PL", "SPM":"PM", "PCN":"PN", "PRI":"PR", "PSE":"PS", "PRT":"PT", "PLW":"PW", "PRY":"PY", "QAT":"QA", "REU":"RE", "ROU":"RO", "SRB":"RS", "RUS":"RU", "RWA":"RW", "SAU":"SA", "SLB":"SB", "SLB":"SB", "SYC":"SC", "SDN":"SD", "SWE":"SE", "SGP":"SG", "SHN":"SH", "SVN":"SI", "SJM":"SJ", "SVK":"SK", "SLE":"SL", "SMR":"SM", "SEN":"SN", "SOM":"SO", "SOM":"SO", "SUR":"SR", "SSD":"SS", "SSD":"SS", "STP":"ST", "SLV":"SV", "SYR":"SY", "SYR":"SY", "SWZ":"SZ", "TCA":"TC", "TCD":"TD", "ATF":"TF", "ATF":"TF", "TGO":"TG", "THA":"TH", "TJK":"TJ", "TKL":"TK", "TLS":"TL", "TKM":"TM", "TUN":"TN", "TON":"TO", "TUR":"TR", "TTO":"TT", "TUV":"TV", "TWN":"TW", "TZA":"TZ", "TZA":"TZ", "UKR":"UA", "UGA":"UG", "UMI":"UM", "USA":"US", "USA":"US", "URY":"UY", "UZB":"UZ", "VAT":"VA", "VAT":"VA", "VCT":"VC", "VEN":"VE", "VGB":"VG", "VIR":"VI", "VNM":"VN", "VNM":"VN", "VUT":"VU", "WLF":"WF", "WSM":"WS", "XAA":"XA", "YEM":"YE", "MYT":"YT", "ZAF":"ZA", "ZMB":"ZM", "ZWE":"ZW"};
 var iso2='';
  				for(var i = 0; i < data.features.length; i++){
					var boundary_id = i + 1;
  					var new_boundary = {};
  					if(!data.features[i].properties) data.features[i].properties = {}; 
					data.features[i].properties.boundary_id = boundary_id; //we will use this id to identify boundary later when clicking on it
  					data_layer.addGeoJson(data.features[i], {idPropertyName: 'boundary_id'});
					new_boundary.feature = data_layer.getFeatureById(boundary_id);
  					if(data.features[i].properties.name) new_boundary.name = data.features[i].properties.name;
					if(data.features[i].properties.NAME) new_boundary.name = data.features[i].properties.NAME;
  					my_boundaries[boundary_id] = new_boundary;

			if(my_boundaries[24]){ //just an example, that you can change styles of individual boundary
				data_layer.overrideStyle(my_boundaries[24].feature, {
					fillColor: '#0000FF',
					fillOpacity: 0.9
				});
			}
  		}
  	});
  }



google.load("maps", "3",{other_params:"sensor=false"});