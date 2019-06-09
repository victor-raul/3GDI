<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Resultados</title>
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<header class="header">
        <a href="index.php"><img src="img/logo.png" alt="Logo" class="logo"></a>
        <nav class="menu">
            <ul>
                <li><a href="index.php" class="menu__item">Inicio</a></li>
                <li><a href="dashboard.html" class="menu__item">Dashboard</a></li>
                <li><a href="resultados.php" class="menu__item">Resultados</a></li>
            </ul>
        </nav>
    </header>
	
	<div id="curve_chart"></div>

	
	<?php 

	require("php/connection.php");

	$sql = "SELECT ID, contador, titulo FROM post ORDER BY contador DESC LIMIT 3";

	$resultado = $mysqli->query($sql);

	?>

	<div class="div">
		<p><b>Posts más populares: </b></p>
		<ul class="lista">
			<?php 

				while($row = $resultado->fetch_array(MYSQLI_ASSOC)) {
					
				?>
					<a href="post.php?id=<?php echo $row['ID']; ?>" class="post__a"><?php echo $row["titulo"] . " (". $row["contador"] ." visitas)"; ?></a>
				<?php
				}

			?>
		</ul>
	</div>

	<div class="div">
		<?php 

			$sql = "SELECT SUM(contador) AS contador FROM post WHERE fecha=CURDATE()";

			$resultado = $mysqli->query($sql);

			$row = $resultado->fetch_array(MYSQLI_ASSOC);

		 ?>

		<p><b>Visitas totales de hoy: </b> <?php echo $row["contador"]; ?></p>
	</div>

	<footer class="footer">Hexaware - 2019</footer>
	<script src="https://www.gstatic.com/charts/loader.js"></script>
	
	<?php 

	

	$sql = "SELECT SUM(contador) AS contador, fecha FROM post GROUP BY fecha ORDER BY fecha LIMIT 7";
	$resultado = $mysqli->query($sql);

		echo "<script>
			const drawChart = () => {
				let data = new google.visualization.arrayToDataTable([
					['Fecha', 'Visitas'],";
					
					while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) {
						echo "['".$row["fecha"]."', ".$row['contador']."],";
					}
					
					echo "
				]);

				let options = {
					title: 'Presentación de resultados',
					curveType: 'function',
					legend: {position: 'bottom'}
				};

				let chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

				chart.draw(data, options);
			}

			google.charts.load('current', {'packages':['corechart']});
			google.charts.setOnLoadCallback(drawChart);
		</script>";?>
</body>
</html>