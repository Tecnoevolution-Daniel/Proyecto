<?php

// Conexion a la base de datos
include 'Connection.php';
session_start();

if (empty($_SESSION['booleano'])) {
    header("Location: Login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el ID generado automáticamente
    $last_id = $_SESSION['id'];

    // Insertar datos en la tabla 'empleados'
    $stmt = $pdo->prepare("INSERT INTO empleados (id_register) VALUES (:id_register)");
    $stmt->bindParam(':id_register', $last_id);
    $stmt->execute();

    // Obtener el ID del empleado generado automáticamente
    $id_empleado = $pdo->lastInsertId();

    // Insertar datos en la subtabla 'empleados_datos_personales'
    $stmt = $pdo->prepare("INSERT INTO empleados_datos_personales 
                            (id_empleado, primerApellido, segundoApellido, nombres, numIdentificacion, tipoIdentificacion, lugarExpedicion, estadoCivil, numLibretaMilitar, distrito, clase) 
                            VALUES (:id_empleado, :primerApellido, :segundoApellido, :nombres, :numIdentificacion, :tipoIdentificacion, :lugarExpedicion, :estadoCivil, :numLibretaMilitar, :distrito, :clase)");
    $stmt->bindParam(':id_empleado', $id_empleado);
    $stmt->bindParam(':primerApellido', $_POST['primerApellido']);
    $stmt->bindParam(':segundoApellido', $_POST['segundoApellido']);
    $stmt->bindParam(':nombres', $_POST['nombres']);
    $stmt->bindParam(':numIdentificacion', $_POST['numIdentificacion']);
    $stmt->bindParam(':tipoIdentificacion', $_POST['tipoIdentificacion']);
    $stmt->bindParam(':lugarExpedicion', $_POST['lugarExpedicion']);
    $stmt->bindParam(':estadoCivil', $_POST['estadoCivil']);
    $stmt->bindParam(':numLibretaMilitar', $_POST['numLibretaMilitar']);
    $stmt->bindParam(':distrito', $_POST['distrito']);
    $stmt->bindParam(':clase', $_POST['clase']);
    $stmt->execute();

    // Insertar datos en la subtabla 'empleados_datos_contacto'
    $stmt = $pdo->prepare("INSERT INTO empleados_datos_contacto 
                            (id_empleado, direccionResidencia, barrio, telefonoFijo, celular, correoElectronico, eps, telefonoPadres, nombreConyuge, telefonoConyuge, empresaConyuge, otraPersonaContacto) 
                            VALUES (:id_empleado, :direccionResidencia, :barrio, :telefonoFijo, :celular, :correoElectronico, :eps, :telefonoPadres, :nombreConyuge, :telefonoConyuge, :empresaConyuge, :otraPersonaContacto)");
    $stmt->bindParam(':id_empleado', $id_empleado);
    $stmt->bindParam(':direccionResidencia', $_POST['direccionResidencia']);
    $stmt->bindParam(':barrio', $_POST['barrio']);
    $stmt->bindParam(':telefonoFijo', $_POST['telefonoFijo']);
    $stmt->bindParam(':celular', $_POST['celular']);
    $stmt->bindParam(':correoElectronico', $_POST['correoElectronico']);
    $stmt->bindParam(':eps', $_POST['eps']);
    $stmt->bindParam(':telefonoPadres', $_POST['telefonoPadres']);
    $stmt->bindParam(':nombreConyuge', $_POST['nombreConyuge']);
    $stmt->bindParam(':telefonoConyuge', $_POST['telefonoConyuge']);
    $stmt->bindParam(':empresaConyuge', $_POST['empresaConyuge']);
    $stmt->bindParam(':otraPersonaContacto', $_POST['otraPersonaContacto']);
    $stmt->execute();

    // Insertar datos en la subtabla 'empleados_datos_academicos'
    $stmt = $pdo->prepare("INSERT INTO empleados_datos_academicos 
                            (id_empleado, nivelEducativo, profesional, titulo, institucionEducativa, fechaGrado) 
                            VALUES (:id_empleado, :nivelEducativo, :profesional, :titulo, :institucionEducativa, :fechaGrado)");
    $stmt->bindParam(':id_empleado', $id_empleado);
    $stmt->bindParam(':nivelEducativo', $_POST['nivelEducativo']);
    $stmt->bindParam(':profesional', $_POST['profesional']);
    $stmt->bindParam(':titulo', $_POST['titulo']);
    $stmt->bindParam(':institucionEducativa', $_POST['institucionEducativa']);
    $stmt->bindParam(':fechaGrado', $_POST['fechaGrado']);
    $stmt->execute();

    // Insertar datos en la subtabla 'empleados_datos_vehiculos_licencias'
    $stmt = $pdo->prepare("INSERT INTO empleados_datos_vehiculos_licencias 
                            (id_empleado, vehiculo, marca, modelo, licenciaConduccion, numeroLicencia, categoriaLicencia, fechaVcto) 
                            VALUES (:id_empleado, :vehiculo, :marca, :modelo, :licenciaConduccion, :numeroLicencia, :categoriaLicencia, :fechaVcto)");
    $stmt->bindParam(':id_empleado', $id_empleado);
    $stmt->bindParam(':vehiculo', $_POST['vehiculo']);
    $stmt->bindParam(':marca', $_POST['marca']);
    $stmt->bindParam(':modelo', $_POST['modelo']);
    $stmt->bindParam(':licenciaConduccion', $_POST['licenciaConduccion']);
    $stmt->bindParam(':numeroLicencia', $_POST['numeroLicencia']);
    $stmt->bindParam(':categoriaLicencia', $_POST['categoriaLicencia']);
    $stmt->bindParam(':fechaVcto', $_POST['fechaVcto']);
    $stmt->execute();

    // Insertar datos en la subtabla 'empleados_datos_salud_familiar'
    $stmt = $pdo->prepare("INSERT INTO empleados_datos_salud_familiar 
    (id_empleado, fechaNacimiento, lugarNacimientoPais, lugarNacimientoCiudad, lugarNacimientoDpto, fecha, grupoSanguineo, tieneViviendaPropia, fondoPension, fondoCesantias, nombresApellidosPadres) 
    VALUES (:id_empleado, :fechaNacimiento, :lugarNacimientoPais, :lugarNacimientoCiudad, :lugarNacimientoDpto, :fecha, :grupoSanguineo, :tieneViviendaPropia, :fondoPension, :fondoCesantias, :nombresApellidosPadres)");
    $stmt->bindParam(':id_empleado', $id_empleado);
    $stmt->bindParam(':fechaNacimiento', $_POST['fechaNacimiento']);
    $stmt->bindParam(':lugarNacimientoPais', $_POST['lugarNacimientoPais']);
    $stmt->bindParam(':lugarNacimientoCiudad', $_POST['lugarNacimientoCiudad']);
    $stmt->bindParam(':lugarNacimientoDpto', $_POST['lugarNacimientoDpto']);
    $stmt->bindParam(':fecha', $_POST['fecha']);
    $stmt->bindParam(':grupoSanguineo', $_POST['grupoSanguineo']);
    $stmt->bindParam(':tieneViviendaPropia', $_POST['tieneViviendaPropia']);
    $stmt->bindParam(':fondoPension', $_POST['fondoPension']);
    $stmt->bindParam(':fondoCesantias', $_POST['fondoCesantias']);
    $stmt->bindParam(':nombresApellidosPadres', $_POST['nombresApellidosPadres']);
    $stmt->execute();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos empleado - Usuario: <?= $_SESSION['usuario'] ?></title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <form>
        <legend>Datos del empleado</legend>
            <div class="form-row">
                <div class="form-group col-md-4">
                      <!-- Primer apellido -->
                    <label for="primerApellido">Primer Apellido:</label>
                    <input type="text" class="form-control" id="primerApellido" required>
                </div>
                <div class="form-group col-md-4">
                      <!-- Segundo Apellido -->
                    <label for="segundoApellido">Segundo Apellido:</label>
                    <input type="text" class="form-control" id="segundoApellido">
                </div>
                <div class="form-group col-md-4">
                      <!-- Nombres -->
                    <label for="nombres">Nombres:</label>
                    <input type="text" class="form-control" id="nombres" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <!-- Numero identificacion -->
                    <label for="numIdentificacion">Número de Identificación:</label>
                    <input type="text" class="form-control" id="numIdentificacion" required>
                </div>
                <div class="form-group col-md-4">
                    <!-- Tipo de identificacion -->
                    <label for="tipoIdentificacion">Tipo:</label>
                    <select id="tipoIdentificacion" class="form-control" required>
                        <option selected disabled value="">Selecciona...</option>
                        <option>C.C.</option>
                        <option>T.I.</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <!-- Lugar de expedicion -->
                    <label for="lugarExpedicion">Lugar de Expedición:</label>
                    <input type="text" class="form-control" id="lugarExpedicion" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="estadoCivil">Estado Civil:</label>
                    <input type="text" class="form-control" id="estadoCivil" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="numLibretaMilitar">Número Libreta Militar:</label>
                    <input type="text" class="form-control" id="numLibretaMilitar" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="distrito">Distrito:</label>
                    <input type="text" class="form-control" id="distrito" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="clase">Clase:</label>
                    <input type="text" class="form-control" id="clase" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="numCuenta">Número Cuenta Ahorros/Corriente:</label>
                    <input type="text" class="form-control" id="numCuenta" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="banco">Banco:</label>
                    <input type="text" class="form-control" id="banco" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="fechaNacimientoDia">Fecha de Nacimiento:</label>
                    <input type="date" class="form-control" id="fechaNacimientoDia" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="lugarNacimientoPais">Lugar de Nacimiento:</label>
                    <input type="text" class="form-control" placeholder="País" id="lugarNacimientoPais" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="lugarNacimientoCiudad">Ciudad:</label>
                    <input type="text" class="form-control" id="lugarNacimientoCiudad" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="lugarNacimientoDpto">Departamento:</label>
                    <input type="text" class="form-control" id="lugarNacimientoDpto" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="direccionResidencia">Dirección de Residencia:</label>
                    <input type="text" class="form-control" id="direccionResidencia" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="barrio">Barrio:</label>
                    <input type="text" class="form-control" id="barrio" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="telefonoFijo">Teléfono Fijo:</label>
                    <input type="text" class="form-control" id="telefonoFijo" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="celular">Celular:</label>
                    <input type="text" class="form-control" id="celular" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="nivelEducativo">Nivel Educativo:</label>
                    <select id="nivelEducativo" class="form-control" required>
                        <option selected disabled value="">Selecciona...</option>
                        <option>Primaria</option>
                        <option>Secundaria</option>
                        <option>Superior</option>
                        <option>Técnico/Tecnólogo</option>
                        <option>Otro</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="profesional">Profesional:</label>
                    <select id="profesional" class="form-control" required>
                        <option selected disabled value="">Selecciona...</option>
                        <option>Si</option>
                        <option>No</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="titulo">Título:</label>
                    <input type="text" class="form-control" id="titulo" required>
                </div>          
                <div class="form-group col-md-4">
                    <label for="institucionEducativa">Institución Educativa:</label>
                    <input type="text" class="form-control" id="institucionEducativa" required>
                </div>
            </div>
            <div class="form-row">    
                <div class="form-group col-md-4">
                    <label for="fechaGrado">Fecha de Grado:</label>
                    <input type="text" class="form-control" id="fechaGrado" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="vehiculo"> Cuenta con vehículo:</label>
                    <select id="vehiculo" class="form-control" required>
                        <option selected disabled value="">Selecciona...</option>
                        <option>Si</option>
                        <option>No</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="marca">Marca:</label>
                    <input type="text" class="form-control" id="marca" required>
                </div>
            </div>
            <div class="form-row">    
                <div class="form-group col-md-4">
                    <label for="modelo">Modelo:</label>
                    <input type="text" class="form-control" id="modelo" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="licenciaConduccion">Licencia de Conducción:</label>
                    <input type="text" class="form-control" id="licenciaConduccion" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="numeroLicencia">Número:</label>
                    <input type="text" class="form-control" id="numeroLicencia" required>
                </div>
            </div>
            <div class="form-row">                
                <div class="form-group col-md-4">
                    <label for="categoriaLicencia">Categoría:</label>
                    <input type="text" class="form-control" id="categoriaLicencia" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="fechaVcto">Fecha Vencimiento:</label>
                    <input type="text" class="form-control" id="fechaVcto" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="tallaZapatos">Talla Zapatos:</label>
                    <input type="text" class="form-control" id="tallaZapatos" required>
                </div>
            </div>
            <div class="form-row">             
                <div class="form-group col-md-4">
                    <label for="tallaCamisa">Talla Camisa:</label>
                    <input type="text" class="form-control" id="tallaCamisa" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="tallaPantalon">Talla Pantalón:</label>
                    <input type="text" class="form-control" id="tallaPantalon" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="grupoSanguineo">Grupo Sanguíneo:</label>
                    <input type="text" class="form-control" id="grupoSanguineo" required>
                </div>
            </div>
            <div class="form-row">               
                <div class="form-group col-md-4">
                    <label for="tieneViviendaPropia">Tiene Vivienda Propia:</label>
                    <select id="tieneViviendaPropia" class="form-control" required>
                        <option selected disabled value="">Selecciona...</option>
                        <option>Si</option>
                        <option>No</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="eps">Empresa Promotora de Salud (EPS):</label>
                    <input type="text" class="form-control" id="eps" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="correoElectronico">Correo Electrónico:</label>
                    <input type="email" class="form-control" id="correoElectronico" required>
                </div>
            </div>
            <div class="form-row">               
                <div class="form-group col-md-4">
                    <label for="fondoPension"> Fondo de pensiones(AFP):</label>
                    <input type="text" class="form-control" id="FondoPension" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="fondoCesantias">Fondo de cesantias:</label>
                    <input type="text" class="form-control" id="FondoCesantias" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <h5>Relación de Hijos y Personas a Cargo</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nombres y Apellidos</th>
                                <th>Parentesco</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Edad</th>
                                <th>Grado Escolaridad</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" class="form-control" required></td>
                                <td><input type="text" class="form-control" required></td>
                                <td><input type="date" class="form-control" required></td>
                                <td><input type="text" class="form-control" required></td>
                                <td><input type="text" class="form-control" required></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nombresApellidosPadres">Nombres y Apellidos Padres:</label>
                    <input type="text" class="form-control" id="nombresApellidosPadres" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="telefonoPadres">Teléfono de Contacto:</label>
                    <input type="text" class="form-control" id="telefonoPadres" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nombreConyuge">Nombre del Cónyuge o Compañero(a):</label>
                    <input type="text" class="form-control" id="nombreConyuge" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="telefonoConyuge">Teléfono de Contacto:</label>
                    <input type="text" class="form-control" id="telefonoConyuge" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="empresaConyuge">Empresa donde Trabaja el Cónyuge y Número de Teléfono:</label>
                    <textarea class="form-control" id="empresaConyuge" rows="3" required></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="otraPersonaContacto">Otra Persona de Contacto:</label>
                    <textarea class="form-control" id="otraPersonaContacto" rows="3" required></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="fecha">Fecha:</label>
                    <input type="date" class="form-control" id="fecha" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</body>
</html>
