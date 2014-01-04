jQuery(document).ready(function(){
	
	/* 100% height */
	jQuery(window).load(function(){
		var menu_height = jQuery('#topnav').height();
		var footer_height = jQuery('#footer').height(); 
		jQuery('#main').css('height', jQuery(window).height() - menu_height - footer_height);
	});
	
});