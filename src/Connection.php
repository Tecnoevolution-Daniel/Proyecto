<?php
// Obtener las variables de entorno para la conexión a la base de datos
$host = getenv('MYSQL_HOST');   //'localhost'
$port = getenv('MYSQL_PORT');   //
$user = getenv('MYSQL_USER');   // 'admin'
$password = getenv('MYSQL_PASSWORD');   // '123'
$database = getenv('MYSQL_DATABASE');   // 'prueba'

try {
    // Crear una instancia de la conexión PDO
    $dsn = "mysql:host=$host;dbname=$database";
    $pdo = new PDO($dsn, $user, $password);
    
    // Configurar el modo de error para lanzar excepciones
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch(PDOException $e) {
    // Capturar y mostrar cualquier error de conexión
    die("Conexión fallida: " . $e->getMessage());
}
?>
