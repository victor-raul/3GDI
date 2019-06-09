<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Hexaware</title>
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


    <section class="content">
    <?php

        require("php/connection.php");

        $sql = "SELECT * FROM post";
        $resultado = $mysqli->query($sql);
        while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) {

     ?>
     
        <section class="post">
            <a href="post.php?id=<?php echo $row['ID']; ?>" class="post__a">
                <div class="post__title">
                    <img src="php/imagen.php?identificador=<?php echo $row['ID']; ?>" alt="Post image" class="post__img">
                    <div class="shadow"></div>
                    <h2 class="post__titlename"><?php echo $row["titulo"];  ?></h2>
                </div>
            </a>
            <p class="post__date"><?php echo $row["fecha"]; ?></p>
            <p class="post__content"><?php echo $row["copete"]; ?></p>
        </section>
    <?php } ?>
    </section>

    <footer class="footer">Hexaware - 2019</footer>

    <script src="js/scripts.js"></script>
</body>
</html>