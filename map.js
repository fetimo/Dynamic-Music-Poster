var geocoder,
		map;
	
	function initialise() {
		//initialise map
	    geocoder = new google.maps.Geocoder();
	    var latlng = new google.maps.LatLng(0,0);
	    var myOptions = {
	    	zoom: 8,
	    	center: latlng,
	    	mapTypeId: google.maps.MapTypeId.ROADMAP
	    }
	    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);	    
 		
 		//add marker
 		var address = document.getElementById('address').innerHTML;
		geocoder.geocode( {'address': address}, function(results, status) {
			if(status == google.maps.GeocoderStatus.OK) {
				map.setCenter(results[0].geometry.location);
				var marker = new google.maps.Marker({
					map: map,
					position: results[0].geometry.location
				});
			} else {
				//console.log('Geocode was unsuccessful because ' + status);
			}
		});
	}