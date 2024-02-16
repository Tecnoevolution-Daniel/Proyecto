<?php
session_start();

// Inicio del buffer de salida
ob_start();

// Conexion a la base de datos
include 'Connection.php';

// Campos a llenar en la base de datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Usuario = $_POST['usuario'];
    $Correo = $_POST['correo'];
    $Contrasena = $_POST['contrasena'];
    $RepitaContrasena = $_POST['repita_contrasena'];
    $Rol = $_POST['rol'];

     //Validacion donde no se repitan los correos
     $query = "SELECT * FROM usuarios WHERE correo = :correo";
     $stmt = $pdo->prepare($query);
     $stmt->execute(['correo' => $Correo]);
     if ($stmt->rowCount() > 0) {
         die("El correo electrónico ya está registrado, porfavor coloca otro correo o recupere contraseña.");
     }

    // Validar que todos los campos esten llenos
    if (empty($Usuario) || empty($Correo) || empty($Contrasena) || empty($RepitaContrasena) || empty($Rol)) {
        die("Por favor, complete todos los campos del formulario.");
    }

    // Validar que el correo contenga un '@'
    if (!strpos($Correo, '@')) {            
        die("El correo electrónico debe contener un '@'.");
    }

    // Validación básica (puedes mejorar según tus necesidades)
    if ($Contrasena !== $RepitaContrasena) {
        die("Las contraseñas no coinciden");
    }

    // Hash de la contraseña (mejorar la seguridad)
    $hashedContrasena = password_hash($Contrasena, PASSWORD_DEFAULT);
    $RepitahashedContrasena = password_hash($RepitaContrasena, PASSWORD_DEFAULT);


    // Agregar los datos a la Base de datos
    $query = "INSERT INTO usuarios(usuario, correo, contrasena, repita_contrasena, rol) VALUES(:usuario, :correo, :contrasena, :repita_contrasena, :rol)";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['usuario' => $Usuario, 'correo' => $Correo, 'contrasena' => $hashedContrasena, 'repita_contrasena' => $RepitahashedContrasena, 'rol' => $Rol]);

    if ($stmt) {
        // Redirigir al usuario a login.php después de un registro exitoso
        header("Location: Login.php");
        exit();
    } else {
        echo "Error al registrar el usuario.";
    }
} else {
    //echo "Acceso no autorizado.";
}
// Fin del buffer de salida y envío al navegador
ob_end_flush();
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuarios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .form-container {
            background-color: #d0d5db;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="form-container">
                <form action="Register.php" method="post">
                    <div class="form-group">
                        <label for="usuario">Usuario:</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" required>
                    </div>

                    <div class="form-group">
                        <label for="correo">Correo:</label>
                        <input type="email" class="form-control" id="correo" name="correo" required>
                    </div>

                    <div class="form-group">
                        <label for="contrasena">Contraseña:</label>
                        <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                    </div>

                    <div class="form-group">
                        <label for="repita_contrasena">Repita Contraseña:</label>
                        <input type="password" class="form-control" id="repita_contrasena" name="repita_contrasena" required>
                    </div>

                    <div class="form-group">
                        <label for="rol">Rol:</label>
                        <select class="form-control" id="rol" name="rol" required>
                            <option value="cliente">Cliente</option>
                            <option value="proveedor">Proveedor</option>
                            <option value="empleado">Empleado</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Registrarse</button>
                     <!-- Botón para volver a la página de inicio de sesión -->
                    <div class="mt-3 text-center">
                        <a href="Login.php" class="btn btn-link">Volver a Inicio de Sesión</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
