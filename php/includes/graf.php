
<?php
$danas = date("Y-m-d");
$sedam = date("Y-m-d", strtotime("-7 day"));
$query = mysql_query("SELECT * FROM rashod WHERE korisnik_ID_FK = $session_korisnik_id AND datum BETWEEN '$sedam' AND '$danas' ORDER BY datum ASC");
while ($row = mysql_fetch_array($query)) {
	$data[] = $row['iznos'];
	$data1[] = $row['datum'];
}
?>
<div id="test" style="width:80%; height:400px; margin: 0 auto;">
	<script>
	$(function () { 
	    $('#test').highcharts({
		chart: {
	         renderTo: 'container',
	         type: 'column'         
     	 },
	    series: [{
	    	name: 'Rashodi',
	         data: [<?php echo join($data, ',') ?>]
	    }],
	   colors: [
            '#b6db86'
            ],
	    yAxis: {
        	title: {
                text: 'Ukupan iznos po danu'
            },
        },
        xAxis: {
            categories: ['<?php echo join($data1, "','") ?>'],
            tickInterval: 1
        },
	   	title: {
            text: 'Rashodi za posljednjih 7 dana'
        }
	    });
	});
</script>
</div>