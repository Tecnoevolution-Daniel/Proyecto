<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olvidé mi contraseña</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Recuperar contraseña</h4>
                    </div>
                    <div class="card-body">
                        <form action="Changes_password.php" method="POST">
                            <div class="form-group">
                                <label for="correo">Correo electrónico</label>
                                <input type="email" class="form-control" id="correo" name="correo" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
// Este archivo procesará el formulario de recuperación de contraseña

// Incluir la conexión a la base de datos
include 'Connection.php';
// Verificar si se ha enviado un formulario POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el correo electrónico enviado desde el formulario
    $correo = $_POST["correo"];
    
    // Consulta para verificar si el correo existe en la base de datos
    $sql = "SELECT * FROM usuarios WHERE correo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // El correo existe en la base de datos, generar una nueva contraseña aleatoria
        $nueva_contrasena = generateRandomString(10); // Función para generar una cadena aleatoria

        // Actualizar la contraseña en la base de datos
        $sql_update = "UPDATE usuarios SET contrasena = ? WHERE correo = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param(password_hash($nueva_contrasena, PASSWORD_DEFAULT), $correo);
        if ($stmt_update->execute()) {
            // Enviar la nueva contraseña por correo electrónico
            $mensaje = "Su nueva contraseña es: " . $nueva_contrasena;
            mail($correo, "Nueva contraseña", $mensaje);
            // Redirigir al usuario a una página de confirmación
            header("Location: Login.php");
            exit();
        } else {
            echo "Error al actualizar la contraseña: " . $conn->error;
        }
    } else {
        echo "No se encontró ningún usuario con ese correo electrónico.";
    }

    $conn->close();
}

// Función para generar una cadena aleatoria
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}
?>
</body>
</html>
