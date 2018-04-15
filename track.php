<!DOCTYPE html>
<html>
	<head>
		<title>HST</title>
		<meta name="description" content="chart created using amCharts live editor" />

		<!-- amCharts javascript sources -->
		<script type="text/javascript" src="https://www.amcharts.com/lib/3/amcharts.js"></script>
		<script type="text/javascript" src="https://www.amcharts.com/lib/3/serial.js"></script>

		<!-- amCharts javascript code -->
		<script type="text/javascript">
			AmCharts.makeChart("chartdiv",
				{
					"type": "serial",
					"categoryField": "date",
					"dataDateFormat": "YYYY-MM-DD",
					"categoryAxis": {
						"parseDates": true
					},
					"chartCursor": {
						"enabled": true
					},
					"chartScrollbar": {
						"enabled": true
					},
					"trendLines": [],
					"graphs": [
						{
							"bullet": "round",
							"id": "AmGraph-1",
							"title": "Squat",
							"valueField": "sq"
						},
						{
							"bullet": "round",
							"id": "AmGraph-2",
							"title": "OHP",
							"valueField": "ohp"
						},
						{
							"bullet": "round",
							"id": "AmGraph-3",
							"title": "Deadlift",
							"valueField": "dl"
						},
						{
							"bullet": "round",
							"id": "AmGraph-4",
							"title": "Bench Press",
							"valueField": "bp"
						},
						{
							"bullet": "round",
							"id": "AmGraph-5",
							"title": "Barbell Row",
							"valueField": "row"
						}
					],
					"guides": [],
					"valueAxes": [
						{
							"id": "ValueAxis-1",
							"title": "Weight in KG"
						}
					],
					"allLabels": [],
					"balloon": {},
					"legend": {
						"enabled": true,
						"useGraphSettings": true
					},
					"titles": [
						{
							"id": "Title-1",
							"size": 15,
							"text": "6 days Training Track"
						}
					],
          "dataProvider": [
						<?php
					include_once 'database/db_inc.php';
					$old_date = NULL;
					session_start();
					$sql = "SELECT * FROM (
			    SELECT * FROM t_tracking WHERE user_id='".$_SESSION['id']."' ORDER BY id DESC LIMIT 18
					) as foo ORDER BY foo.id ASC;";
					$result = $conn->query($sql);
					while($row = $result->fetch_assoc()){
						//echo $row['date'].'<br>';
						if($row['date'] != $old_date && $old_date == NULL){
							echo'{ "date":"'.$row['date'].'",';
							$old_date=$row['date'];
						}
						else if($row['date'] != $old_date && $old_date != NULL){
							echo'},';
							echo'{ "date": "'.$row['date'].'",';
							$old_date=$row['date'];
						}
						if($row['exercise']==1) echo ' "sq": ';
						elseif($row['exercise']==2) echo ' "ohp": ';
						elseif($row['exercise']==3) echo ' "row": ';
						elseif($row['exercise']==4) echo ' "bp": ';
						elseif($row['exercise']==5) echo ' "dl": ';
						echo $row['weight'].',';
					}
					echo'},';
					?>
						/*{
							"date": "2014-03-01",
							"sq": 8,
							"ohp": 5,
							"dl": 96,
							"bp": 24,
							"row": 68,
						},
						{
							"date": "2014-03-02",
							"sq": 6,
							"ohp": 7,
							"dl": 17,
							"bp": 40,
							"row": 85,
						},
						{
							"date": "2014-03-03",
							"sq": 2,
							"ohp": 3,
							"dl": 69,
							"bp": 74,
							"row": 14
						},
						{
							"date": "2014-03-04",
							"sq": 1,
							"ohp": 3,
							"dl": 28,
							"bp": 92,
							"row": 39
						},
						{
							"date": "2014-03-05",
							"sq": 2,
							"ohp": 1,
							"dl": 21,
							"bp": 10,
							"row": 99
						},
						{
							"date": "2014-03-06",
							"sq": 3,
							"ohp": 2,
							"dl": 14,
							"bp": 40,
							"row": 67
						},
						{
							"date": "2014-03-07",
							"sq": 6,
							"ohp": 8,
							"dl": 54,
							"bp": 79,
							"row": 80
						}*/
					]
				}
			);
		</script>
	</head>
	<body>
			<div id="chartdiv" style="width: 75%; height: 400px; background-color: #FFFFFF;" ></div>
	</body>
</html>
