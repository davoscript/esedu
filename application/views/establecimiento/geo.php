<!--
<iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Instituto+Nacional+Santiago+Chile&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=34.450489,68.730469&amp;ie=UTF8&amp;hq=&amp;hnear=&amp;ll=-33.444611,-70.65049&amp;spn=0.006295,0.006295&amp;t=m&amp;output=embed"></iframe>
-->

<div id="map"></div>

<?php
	$est = $this->db->where('rdb', $rbd)->get('est_busqueda')->result();
	$est = $est[0];
?>

<script type="text/javascript">
	jQuery(document).ready(function(){
		var myLatlng = new google.maps.LatLng(<?php echo $est->latitud; ?>,<?php echo $est->longitud; ?>);
		var mapOptions = {
		  zoom: 16,
		  center: myLatlng
		}
		var map = new google.maps.Map(document.getElementById("map"), mapOptions);
		
		// To add the marker to the map, use the 'map' property
		var marker = new google.maps.Marker({
		    position: myLatlng,
		    map: map,
		    title:"",
			icon: '<?php echo base_url(); ?>img/logo_mini.png'
		});
	});
</script>