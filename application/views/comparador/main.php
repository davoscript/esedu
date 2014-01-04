<div class="containerlg quarter">
	<div class="row">

		<div class="col-lg-6 bg_grey">
			<!-- col menu -->
			<div class="innerbox">
				<?php $this->load->view("$module/ficha"); ?>
			</div>
		</div><!-- end col-3 -->

		<div class="col-lg-6 bg_white" style="padding:0px;">
			<!-- col content -->
			<div class="innerbox">
				<?php $this->load->view("$module/ficha"); ?>
			</div>
		</div><!-- end col-9 -->

	</div><!-- end row -->
</div><!-- end container -->

<div class="containerlg quarter">
	<div class="row">

		<div class="col-lg-6 bg_white">
			<!-- col menu -->
			<div class="innerbox">
				PSU
				
				<div id="chart_div" style="width:100%; margin-top:10px;"></div>
			</div>
		</div><!-- end col-3 -->

		<div class="col-lg-6 bg_grey">
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
	      vAxis: {minValue:500, maxValue:800}
	    };
	    
	     var data = google.visualization.arrayToDataTable([
           ['Año', 'LEC', 'MAT', 'NEM'],
           ['2006',  659, 675, 581],
           ['2007',  661, 681, 588],
           ['2008',  678, 680, 584],
           ['2009',  675, 690, 588],
           ['2010',  679, 702, 598],
           ['2011',  664, 674, 613],
           ['2012',  674, 680, 608]
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
	      vAxis: {minValue:500, maxValue:800}
	    };
	    
	     var data2 = google.visualization.arrayToDataTable([
           ['Año', 'LEC', 'MAT', 'NEM'],
           ['2006',  559, 575, 501],
           ['2007',  521, 631, 518],
           ['2008',  548, 610, 534],
           ['2009',  625, 580, 508],
           ['2010',  619, 572, 548],
           ['2011',  630, 604, 603],
           ['2012',  654, 640, 608]
         ]);
	
	    var chart2 = new google.visualization.LineChart(document.getElementById('chart_psu'));
	
	    function drawPSU() {
	      // Disabling the button while the chart is drawing.
	      chart2.draw(data2, options2);
	    }
	    
	    drawPSU();
	    
	  }
	  
    </script>