<?php

// Conexion a la base de datos
include 'Connection.php';
session_start();

// Verificar la conexión a la base de datos
if (!$pdo) {
    die("Error en la conexión a la base de datos: " . $pdo->errorInfo()[2]);
}

if (empty($_SESSION['booleano']) && (empty($_SESSION['rol']) || $_SESSION['rol'] != 'proveedor')) {
    header("Location: Login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try{
        // Obtener el ID generado automáticamente
        $last_id = $_SESSION['id'];

        // Insertar datos en la tabla 'proveedores'
        $stmt = $pdo->prepare("INSERT INTO proveedores (id_register) VALUES (:id_register)");
        $stmt->bindParam(':id_register', $last_id);
        $stmt->execute();

        // Obtener el ID del proveedor generado automáticamente
        $id_proveedor = $pdo->lastInsertId();

        // Insertar en la tabla `proveedores informacion empresa`
        $stmt = $pdo->prepare("INSERT INTO proveedores_informacion_empresa (id_proveedor, tipoSolicitud, proceso) VALUES(:id_proveedor, :tipoSolicitud, :proceso)");
        $stmt->bindParam(':id_proveedor', $id_proveedor);
        $stmt->bindParam(':tipoSolicitud', $_POST['tipoSolicitud']);
        $stmt->bindParam(':proceso', $_POST['proceso']);
        $stmt->execute();
       
        // Insertar en la tabla `proveedores informacion basica`
        $stmt = $pdo->prepare("INSERT INTO proveedores_informacion_basica (id_proveedor, tipoSociedad, tipoEmpresa, tamanoEmpresa, nombreRazonSocial, nit, nombreComercial, telefono, direccionDomicilio, ciudad, departamento, pais, fechaInicio, experiencia, paginaWeb, proposito, personaContacto, ocupacionContacto, celularContacto, correoContacto) 
                                                    VALUES (:id_proveedor, :tipoSociedad, :tipoEmpresa, :tamanoEmpresa, :nombreRazonSocial, :nit, :nombreComercial, :telefono, :direccionDomicilio, :ciudad, :departamento, :pais, :fechaInicio, :experiencia, :paginaWeb, :proposito, :personaContacto, :ocupacionContacto, :celularContacto, :correoContacto)");
        $stmt->bindParam(':id_proveedor', $id_proveedor);
        $stmt->bindParam(':tipoSociedad', $_POST['tipoSociedad']);
        $stmt->bindParam(':tipoEmpresa', $_POST['tipoEmpresa']);
        $stmt->bindParam(':tamanoEmpresa', $_POST['tamanoEmpresa']);
        $stmt->bindParam(':nombreRazonSocial', $_POST['nombreRazonSocial']);
        $stmt->bindParam(':nit', $_POST['nit']);
        $stmt->bindParam(':nombreComercial', $_POST['nombreComercial']);
        $stmt->bindParam(':telefono', $_POST['telefono']);
        $stmt->bindParam(':direccionDomicilio', $_POST['direccionDomicilio']);
        $stmt->bindParam(':ciudad', $_POST['ciudad']);
        $stmt->bindParam(':departamento', $_POST['departamento']);
        $stmt->bindParam(':pais', $_POST['pais']);
        $stmt->bindParam(':fechaInicio', $_POST['fechaInicio']);
        $stmt->bindParam(':experiencia', $_POST['experiencia']);
        $stmt->bindParam(':paginaWeb', $_POST['paginaWeb']);
        $stmt->bindParam(':proposito', $_POST['proposito']);
        $stmt->bindParam(':personaContacto', $_POST['personaContacto']);
        $stmt->bindParam(':ocupacionContacto', $_POST['ocupacionContacto']);
        $stmt->bindParam(':celularContacto', $_POST['celularContacto']);
        $stmt->bindParam(':correoContacto', $_POST['correoContacto']);
        $stmt->execute();

        // Insertar en la tabla `proveedores informacion representante`  
        $stmt = $pdo->prepare("INSERT INTO proveedores_informacion_representante (id_proveedor, nombresApellidos, numIdentificacion, tipoIdentificacion, fechaExpedicion, lugarExpedicion, lugarNacimientoCiudad, fechaNacimiento, paisNacimiento, profesionRepresentante, accionista, correoElectronico, numContacto) 
                                VALUES (:id_proveedor, :nombresApellidos, :numIdentificacion, :tipoIdentificacion, :fechaExpedicion, :lugarExpedicion, :lugarNacimientoCiudad, :fechaNacimiento, :paisNacimiento, :profesionRepresentante, :accionista, :correoElectronico, :numContacto)");
        $stmt->bindParam(':id_proveedor', $id_proveedor);
        $stmt->bindParam(':nombresApellidos', $_POST['nombresApellidos']);
        $stmt->bindParam(':numIdentificacion', $_POST['numIdentificacion']);
        $stmt->bindParam(':tipoIdentificacion', $_POST['tipoIdentificacion']);
        $stmt->bindParam(':fechaExpedicion', $_POST['fechaExpedicion']);
        $stmt->bindParam(':lugarExpedicion', $_POST['lugarExpedicion']);
        $stmt->bindParam(':lugarNacimientoCiudad', $_POST['lugarNacimientoCiudad']);
        $stmt->bindParam(':fechaNacimiento', $_POST['fechaNacimiento']);
        $stmt->bindParam(':paisNacimiento', $_POST['paisNacimiento']);
        $stmt->bindParam(':profesionRepresentante', $_POST['profesionRepresentante']);
        $stmt->bindParam(':accionista', $_POST['accionista']);
        $stmt->bindParam(':correoElectronico', $_POST['correoElectronico']);
        $stmt->bindParam(':numContacto', $_POST['numContacto']);
        $stmt->execute();


        // Insertar en la tabla `proveedores actividad economica`
        $stmt = $pdo->prepare("INSERT INTO proveedores_actividad_economica (id_proveedor, codigo, lineaProductos, actividad, especialidad, informacionTributaria, resolucion) 
                                VALUES (:id_proveedor, :codigo, :lineaProductos, :actividad, :especialidad, :informacionTributaria, :resolucion)");
        $stmt->bindParam(':id_proveedor', $id_proveedor);
        $stmt->bindParam(':codigo', $_POST['codigo']);
        $stmt->bindParam(':lineaProductos', $_POST['lineaProductos']);
        $stmt->bindParam(':actividad', $_POST['actividad']);
        $stmt->bindParam(':especialidad', $_POST['especialidad']);
        $stmt->bindParam(':informacionTributaria', $_POST['informacionTributaria']);
        $stmt->bindParam(':resolucion', $_POST['resolucion']);
        $stmt->execute();


        // Insertar datos en la tabla proveedores operaciones moneda extranjera
        $stmt = $pdo->prepare("INSERT INTO proveedores_operaciones_moneda_extranjera (id_proveedor, operacionInternacional, operacionMonedas, otraMonedas) 
                                    VALUES (:id_proveedor, :operacionInternacional, :operacionMonedas, :otraMonedas)");
        $stmt->bindParam(':id_proveedor', $id_proveedor);
        $stmt->bindParam(':operacionInternacional', $_POST['operacionInternacional']);
        $stmt->bindParam(':operacionMonedas', $_POST['operacionMonedas']);
        $stmt->bindParam(':otraMonedas', $_POST['otraMonedas']);
        $stmt->execute();


        // Insertar datos en la tabla proveedores operaciones moneda extranjera cuentas
        $stmt = $pdo->prepare("INSERT INTO proveedores_operaciones_moneda_extranjera_cuentas (id_proveedor, tipoProducto, tipoMoneda, nombreEntidad, numeroCuenta, pais) 
                    VALUES (:id_proveedor, :tipoProducto, :tipoMoneda, :nombreEntidad, :numeroCuenta, :pais)");

        $data = json_decode($_POST['tableKids1'], true);
        foreach($data as $row) {
            $stmt->execute([
                ':id_proveedor' => $id_proveedor,
                ':tipoProducto' => $row['tipoProducto'],
                ':tipoMoneda' => $row['tipoMoneda'],
                ':nombreEntidad' => $row['nombreEntidad'],
                ':numeroCuenta' => $row['numeroCuenta'],
                ':pais' => $row['pais'],
                
            ]);
        }


        // Insertar datos en la tabla proveedores operaciones activos virtuales
        $stmt = $pdo->prepare("INSERT INTO proveedores_operaciones_activos_virtuales (id_proveedor, tipoProductos, tipoMonedas, nombreEntidades, numeroCuentas, paises) 
                                 VALUES (:id_proveedor, :tipoProductos, :tipoMonedas, :nombreEntidades, :numeroCuentas, :paises)");
  
        $data = json_decode($_POST['tableKids2'], true);
        foreach($data as $row) {
            $stmt->execute([
                ':id_proveedor' => $id_proveedor,
                ':tipoProductos' => $row['tipoProductos'],
                ':tipoMonedas' => $row['tipoMonedas'],
                ':nombreEntidades' => $row['nombreEntidades'],
                ':numeroCuentas' => $row['numeroCuentas'],
                ':paises' => $row['paises'],
            ]);
        }


        // Insertar datos en la tabla proveedores informacion financiera personal
        $stmt = $pdo->prepare("INSERT INTO proveedores_informacion_financiera_personal (id_proveedor, anio, ingresos, egresos, valorActivos, valorPasivos, utilidad, numeroEmpleados) 
                        VALUES (:id_proveedor, :anio, :ingresos, :egresos, :valorActivos, :valorPasivos, :utilidad, :numeroEmpleados)");
        $stmt->bindParam(':id_proveedor', $id_proveedor);                
        $stmt->bindParam(':anio', $_POST['anio']);
        $stmt->bindParam(':ingresos', $_POST['ingresos']);
        $stmt->bindParam(':egresos', $_POST['egresos']);
        $stmt->bindParam(':valorActivos', $_POST['valorActivos']);
        $stmt->bindParam(':valorPasivos', $_POST['valorPasivos']);
        $stmt->bindParam(':utilidad', $_POST['utilidad']);
        $stmt->bindParam(':numeroEmpleados', $_POST['numeroEmpleados']);
        $stmt->execute();


        // Insertar datos en la tabla proveedores identificacion beneficiarios
        $stmt = $pdo->prepare("INSERT INTO proveedores_identificacion_beneficiarios (id_proveedor, nombres, paisBeneficiario, nacionalidadBeneficiario, tipoDocumento, numeroIdentificacion, participacion) 
                        VALUES (:id_proveedor, :nombres, :paisBeneficiario, :nacionalidadBeneficiario, :tipoDocumento, :numeroIdentificacion, :participacion)");

        $data = json_decode($_POST['tableKids'], true);
        foreach($data as $row) {
            $stmt->execute([
                ':id_proveedor' => $id_proveedor,
                ':nombres' => $row['nombres'],
                ':paisBeneficiario' => $row['paisBeneficiario'],
                ':nacionalidadBeneficiario' => $row['nacionalidadBeneficiario'],
                ':tipoDocumento' => $row['tipoDocumento'],
                ':numeroIdentificacion' => $row['numeroIdentificacion'],
                ':participacion' => $row['participacion'],
            ]);
        }

    }catch(PDOException $e){
        log_action($_SESSION['id'], 'proveedores', 'insert:error', $e->getMessage());
        die("Error al insertar datos: " . $e->getMessage());
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos proveedor - Usuario: <?= $_SESSION['usuario'] ?></title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body>
    <div class="container mt-5">
        <form action="Proveedores.php" method="post">
            <legend>Datos del proveedor</legend>
            <div class="card mt-4">
                    <div class="card-header">
                        Información de los proveedores
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="tipoSolicitud">Tipo de solicitud:</label>
                                <select class="form-control" id="tipoSolicitud" name="tipoSolicitud" required>
                                    <option value="">Seleccione</option>
                                    <option value="personaJuridica">Persona jurídica</option>
                                    <option value="personaNatural">Persona natural</option>
                                </select>
                            </div>                            
                            <div class="form-group col-md-4">
                                <label for="proceso">Proceso:</label>
                                <select class="form-control" id="proceso" name="proceso" required>
                                    <option value="">Seleccione</option>
                                    <option value="Creacion">Creación</option>
                                    <option value="Actualizacion">Actualización</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="fecha">Fecha:</label>
                                <input type="date" class="form-control" id="fecha" required>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="card mt-4">
                    <div class="card-header">
                        Información Básica Persona Natural o Jurídica
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="tipoSociedad">Tipo de Sociedad:</label>
                                <select class="form-control" id="tipoSociedad" name="tipoSociedad" required>
                                    <option value="">Seleccione</option>
                                    <option value="unipersonal">Unipersonal</option>
                                    <option value="limitada">Limitada</option>
                                    <option value="colectiva">Colectiva</option>
                                    <option value="economiaMixta">Economía Mixta</option>
                                    <option value="enComandita">En Comandita</option>
                                    <option value="anonima">Anónima</option>
                                    <option value="sas">SAS</option>
                                    <option value="fideicomisos">Fideicomisos</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tipoEmpresa">Tipo de Empresa:</label>
                                <select class="form-control" id="tipoEmpresa" name="tipoEmpresa" required>
                                    <option value="">Seleccione</option>
                                    <option value="privada">Privada</option>
                                    <option value="pública">Pública</option>
                                    <option value="mixta">Mixta</option>
                                    <option value="entidadSinAnimoLucro">Entidad Sin Ánimo de Lucro</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tamanoEmpresa">Tamaño:</label>
                                <select class="form-control" id="tamanoEmpresa" name="tamanoEmpresa" required>
                                    <option value="">Seleccione</option>
                                    <option value="microempresa">Microempresa</option>
                                    <option value="pequeña">Pequeña</option>
                                    <option value="mediana">Mediana</option>
                                    <option value="grande">Grande</option>
                                </select>
                            </div>       
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="nombreRazonSocial">Nombre o Razón Social:</label>
                                <input type="text" class="form-control" id="nombreRazonSocial" name="nombreRazonSocial" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="nit">NIT/CC/CE/PA:</label>
                                <input type="text" class="form-control" id="nit" name="nit" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="nombreComercial"> Nombre comercial:</label>
                                <input type="text" class="form-control" id="nombreComercial" name="nombreComercial" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="telefono"> Telefono:</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="direccionDomicilio"> Direccion domicilio principal:</label>
                                <input type="text" class="form-control" id="direccionDomicilio" name="direccionDomicilio" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="ciudad"> Ciudad:</label>
                                <input type="text" class="form-control" id="ciudad" name="ciudad" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="departamento"> Departamento:</label>
                                <input type="text" class="form-control" id="departamento" name="departamento" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="pais"> Pais:</label>
                                <input type="text" class="form-control" id="pais" name="pais">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="fechaInicio">Fecha de inicio de actividades o constitucion:</label>
                                <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" required>
                            </div>    
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="experiencia">Experiencia en el mercado (Años)</label>
                                <input type="text" class="form-control" id="experiencia" name="experiencia" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="paginaWeb"> Pagina web:</label>
                                <input type="text" class="form-control" id="paginaWeb" name="paginaWeb" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="proposito"> Proposito de la relacion legal o contractual:</label>
                                <input type="text" class="form-control" id="proposito" name="proposito" required>
                            </div>         
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="personaContacto"> Nombre persona contacto:</label>
                                <input type="text" class="form-control" id="personaContacto" name="personaContacto" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="ocupacionContacto"> Ocupacion de la persona de contacto</label>
                                <input type="text" class="form-control" id="ocupacionContacto" name="ocupacionContacto" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="celularContacto"> Celular persona de contacto:</label>
                                <input type="text" class="form-control" id="celularContacto" name="celularContacto" required>
                            </div>
                        </div>
                        <div class="form-row">  
                            <div class="form-group col-md-4">
                                <label for="correoContacto"> Correo electronico de contacto:</label>
                                <input type="text" class="form-control" id="correoContacto" name="correoContacto" required>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="card mt-4">
                    <div class="card-header">
                        Información del Representante Legal que firma documento (Aplica para Persona Jurídica)
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="nombresApellidos"> Nombres y apellidos </label>
                                <input type="text" class="form-control" id="nombresApellidos" name="nombresApellidos" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="numIdentificacion"> No.Identificacion </label>
                                <input type="text" class="form-control" id="numIdentificacion" name="numIdentificacion" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tipoIdentificacion">Tipo:</label>
                                <select id="tipoIdentificacion" class="form-control" name="tipoIdentificacion" required>
                                    <option value="" disabled selected>Selecciona...</option>
                                    <option value="NIT">NIT</option>
                                    <option value="CC">Cedula de ciudadania</option>
                                    <option value="CE">Cedula de extranjeria</option>
                                    <option value="PA">Pasaporte</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="fechaExpedicion">Fecha de expedicion:</label>
                                <input type="date" class="form-control" id="fechaExpedicion" name="fechaExpedicion" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="lugarExpedicion">Lugar de Expedición:</label>
                                <input type="text" class="form-control" id="lugarExpedicion" name="lugarExpedicion" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="lugarNacimientoCiudad">Ciudad:</label>
                                <input type="text" class="form-control" id="lugarNacimientoCiudad" name="lugarNacimientoCiudad" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">                           
                                <label for="fechaNacimiento">Fecha de Nacimiento:</label>
                                <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="paisNacimiento">Lugar de Nacimiento:</label>
                                <input type="text" class="form-control" id="paisNacimiento" name="paisNacimiento" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="profesionRepresentante">profesion:</label>
                                <input type="text" class="form-control" id="profesionRepresentante" name="profesionRepresentante" required>
                            </div>   
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="accionista">Es accionista de la empresa:</label>
                                <select id="accionista" class="form-control" name="accionista" required>
                                    <option selected disabled value="">Selecciona...</option>
                                    <option>Si</option>
                                    <option>No</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="correoElectronico">Correo Electrónico:</label>
                                <input type="email" class="form-control" id="correoElectronico" name="correoElectronico" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="numContacto">Numero de contacto:</label>
                                <input type="text" class="form-control" id="numContacto" name="numContacto" required>
                            </div>   
                        </div>
                    </div>
            </div>
            <div class="card mt-4">
                    <div class="card-header">
                        INFORMACION SOBRE LA ACTIVIDAD ECONOMICA DE LA EMPRESA O PERSONA NATURAL
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="codigo"> Codigo CIIU </label>
                                <input type="text" class="form-control" id="codigo" name="codigo" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="lineaProductos">Linea de productos y servicios(Descripcion) </label>
                                <input type="text" class="form-control" id="lineaProductos" name="lineaProductos">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="actividad">Actividad:</label>
                                <select id="actividad" class="form-control" name="actividad" required>
                                    <option selected disabled value="">Selecciona...</option>
                                    <option>Productos/Bienes</option>
                                    <option>Servicios</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="especialidad">Especialidad:</label>
                                <select id="especialidad" class="form-control" name="especialidad" required>
                                    <option selected disabled value="">Selecciona...</option>
                                    <option>Fabricante</option>
                                    <option>Importador</option>
                                    <option>Intermediario</option>
                                    <option>Distribuidor</option>
                                    <option>Outsourcing</option>
                                    <option>Servicios</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="informacionTributaria">Especialidad:</label>
                                <select id="informacionTributaria" class="form-control" name="informacionTributaria" required>
                                    <option selected disabled value="">Selecciona...</option>
                                    <option value="granContribuyente">Gran contribuyente</option>
                                    <option value="autorretenedor">Autorretenedor</option>
                                    <option value="regimenComun">Regimen comun</option>
                                    <option value="regimenSimplificado">Regimen simplificado</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="resolucion">No. Resolucion</label>
                                <input type="text" class="form-control" id="resolucion" name="resolucion" required>
                            </div>
                        </div>
                    </div>
            </div>  

            <div class="card mt-4">
                <div class="card-header">
                    Información sobre Operaciones en Moneda Extranjera (PN o PJ)
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="operacionInternacional">¿Por su actividad como persona natural o jurídica realiza operaciones internacionales?</label>
                            <select id="operacionInternacional" class="form-control" name="operacionInternacional" required>
                                <option selected disabled value="">Selecciona...</option>
                                <option>Si</option>
                                <option>No</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="operacionMonedas">¿Cuál(es) de las siguientes operaciones realiza en moneda extranjera:</label>
                                <select id="operacionMonedas" class="form-control" name="operacionMonedas" required>
                                    <option selected disabled value="">Selecciona...</option>
                                    <option value="Importacion">Importacion</option>
                                    <option value="Exportacion">Exportacion</option>
                                    <option value="Pago_servicios"> Pago de servicios</option>
                                    <option value="Prestamos">Prestamos</option>
                                    <option value="Inversiones">Inversiones</option>
                                    <option value="Otra">Otra</option>
                                </select>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="otraMonedas"> Si su respuesta anterior fue (otra), especifique cual operacion hace?       </label>
                            <input type="text" class="form-control" id="otraMonedas" name="otraMonedas" required>
                        </div>
                    </div>

                    <div x-data="{ cuentaMonedaExtranjera: '' }">
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="cuentaMonedaExtranjera">¿Cómo persona natural o jurídica posee cuentas en moneda extranjera en países diferentes al domicilio de la empresa o persona natural?</label>
                                <select id="cuentaMonedaExtranjera" class="form-control" name="cuentaMonedaExtranjera" required  x-model="cuentaMonedaExtranjera">
                                    <option selected disabled value="">Selecciona...</option>
                                    <option value="1">Si</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                    
                        <div class="form-row" id="tabla-vale1" x-show="cuentaMonedaExtranjera === '1'">
                            <div class="form-group col-md-12">
                                <h6>Si su respuesta anterior fue si, porfavor llena la siguente tabla</h6>
                                <table x-data="table_kids1" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Tipo de producto 
                                                    (Cta ahorros o corriente)
                                            </th>
                                            <th>Tipo de moneda</th>
                                            <th>Nombre de la entidad</th>
                                            <th>numero de cuenta</th>
                                            <th>Pais</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="row in length">
                                            <tr x-bind:key="row">
                                                <td><input type="text" class="form-control" x-on:input="updateData(row - 1, 'tipoProducto', $el.value)"></td>
                                                <td><input type="text" class="form-control" x-on:input="updateData(row - 1, 'tipoMoneda', $el.value)" ></td>
                                                <td><input type="text" class="form-control" x-on:input="updateData(row - 1, 'nombreEntidad', $el.value)"></td>
                                                <td><input type="text" class="form-control" x-on:input="updateData(row - 1, 'numeroCuenta', $el.value)"></td>
                                                <td><input type="text" class="form-control" x-on:input="updateData(row - 1, 'pais', $el.value)"></td>
                                            </tr>
                                        </template>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4">
                                                <button type="button" class="btn btn-success" x-on:click="addRow">Añadir columna</button>
                                                <button type="button" class="btn btn-danger" x-on:click="deleteRow">Eliminar columna</button>
                                            </td>
                                            <td>
                                                <input type="hidden" name="tableKids1" x-bind:value="JSON.stringify(data)">
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>

                                <script>
                                    document.addEventListener('alpine:init', () => {
                                        Alpine.data('table_kids1', () => ({
                                            data: [],
                                            length: 0,

                                            addRow() {
                                                this.length += 1;
                                                this.data = [...this.data, {}];
                                            },
                                            deleteRow() {
                                                if (this.length == 0) return;

                                                this.length -= 1;
                                                this.data = this.data.slice(0, this.length);
                                            },

                                            updateData(row, parameter, value) {
                                                if (this.data.length == 0) {
                                                    this.addRow();
                                                    this.length = 1;
                                                }
                                                this.data[row][parameter] = value;
                                            },
                                        }));
                                    });
                
                                </script>
                            </div>
                        </div>
                    </div>

                    <div x-data="{ activosVirtuales: '' }">
                            <div class="form-row">    
                                <div class="form-group col-md-8">
                                    <label for="activosVirtuales">¿Cómo persona natural o jurídica posee activos virtuales?</label>
                                    <select id="activosVirtuales" class="form-control" name="activosVirtuales" x-model="activosVirtuales" required>
                                        <option selected disabled value="">Selecciona...</option>
                                        <option value="1">Si</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>

                        <div class="form-row" id="tabla-vale" x-show="activosVirtuales === '1'">
                            <div class="form-group col-md-12">
                                <h6>Si su respuesta anterior fue si, porfavor llena la siguente tabla</h6>
                                <table x-data="table_kids2" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Tipo de producto 
                                                    (Cta ahorros o corriente)
                                            </th>
                                            <th>Tipo de moneda</th>
                                            <th>Nombre de la entidad</th>
                                            <th>numero de cuenta</th>
                                            <th>Pais</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="row in length">
                                            <tr x-bind:key="row">
                                                <td><input type="text" class="form-control" x-on:input="updateData(row - 1, 'tipoProductos', $el.value)"></td>
                                                <td><input type="text" class="form-control" x-on:input="updateData(row - 1, 'tipoMonedas', $el.value)"></td>
                                                <td><input type="text" class="form-control" x-on:input="updateData(row - 1, 'nombreEntidades', $el.value)"></td>
                                                <td><input type="text" class="form-control" x-on:input="updateData(row - 1, 'numeroCuentas', $el.value)"></td>
                                                <td><input type="text" class="form-control" x-on:input="updateData(row - 1, 'paises', $el.value)"></td>
                                            </tr>
                                        </template>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4">
                                                <button type="button" class="btn btn-success" x-on:click="addRow">Añadir columna</button>
                                                <button type="button" class="btn btn-danger" x-on:click="deleteRow">Eliminar columna</button>
                                            </td>
                                            <td>
                                                <input type="hidden" name="tableKids2" x-bind:value="JSON.stringify(data)">
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>

                                <script>
                                    document.addEventListener('alpine:init', () => {
                                        Alpine.data('table_kids2', () => ({
                                            data: [],
                                            length: 0,

                                            addRow() {
                                                this.length += 1;
                                                this.data = [...this.data, {}];
                                            },
                                            deleteRow() {
                                                if (this.length == 0) return;

                                                this.length -= 1;
                                                this.data = this.data.slice(0, this.length);
                                            },

                                            updateData(row, parameter, value) {
                                                if (this.data.length == 0) {
                                                    this.addRow();
                                                    this.length = 1;
                                                }
                                                this.data[row][parameter] = value;
                                            },
                                        }));
                                    });                
                                </script>
                            </div>
                        </div>    
                    </div>
                </div>     
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    INFORMACIÓN FINANCIERA PERSONA NATURAL O JURIDICA
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="anio">Año (Ultimo año fiscal)</label>
                            <input type="text" class="form-control" id="anio" name="anio" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="ingresos"> Ingreso totales anual</label>
                            <input type="text" class="form-control" id="ingresos" name="ingresos" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="egresos"> Egresos totales anual</label>
                            <input type="text" class="form-control" id="egresos" name="egresos" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="valorActivos"> Valor activos</label>
                            <input type="text" class="form-control" id="valorActivos" name="valorActivos" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="valorPasivos"> Valor pasivos(deudas)</label>
                            <input type="text" class="form-control" id="valorPasivos" name="valorPasivos" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="utilidad"> Utilidad o perdida anual</label>
                            <input type="text" class="form-control" id="utilidad" name="utilidad" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="numeroEmpleados"> Numero de empleados</label>
                            <input type="text" class="form-control" id="numeroEmpleados" name="numeroEmpleados" required>
                        </div>
                    </div>
                </div>    
            </div>

            <div class="card mt-4">
                    <div class="card-header">
                        Identificacion de los beneficiarios finales
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <h7>Identifique las personas naturales que tienen una participación en la persona o estructura jurídica declarante igual o mayor al 5%</h7>
                                <table x-data="table_kids" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nombres y apellidos(Completos) </th>
                                            <th>Pais (Domicilio)</th>
                                            <th>Nacionalidad</th>
                                            <th>Tipo documento de Identificacion</th>
                                            <th>Numero de identificacion</th>
                                            <th>Participacion en % </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="row in length">
                                            <tr x-bind:key="row">
                                                <td><input type="text" class="form-control" x-on:input="updateData(row - 1, 'nombres', $el.value)" required></td>
                                                <td><input type="text" class="form-control" x-on:input="updateData(row - 1, 'paisBeneficiario', $el.value)" required></td>
                                                <td><input type="text" class="form-control" x-on:input="updateData(row - 1, 'nacionalidadBeneficiario', $el.value)" required></td>
                                                <td>
                                                    <select class="form-control" x-on:change="updateData(row - 1, 'tipoDocumento', $el.value)" required>
                                                        <option value="" disabled selected>Selecciona...</option>
                                                        <option value="T.I">T.I</option>
                                                        <option value="C.C">C.C</option>
                                                        <option value="NIT">NIT</option>
                                                        <option value="C.E">C.E</option>
                                                        <option value="OTRO">OTRO</option>
                                                    </select>
                                                </td>
                                                <td><input type="text" class="form-control" x-on:input="updateData(row - 1, 'numeroIdentificacion', $el.value)" required></td>
                                                <td><input type="text" class="form-control" x-on:input="updateData(row - 1, 'participacion', $el.value)" required></td>
                                            </tr>
                                        </template>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4">
                                                <button type="button" class="btn btn-success" x-on:click="addRow">Añadir columna</button>
                                                <button type="button" class="btn btn-danger" x-on:click="deleteRow">Eliminar columna</button>
                                            </td>
                                            <td>
                                                <input type="hidden" name="tableKids" x-bind:value="JSON.stringify(data)">
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>

                                <script>
                                    document.addEventListener('alpine:init', () => {
                                        Alpine.data('table_kids', () => ({
                                            data: [{}],
                                            length: 1,

                                            addRow() {
                                                this.length += 1;
                                                this.data = [...this.data, {}];
                                            },
                                            deleteRow() {
                                                if (this.length == 0) return;

                                                this.length -= 1;
                                                this.data = this.data.slice(0, this.length);
                                            },

                                            updateData(row, parameter, value) {
                                                this.data[row][parameter] = value;
                                            },
                                        }));
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</body>
</html>
