<div class="containerlg quarter">
	<div class="row">

		<div class="col-lg-6 bg_grey">
			<!-- col menu -->
			<div class="innerbox">
				<?php $this->load->view("$module/ficha"); ?>
			</div>
		</div><!-- end col-3 -->

		<div class="col-lg-3 bg_white" style="padding:0px;">
			<!-- col content -->
			<?php $this->load->view("$module/geo"); ?>
		</div><!-- end col-9 -->
		
		<div class="col-lg-3 bg_black" style="padding:0px;">
			<!-- col content -->
			<a class="twitter-timeline" href="https://twitter.com/ceain" data-widget-id="411925513809063936">Tweets por @ceain</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		</div><!-- end col-9 -->

	</div><!-- end row -->
</div><!-- end container -->

<div class="containerlg quarter">
	<div class="row">

		<div class="col-lg-6 bg_white">
			<!-- col menu -->
			<div class="innerbox">
				SIMCE 2º Medio
				
				<div id="chart_div" style="width:100%; margin-top:10px;"></div>
			</div>
		</div><!-- end col-3 -->

		<div class="col-lg-6 bg_white">
			<!-- col content -->
			<div class="innerbox">
				PSU
				<div id="chart_psu" style="width:100%; margin-top:10px;"></div>
			</div>
		</div><!-- end col-9 -->

	</div><!-- end row -->
</div><!-- end container -->

<!--
<script type="text/javascript">
	jQuery(document).ready(function(){
		var establecimiento;
		jQuery.ajax({
		  type: "GET",
		  url: "<?php echo site_url('ajax/get_establecimiento/8584/'); ?>",
		  contentType: "application/json; charset=utf-8",
          dataType: "json",
          success: function(response){
          	console.log(response);
          }
		});
	});
</script>
-->


<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    
      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});
      
      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(init);


      function init() {
      	
      	// SIMCE
	    var options = {
	      width: '100%',
	      height: '100%',
	      animation:{
	        duration: 1000,
	        easing: 'out',
	      },
	      vAxis: {minValue:300, maxValue:400}
	    };
	    
	     var data = google.visualization.arrayToDataTable([
           ['Año', 'LEC', 'MAT'],
           ['2006',  331,       365],
           ['2008',  337,      364],
           ['2010',  339,      362],
           ['2012',  329,      356]
         ]);
	
	    var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
	
	    function drawSIMCE() {
	      // Disabling the button while the chart is drawing.
	      chart.draw(data, options);
	    }
	    
	    drawSIMCE();
	    
	    
	    // PSU
	    var options2 = {
	      width: '100%',
	      height: '100%',
	      animation:{
	        duration: 1000,
	        easing: 'out',
	      },
	      vAxis: {minValue:600, maxValue:700}
	    };
	    
	     var data2 = google.visualization.arrayToDataTable([
           ['Año', 'LEC', 'MAT', 'NEM'],
           ['2006',  659, 675, 581],
           ['2007',  661, 681, 588],
           ['2008',  678, 680, 584],
           ['2009',  675, 690, 588],
           ['2010',  679, 702, 598],
           ['2011',  664, 674, 613],
           ['2012',  674, 680, 608]
         ]);
	
	    var chart2 = new google.visualization.LineChart(document.getElementById('chart_psu'));
	
	    function drawPSU() {
	      // Disabling the button while the chart is drawing.
	      chart2.draw(data2, options2);
	    }
	    
	    drawPSU();
	    
	  }
	  
    </script>