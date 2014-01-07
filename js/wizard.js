jQuery(document).ready(function(){
	
	var bounds = map.getBounds();
	
	function geosearch( q ){
		
	}
	
	var markers_stack = new Array();
	var markers_id = new Array();
	
	jQuery('#wizard-form').submit(function(e){
		e.preventDefault();
		
		var rawaddress = jQuery('#address-search').val();
		var address = jQuery('#address-search').val() + ", Chile";
		address = address.replace(/ /g, "+");
		
		console.log('Buscando: ' + address);
		
		jQuery.ajax({
		  //http://nominatim.openstreetmap.org/search?q=135+pilkington+avenue,+birmingham&format=xml&polygon=1&addressdetails=1
		  url: "http://nominatim.openstreetmap.org/search?q="+ address + "&format=json",
		  type: "POST",
		  dataType: "json",
		  success: function(response){
		  	
		  	// If point is found
		  	if( response && response.length > 0 ){
		  		
		  		// Get point
		  		var punto = response[0];
		  		map.setView([punto.lat, punto.lon], 16);
		  		
		  		// Make wizard dissapear
		  		jQuery('#wizard-container').animate({ opacity: 0 }, function(){
		  			jQuery('#wizard-container').hide();
		  			jQuery('#sidebar-filters').show(function(){
		  				jQuery('#sidebar-filters').animate({ opacity: 1 });
		  			});
		  			
		  			// Copy searched address to the top input text 
		  			jQuery('#address-research').val( 
		  				jQuery('#address-search').val() 
		  			);
		  		});
		  		
		  		
		  		//console.log(map.getBounds());
		  		/*
		  		bounds = map.getBounds();
		  		
		  		var boundsQuery = base_url + "/wizard/establecimientosbybounds/" + bounds._northEast.lng + "/" + bounds._southWest.lng + "/" + bounds._northEast.lat + "/" + bounds._southWest.lat;
		  		console.log(boundsQuery);
		  		
		  		
	  				jQuery.ajax({
					  url: boundsQuery,
					  type: "POST",
					  dataType: "json",
					  success: function(res){
					  	//console.log(res);
					  	jQuery(res).each(function(i,est){
					  		
					  		// add a marker in the given location, attach some popup content to it and open the popup
							var marker = L.marker([est.latitud, est.longitud]).addTo(map)
							    .bindPopup(est.nombre);
							    
							markers_id.push( est.rdb );
							markers_stack.push( marker );
							
						});
					  }
					});*/
		  		
		  		
		  		
		  	}else{ // If no point is found
		  		
		  		jQuery('#alert').html('Error').show();
		  		
		  	}

		  }
		});
		
	});
	
	
	// Top address search
	jQuery('#form-address-research').submit(function(e){
		e.preventDefault();
		
		var rawaddress = jQuery('#address-research').val();
		var address = jQuery('#address-research').val() + ", Chile";
		address = address.replace(/ /g, "+");
		
		console.log('Buscando: ' + address);
		
		jQuery.ajax({
		  url: "http://nominatim.openstreetmap.org/search?q="+ address + "&format=json",
		  type: "POST",
		  dataType: "json",
		  success: function(response){
		  	
		  	// If point is found
		  	if( response && response.length > 0 ){
		  		
		  		// Get point
		  		var punto = response[0];
		  		map.setView([punto.lat, punto.lon], 16);
		  		
		  		// Make wizard dissapear
		  		jQuery('#wizard-container').animate({ opacity: 0 }, function(){
		  			jQuery('#wizard-container').hide();
		  			jQuery('#sidebar-filters').show(function(){
		  				jQuery('#sidebar-filters').animate({ opacity: 1 });
		  			});
		  		});
		  		
		  		
		  		//console.log(map.getBounds());
		  		
		  		var bounds = map.getBounds();
		  		
		  		var boundsQuery = base_url + "/wizard/establecimientosbybounds/" + bounds._northEast.lng + "/" + bounds._southWest.lng + "/" + bounds._northEast.lat + "/" + bounds._southWest.lat;
		  		console.log(boundsQuery);
		  		
		  			var data = jQuery('#filter-form').serialize();
					console.log(data);
		  		
	  				jQuery.ajax({
					  url: boundsQuery,
					  type: "POST",
					  dataType: "json",
					  data: data,
					  success: function(res){
					  	//console.log(res);
					  	jQuery(res).each(function(i,est){
					  		
					  		// add a marker in the given location, attach some popup content to it and open the popup
							var marker = L.marker([est.latitud, est.longitud]).addTo(map)
							    .bindPopup(est.nombre);
							    
							markers_id.push( est.rdb );
							markers_stack.push( marker );
							
						});
					  }
					});
		  		
		  		
		  		
		  	}

		  }
		});
		
	});
	
	
	
	// Map Events
	map.on('moveend', function(e) {
		
		if( map.getZoom() > 13 ){
			var bounds = map.getBounds();
			var data = jQuery('#filter-form').serialize();
			console.log(data);
	    
		    var boundsQuery = base_url + "/wizard/establecimientosbybounds/" + bounds._northEast.lng + "/" + bounds._southWest.lng + "/" + bounds._northEast.lat + "/" + bounds._southWest.lat;
	  		console.log(boundsQuery);
	  		
	  			jQuery(markers_id).empty();
	  			jQuery(markers_stack).each(function(i,m){
	  				map.removeLayer( m );
	  			});
	  			jQuery(markers_stack).empty();
	  		
				jQuery.ajax({
				  url: boundsQuery,
				  type: "POST",
				  dataType: "json",
				  data: data,
				  success: function(res){
				  	//console.log(res);
				  	jQuery(res).each(function(i,est){
				  		
				  		if( markers_stack.indexOf(est.rdb) == -1 ){
				  			
				  			// add a marker in the given location, attach some popup content to it and open the popup
							var marker = L.marker([est.latitud, est.longitud]).addTo(map)
							    .bindPopup(est.nombre);
							
							markers_id.push( est.rdb );    
							markers_stack.push( marker );

						}
						
					});
				  }
				});
		}

	});
	
	
	
	// Filtros
	jQuery('#filter-form .autosubmit').click(function(){
		jQuery('#filter-form').submit();
	});
	
	jQuery('#filter-form').submit(function(e){
		e.preventDefault();
		
		var bounds = map.getBounds();
		var data = jQuery('#filter-form').serialize();
		console.log(data);
		
		var boundsQuery = base_url + "/wizard/establecimientosbybounds/" + bounds._northEast.lng + "/" + bounds._southWest.lng + "/" + bounds._northEast.lat + "/" + bounds._southWest.lat;
		jQuery.ajax({
		  url: boundsQuery,
		  type: "POST",
		  dataType: "json",
		  data: data,
		  success: function(res){
		  	console.log(res);
		  	
		  	jQuery(markers_id).empty();
  			jQuery(markers_stack).each(function(i,m){
  				map.removeLayer( m );
  			});
  			jQuery(markers_stack).empty();
		  	
		  	jQuery(res).each(function(i,est){
		  		
		  		if( markers_stack.indexOf(est.rdb) == -1 ){
		  			
					var marker = L.marker([est.latitud, est.longitud]).addTo(map)
					    .bindPopup(est.nombre);
					
					markers_id.push( est.rdb );    
					markers_stack.push( marker );

				}
				
			});
		  }
		});
		
	});
	
});
