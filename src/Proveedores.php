<?php
include 'Connection.php';

session_start();

if (isset($_SESSION['booleano']) && $_SESSION['booleano'] === true) {

    if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'proveedor') {

        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Clientes</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        </head>
        <body>
            <h1>Bienvenido!  <span style="color: red;"><?php echo $_SESSION["usuario"]; ?></span> su rol de usuario es: <span style="color: red;"><?php echo $_SESSION["rol"];?></span></h1>
            
            <p>Contenido...</p>
            <p><a href="Login.php">Cerrar sesión</a></p>
        </body>

        </html>

        <?php

    } else {
        echo "<p>Usted no tiene permisos para ver esta sección<p>";

        if ($_SESSION['rol'] === 'empleado'){
            echo "<meta http-equiv='refresh' content='3;url=Empleados.php'>";
            exit;
        }
        if ($_SESSION['rol'] === 'cliente'){
            echo "<meta http-equiv='refresh' content='3;url=Clientes.php'>";
            exit;
        }
        
    }
} else {
    header("Location: Login.php");
    exit();
}
?>