<?php
session_start();

// Habilitar output buffering 
ob_start();

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir el archivo de conexión a la base de datos
    include 'Connection.php';
    
    // Obtener el correo y la contraseña enviados por el formulario
    $Correo = $_POST['correo'];
    $Contrasena = $_POST['contrasena'];

    // Consultar la base de datos para verificar si el correo existe
    $query = "SELECT * FROM register WHERE correo = :correo";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['correo' => $Correo]);

    // Verificar si se encontró un usuario con el correo dado
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar la contraseña
        if (password_verify($Contrasena, $row['contrasena'])) {
            // La contraseña es correcta, redirigir al usuario según su rol
            $_SESSION["booleano"] = true;
            $_SESSION["usuario"] = $row['usuario'];
            $_SESSION["id"] = $row['idregister'];
            $_SESSION["rol"] = $row['rol'];
            switch ($row['rol']) {
                case 'cliente':
                    header("Location: Clientes.php");
                    break;
                case 'proveedor':
                    header("Location: Proveedores.php");
                    break;
                case 'empleado':
                    header("Location: Empleados.php");
                    break;
                default:
                    // Si el rol no está reconocido, redirigir a una página de error o mostrar un mensaje de error
                    echo "Rol no reconocido.";
                    break;
            }
            // Finalizar el script para evitar que se imprima más contenido
            exit();
            // Aquí puedes agregar la lógica para iniciar sesión o redirigir al usuario a su página de perfil, etc.
        } else {
            // La contraseña es incorrecta
            echo "Contraseña incorrecta.";
        }
    } else {
        // No se encontró un usuario con ese correo
        echo "No se encontró un usuario con ese correo.";
    }
}
// Fin del buffer de salida y envío al navegador
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        <form action="Login.php" method="POST">
                            <div class="form-group">
                                <label for="correo">Correo electrónico</label>
                                <input type="email" class="form-control" id="correo" name="correo" required>
                            </div>
                            <div class="form-group">
                                <label for="contrasena">Contraseña</label>
                                <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <a href="Changes_password.php">¿Olvidó su contraseña?</a> | <a href="Register.php">Registrarse</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>