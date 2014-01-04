jQuery(document).ready(function(){
	
	jQuery('#wizard-form').submit(function(e){
		e.preventDefault();
		
		var address = jQuery('#address-search').val() + ", Chile";
		address = address.replace(/ /g, "+");
		
		console.log('Buscando: ' + address);
		
		jQuery.ajax({
		  //http://nominatim.openstreetmap.org/search?q=135+pilkington+avenue,+birmingham&format=xml&polygon=1&addressdetails=1
		  url: " http://nominatim.openstreetmap.org/search?q="+ address + "&format=json",
		  type: "POST",
		  dataType: "json",
		  success: function(response){
		  	
		  	console.log( response );
		  	if( response && response.length > 0 ){
		  		var punto = response[0];
		  		map.setView([punto.lat, punto.lon], 14);
		  	}

		  }
		});
		
	});
	
});
