<span class="h3"><?php echo $text ?></span>
<div id="chart_div_<?php echo $name ?>" style="width:100%; margin-top:10px;"></div>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">

// Load the Visualization API and the piechart package.
google.load('visualization', '1.0', {'packages':['corechart']});

// Set a callback to run when the Google Visualization API is loaded.
google.setOnLoadCallback(init_<?php echo $name ?>);


function init_<?php echo $name ?>() {

	var options = {
		width: '100%',
		height: '100%',
		animation:{
			duration: 1000,
			easing: 'out',
		},
		//vAxis: {minValue:150, maxValue:350}
	};

	var data = google.visualization.arrayToDataTable([
		<?php echo $labels ?>, <?php echo $datos; ?>]);

	var chart = new google.visualization.LineChart(document.getElementById('chart_div_<?php echo $name ?>'));

	chart.draw(data, options);
}
</script>