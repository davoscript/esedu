jQuery(document).ready(function(){
	
	// Globals
	var bounds = map.getBounds();
	var markers_stack = new Array();
	var markers_id = new Array();
	var defPin = new L.Icon.Default();
	var pin = L.icon({
	    iconUrl: ajax_base_url+'img/logo_mini.png',
	    iconSize: [45, 45],
	    iconAnchor: [21, 45]
	});
	
	function addToList( est, i ){
		
		var psu = (est.psu == '' || est.psu == ' ' || est.psu == null) ? '---' : est.psu;
		var simce = (est.simce == '' || est.simce == ' ' || est.simce == null) ? '---' : est.simce;
		
		var ltext = '<li id="result_'+i+'">';
			ltext += '<a href="'+ ajax_base_url +'establecimiento/perfil/'+ est.rdb +'/" class="btn btn-success btn-xs pull-right"><span class="glyphicon glyphicon-info-sign"></span></a>';
			ltext += est.nombre;
			ltext += '<br/>';
			ltext += '<span class="data">Dependencia: ' + est.dependencia + '</span><br/>';
			ltext += '<span class="label label-warning">PSU: ' + psu + '</span>&nbsp;';
			ltext += '<span class="label label-info">SIMCE: ' + simce + '</span>';
			ltext += '</li>';
			
		ltext = jQuery( ltext );
		
		ltext.mouseover(function(){
			//markers_stack[(i-1)].openPopup();
			jQuery(this).addClass('hover');
			markers_stack[i].setIcon( pin );
		});
		
		ltext.mouseout(function(){
			jQuery(this).removeClass('hover');
			markers_stack[i].setIcon( defPin );
		});
		
		setTimeout(function(){
			jQuery('#sidebar-list').append(ltext);
		}, (i+1)*100);
	}
	
	
	// Search Schools
	function estSearch(){
		var bounds = map.getBounds();
  		var boundsQuery = ajax_base_url + "wizard/establecimientosbybounds/" + bounds._northEast.lng + "/" + bounds._southWest.lng + "/" + bounds._northEast.lat + "/" + bounds._southWest.lat;
  		
		var data = jQuery('#filter-form').serialize();
		if( data == '' || data == ' ' ){
			data = new Array();
		}
		
		console.log(data);
		
		// Clear markers
		jQuery(markers_id).empty();
		jQuery(markers_stack).each(function(i,m){
			map.removeLayer( m );
		});
		markers_stack = new Array();
		jQuery('#sidebar-list').empty();
		
		// Draw markers
		jQuery.ajax({
		  url: boundsQuery,
		  type: "POST",
		  dataType: "json",
		  data: data,
		  success: function(res){
		  	console.log(res);
		  	jQuery(res).each(function(i,est){
		  		
		  		addToList( est, i );

		  		// add a marker in the given location, attach some popup content to it and open the popup
				var marker = L.marker([est.latitud, est.longitud])
								.on('mouseover', function(evt) {
									jQuery('#result_'+i).mouseover();
									jQuery('#result_'+i).parent().animate({
									    scrollTop: jQuery('#result_'+i).offset().top
									 }, 500);	
								})
								.on('mouseout', function(evt) {
									jQuery('#result_'+i).mouseout();
								})
								.addTo(map)
				    			.bindPopup(est.nombre + '<br/>' + est.direccion + ' #' + est.direccion_n);

				markers_id.push( est.rdb );
				markers_stack.push( marker );
				
			});
		  }
		});
	}
	
	
	// GeoCode
	function geoCode( q, aux ){
		jQuery.ajax({
		  url: "http://nominatim.openstreetmap.org/search?q="+ q + "&format=json",
		  type: "POST",
		  dataType: "json",
		  success: function(response){
		  	
		  	// If point is found
		  	if( response && jQuery.isArray(response) ){
		  		
		  		// Get point
		  		var punto = response[0];
		  		map.setView([punto.lat, punto.lon], 15);
		  		
		  		aux();
		  		
		  		//estSearch();
		  		
		  	}

		  }
		});
	}
	
	
	
	
	
	
	jQuery('#wizard-form').submit(function(e){
		e.preventDefault();
		
		var rawaddress = jQuery('#address-search').val();
		var address = jQuery('#address-search').val() + ", Chile";
		address = address.replace(/ /g, "+");
		
		//console.log('Buscando: ' + address);
		
		// Make wizard dissapear
  		jQuery('#wizard-container').animate({ opacity: 0 }, function(){
  			jQuery('#wizard-container').hide();
  			jQuery('#sidebar').show(function(){
  				jQuery('#sidebar').animate({ opacity: 1 });
  			});
  		});
  		// Copy search query to top search input
  		jQuery('#address-research').val( jQuery('#address-search').val() );
		
		
		//geoCode( address, function(){} );
		
		geoCode( address, function(){
			// Make wizard dissapear
	  		jQuery('#wizard-container').animate({ opacity: 0 }, function(){
	  			jQuery('#wizard-container').hide();
	  			jQuery('#sidebar').show(function(){
	  				jQuery('#sidebar').animate({ opacity: 1 });
	  			});
	  		});
	  		// Copy search query to top search input
	  		jQuery('#address-research').val( jQuery('#address-search').val() );
	  		
		});
		
	});
	
	
	// Top address search
	jQuery('#form-address-research').submit(function(e){
		e.preventDefault();
		
		var rawaddress = jQuery('#address-research').val();
		var address = jQuery('#address-research').val() + ", Chile";
		address = address.replace(/ /g, "+");
		
		console.log('Buscando: ' + address);
		
		// Make wizard dissapear
  		jQuery('#wizard-container').animate({ opacity: 0 }, function(){
  			jQuery('#wizard-container').hide();
  			jQuery('#sidebar').show(function(){
  				jQuery('#sidebar').animate({ opacity: 1 });
  			});
  		});
		
		geoCode( address, function(){} );
		
	});
	
	
	
	// Map Events
	map.on('moveend', function(e) {
		
		if( map.getZoom() > 13 ){
			
			estSearch();
			
		}

	});
	
	
	
	// Filtros
	/*jQuery('#filter-form .autosubmit').click(function(){
		jQuery('#filter-form').submit();
	});*/
	
	jQuery('#filter-form .autosubmit').change(function(){
		jQuery('#filter-form').submit();
	});
	
	jQuery('#filter-form .radioch').click(function(){
		var val = jQuery(this).find('.autosubmit_r').attr('value');
		console.log(val);
		jQuery('#orden').val( val );
		jQuery('#orden').change();
	});
	
	jQuery('#orden').change(function(){
		jQuery('#filter-form').submit();
	});
	
	jQuery('#filter-form').submit(function(e){
		e.preventDefault();
		
		estSearch();
		
	});
	
});
