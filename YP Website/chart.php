<?php
include 'includes/dbh.inc.php';
include 'includes/header.php';

//header('Content-Type: application/json');

        //the SQL query to be executed
        $query = "SELECT DATE_FORMAT(date(checkout_date), '%M %d %Y') as Daily, 
        				 SUM(Total) as Sales
  				  FROM checkout
                  GROUP BY date(checkout_date);";
        //storing the result of the executed query
        $result = $Database->query($query);
       	$data = array();

	   	while ($row = $result->fetch_assoc()) {
  	   		   $data[] = $row;
		}


?>

<div class="container">
	<canvas id="sysChart"></canvas>
</div>



<script>
	
	let sysChart = document.getElementById('sysChart').getContext('2d');

	let SalesChart = new Chart(sysChart, {
		type: 'line', // bar, horizontalBar, pie, line, doughnut, radar, polarArea 
		data: {
			labels: [<?php
							foreach($data as $row){
								echo "'" . $row['Daily'] . "',";
							}


					?>],
			datasets: [{
				label:'Daily Sales',
				data:[
					<?php
							foreach($data as $row){
							echo $row['Sales'] . ',';
						} 
					?>

				],
				backgroundColor: [
					'rgba(114, 86, 151, 0.5)'

				],
				borderWidth: 2,
				borderColor: '#333333',
				hoverborderWidth: 3,
				hoverborderColor: '##725697'
			}]
		},
		options: {}


	});
</script>