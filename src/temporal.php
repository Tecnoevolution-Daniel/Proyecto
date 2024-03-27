<?php

session_start();

// Habilitar output buffering 
ob_start();
// Incluir el archivo de conexión a la base de datos
include 'Connection.php';



// Obtener el token y el tiempo de expiración de los parámetros de la URL
$token = $_GET['token'];
$tiempo_expiracion = $_GET['expira'];


// Verificar si el token es válido y si el enlace ha caducado
if ($token && $tiempo_expiracion && $tiempo_expiracion > time()) {
    // El enlace es válido y no ha caducado
    //echo "Bienvenido a la página secreta.";

    $current_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


    ?>    
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cambio de Contraseña</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>

    <body>
        <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 >Cambiar contraseña</h3>
                            </div>
                            <div class="card-body">
                                <form action= "".$current_link method="POST">
                                    <div class="center-content">

                                        <div class="form-group" >
                                                <label for="token">Ingrese el token suministrado</label>
                                                <input type="text" class="form-control input-short" style="text-align: center;" id="token" name="token"  required>
                                            </div>

                                        <div class="form-group" >
                                            <label for="pass1">Ingrese nueva contraseña</label>
                                            <input type="password" class="form-control input-short" style="text-align: center;" id="password" name="password"  required>
                                        </div>
                                        
                                        <div class="form-group" >
                                            <label for="pass2">Repita la contraseña</label>
                                            <input type="password" class="form-control input-short" style="text-align: center;" id="password2" name="password2"  required >
                                        </div>
                                        

                                        
                                           
                                       
                                        
                                    </div>
                                    <button type="button submit" class="btn btn-primary btn-block" >Ingresar</button>
                
                                </form>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>

    </body>
    </html>

<?php

} else {
    // El enlace es inválido o ha caducado
    echo "El enlace ha caducado";

    $query = "UPDATE tokens set estado = 0 where token = :token";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['token' => $token]);

}





function contieneCaracteresEspeciales($cadena) {

    $caracteresEspeciales = array('~', '`', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-', '_', '=', '+', '[',
                                '{', ']', '}', '\\', '|', ';', ':', "'", '"', ',', '<', '.', '>', '/', '?');

 
    foreach ($caracteresEspeciales as $caracterEspecial) {
        if (strpos($cadena, $caracterEspecial) !== false) {
            return true; 
        }
    }
    
    return false; 
}


// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el correo y la contraseña enviados por el formulario
    $token_rec = $_POST['token'];
    $pass1 = $_POST['password'];
    $pass2 = $_POST['password2'];
   

    // Consultar la base de datos para verificar si el correo existe
    $query = "SELECT * FROM tokens WHERE token = :token";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['token' => $token_rec]);


    // Verificar si se encontró un usuario con el correo dado
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //echo "Token encontrado\n";
        
        $query2 = "SELECT estado FROM tokens WHERE token = :token";
        $stmt2 = $pdo->prepare($query2);
        $stmt2->execute(['token' => $token_rec]);

        $resultado = $stmt2->fetchColumn();
        
        if ($resultado == 1){

            //echo "El token está activo";
            if ($pass1 != $pass2){
                echo '<p style="color: red;text-align: center;">Las contraseñas no coinciden</p>';
            }
            else {

                if (strlen($pass1) >= 8){

                    if (contieneCaracteresEspeciales($pass1)){
                        
                        $query3 = "SELECT correo FROM tokens WHERE token = :token";
                        $stmt3 = $pdo->prepare($query3);
                        $stmt3->execute(['token' => $token_rec]);
                        $resultado = $stmt3->fetchColumn();
                        

                        $contrasena_nueva = password_hash($pass1,PASSWORD_DEFAULT);
                        $query4 = "UPDATE usuarios SET contrasena = '$contrasena_nueva' WHERE correo = :resultado";
                        $stmt4 = $pdo->prepare($query4);
                        $stmt4->execute(['resultado' => $resultado]);


                        $query5 = "UPDATE tokens set estado = 0 where token = :token";
                        $stmt5 = $pdo->prepare($query5);
                        $stmt5->execute(['token' => $token_rec]);
                        
                        echo '<p style="color: red;text-align: center;">Contraseña actualizada con exito!</p>';
                        exit();

                    }
                    else{
                        
                        echo '<p style="color: red;text-align: center;">La contraseña no contiene caracteres especiales</p>';
                        
                    }
                }
                else{
 
                    echo '<p style="color: red;text-align: center;">La contraseña debe contener minimo 8 caracteres</p>';
                }
            }
            

        }
        else {

            echo '<p style="color: red;text-align: center;">El token expiró</p>';
            exit;
        }



        
        

        
    } else {
        // No se encontró un usuario con ese correo
        echo '<p style="color: red;text-align: center;">Token invalido, ingrese uno valido</p>';
       
    }
}
?>



