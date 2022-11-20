<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contoh Penggunaan BarsGraph</title>
	<style type="text/css">
		BODY {
			width: 550PX;
		}

		#chart-container {
			width:  100%;
			height: auto;
		}
	</style>
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

</head>
<body>
	<div id="chart-container">
		<canvas id="graphCanvas"></canvas>
	</div>

<script>
	$(document).ready(function () {
		showGraph();
	});

	function showGraph()

{
	{
		$.post("bar_encode.php",
			function (data)
			{
				console.log(data);
				var id = [];
				var jual = [];

			for (var i in data) {
				id.push(data[i].total_ayam);
				jual.push(data[i].total_ayam);
			}
			var chartdata = {
				labels: id,
				datasets: [
				{
					label: 'Nama User',
					backgroundColor: '#49e2ff',
					borderColor: '#46d5f1',
					hoverBackgroundColor: '#CCCCCC',
					hoverBorderColor: '#666666',
					data: jual
				}
				]
			};

			var graphTarget = $("#graphCanvas");

			var barGraph = new Chart(graphTarget, {
				type: 'bar',
				data: chartdata
			});
			});
	}
}
</script>
</body>
</html>