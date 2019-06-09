<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>
		<?php 

			require("php/connection.php");

			$id = $_GET["id"];

			$result = $mysqli->query("SELECT * FROM post WHERE id=$id");

			$row = $result->fetch_array(MYSQLI_ASSOC);

			$contador = $row["contador"] + 1;

			$mysqli->query("UPDATE post SET contador=$contador WHERE id=$id");

			echo $row["titulo"];

		 ?>
	</title>
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

    <div class="_contenido">
    	<img src="php/imagen.php?identificador=<?php echo $row['ID']; ?>" alt="Post image" class="img">
    	<div class="container">
	    	<h1 class="titulo"><?php echo $row["titulo"]; ?></h1>

	    	<p class="contenido"><?php echo $row["contenido"]; ?></p>

	    	<p class="fecha"><?php echo $row["fecha"]; ?></p>
    	</div>
    </div>

    <footer class="footer">Hexaware - 2019</footer>
</body>
</html>