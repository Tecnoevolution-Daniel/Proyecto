<?php

require_once __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Incluir el archivo de conexión a la base de datos
include 'Connection.php';

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

        //$nuevaContrasena = generarContrasenaSegura();

        // Actualizar la contraseña en la base de datos
        //$updateQuery = "UPDATE usuarios SET contrasena = :contrasena WHERE correo = :correo";
        //$updateStmt = $pdo->prepare($updateQuery);
        //$updateStmt->execute(['contrasena' => password_hash($nuevaContrasena, PASSWORD_DEFAULT), 'correo' => $Correo]);

        $token = md5(uniqid(rand(), true));
        $token2 = substr(md5(uniqid(rand(), true)), 0, 6);
        $tiempo_expiracion = time() + (60 * 10);
        $url_enlace = "http://localhost/Proyecto/src/temporal.php?token=$token2&expira=$tiempo_expiracion";


        // Enviar el correo electrónico con la nueva contraseña utilizando PHPMailer
        $mail = new PHPMailer(true); // Instancia de PHPMailer con manejo de excepciones activado
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
            $mail->Body = 'Ingrese al siguiente enlace para cambiar la contrasena: <a href="'.$url_enlace.'">Aqui</a> <br>Recuerde usar el token: '.$token2.' ';

            $temp = TRUE;

            $updateQuery = "INSERT INTO tokens ( token, correo, estado) VALUES ('$token2','$Correo','$temp')";
            $updateStmt = $pdo->prepare($updateQuery);
            $updateStmt->execute();
            
            // Enviar el correo electrónico
            $mail->send();
            echo '<p style="color: red;text-align: center;">Se ha enviado un correo para restablecer contraseña</p>';

        } catch (Exception $e) {
            echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
        }
    } else {
        // No se encontró un usuario con ese correo
        echo '<p style="color: red;text-align: center;">No se encontró un usuario con ese correo</p>';
    
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
                    <div class="card-header" style="">
                        <h3 >Recuperar contraseña</h3>
                    </div>
                    <div class="card-body">
                        <form action="cambiar_contrasena.php" method="POST">
                            <div class="form-group">
                                <label for="correo">Ingrese su correo electrónico</label>
                                <div>
                                    <input type="email" class="form-control input-short" style="text-align: center;" id="correo" name="correo" placeholder="Ejemplo@gmail.com" required>
                                </div>
                            </div>
                            <div >
                                <button type="submit" class="btn btn-primary btn-block" >Enviar</button>
                            </div>
                        </form>
                        <div class="mt-3 text-center">
                            <a href="Login.php" >Volver atrás</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>