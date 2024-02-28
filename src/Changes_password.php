<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//include 'vendor/autoload.php';

require_once __DIR__ . '/vendor/autoload.php';
// Incluir el archivo de conexión a la base de datos
include 'Connection.php';
// Función para generar una contraseña segura
function generarContrasenaSegura($longitud = 10) {
    // Caracteres válidos para la contraseña
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $longitudCaracteres = strlen($caracteres);
    $contrasena = '';
    for ($i = 0; $i < $longitud; $i++) {
        $contrasena .= $caracteres[rand(0, $longitudCaracteres - 1)];
    }
    return $contrasena;
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el correo enviado por el formulario
    $Correo = $_POST['correo'];

    // Consultar la base de datos para verificar si el correo existe
    $query = "SELECT * FROM register WHERE correo = :correo";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['correo' => $Correo]);

    // Verificar si se encontró un usuario con el correo dado
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Generar una nueva contraseña segura
        $nuevaContrasena = generarContrasenaSegura();

        // Actualizar la contraseña en la base de datos
        $updateQuery = "UPDATE register SET contrasena = :contrasena WHERE correo = :correo";
        $updateStmt = $pdo->prepare($updateQuery);
        $updateStmt->execute(['contrasena' => password_hash($nuevaContrasena, PASSWORD_DEFAULT), 'correo' => $Correo]);

        // Enviar el correo electrónico con la nueva contraseña utilizando PHPMailer
        $mail = new PHPMailer(); // Instancia de PHPMailer con manejo de excepciones activado
        try {
            // Configurar el servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'alexander.correa.pruebas@gmail.com';
            $mail->Password = 'bmjh bewn kgai gedt';
            $mail->SMTPSecure = 'tls'; // Puede ser 'ssl' o 'tls'
            $mail->Port = 587; // Puerto SMTP

            // Configurar el remitente y el destinatario
            $mail->setFrom('alexander.correa.pruebas@gmail.com', 'Recuperacion de contrasena');
            $mail->addAddress($Correo);

            // Configurar el contenido del correo
            $mail->isHTML(true);
            $mail->Subject = 'Recuperacion de contrasena';
            $mail->Body = "Tu nueva contrasena es: $nuevaContrasena";

            // Enviar el correo electrónico
            $mail->send();
            echo 'Se ha enviado un correo con la nueva contraseña.';
        } catch (Exception $e) {
            echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
        }
    } else {
        // No se encontró un usuario con ese correo
        echo 'No se encontró un usuario con ese correo.';
    }
}
?>

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
</body>
</html>
