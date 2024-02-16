<?php
include 'Connection.php';

session_start();

if (isset($_SESSION['booleano']) && $_SESSION['booleano'] === true) {

    if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'cliente') {

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de la Empresa o Persona</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Información de la Empresa
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="Tipo_Solicitud">Tipo de solicitud:</label>
                            <select class="form-select" id="Tipo_Solicitud" name="Tipo_Solicitud" required>
                                <option value="">Seleccione</option>
                                <option value="Persona_Juridica">Persona jurídica</option>
                                <option value="Persona_Natural">Persona natural</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="Proceso">Proceso:</label>
                            <select class="form-select" id="Proceso" name="Proceso" required>
                                <option value="">Seleccione</option>
                                <option value="Creacion">Creación</option>
                                <option value="Actualizacion">Actualización</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="Fecha">Fecha:</label>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-select" id="Dia" name="Dia" placeholder="Día" required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-select" id="Mes" name="Mes" placeholder="Mes" required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-select" id="Año" name="Año" placeholder="Año" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card mt-4">
                    <div class="card-header">
                        Información Básica Persona Natural o Jurídica
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="NombreRazonSocial">Nombre o Razón Social:</label>
                            <input type="text" class="form-control" id="NombreRazonSocial" name="NombreRazonSocial" required>
                        </div>
                        <div class="mb-3">
                            <label for="NIT">NIT:</label>
                            <input type="text" class="form-control" id="NIT" name="NIT" required>
                        </div>
                        <div class="mb-3">
                            <label for="TipoSociedad">Tipo de Sociedad:</label>
                            <select class="form-control" id="TipoSociedad" name="TipoSociedad" required>
                                <option value="">Seleccione</option>
                                <option value="Unipersonal">Unipersonal</option>
                                <option value="Limitada">Limitada</option>
                                <option value="Colectiva">Colectiva</option>
                                <option value="Economía_Mixta">Economía Mixta</option>
                                <option value="En_Comandita">En Comandita</option>
                                <option value="Anónima">Anónima</option>
                                <option value="SAS">SAS</option>
                                <option value="Fideicomisos">Fideicomisos</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="TipoEmpresa">Tipo de Empresa:</label>
                            <select class="form-control" id="TipoEmpresa" name="TipoEmpresa" required>
                                <option value="">Seleccione</option>
                                <option value="Privada">Privada</option>
                                <option value="Pública">Pública</option>
                                <option value="Mixta">Mixta</option>
                                <option value="Entidad_Sin_Animo_Lucro">Entidad Sin Ánimo de Lucro</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="TamañoEmpresa">Tamaño:</label>
                            <select class="form-control" id="TamañoEmpresa" name="TamañoEmpresa" required>
                                <option value="">Seleccione</option>
                                <option value="Microempresa">Microempresa</option>
                                <option value="Pequeña">Pequeña</option>
                                <option value="Mediana">Mediana</option>
                                <option value="Grande">Grande</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="FechaInicio">Fecha de inicio de actividades o constitucion(PJ):</label>
                            <input type="text" class="form-control" id="FechaInicio" name="FechaInicio" required>
                        </div>
                        <div class="mb-3">
                            <label for="Experiencia">Experiencia en el mercado (Años)(PN,PJ):</label>
                            <input type="text" class="form-control" id="Experiencia" name="Experiencia" required>
                        </div>
                        <div class="mb-3">
                            <label for="PersonaContacto"> Nombre persona contacto (PN o PJ):</label>
                            <input type="text" class="form-control" id="PersonaContacto" name="PersonaContacto" required>
                        </div>
                        <div class="mb-3">
                            <label for="OcupacionContacto"> Cargo u ocupacion de la persona de contacto (PN o PJ)</label>
                            <input type="text" class="form-control" id="OcupacionContacto" name="OcupacionContacto" required>
                        </div>
                        <div class="mb-3">
                            <label for="Nacionalidad"> Nacionalidad (PN):</label>
                            <input type="text" class="form-control" id="Nacionalidad" name="Nacionalidad" required>
                        </div>
                        <div class="mb-3">
                            <label for="Profesion"> Profesion (PN):</label>
                            <input type="text" class="form-control" id="Profesion" name="Profesion" required>
                        </div>
                        <div class="mb-3">
                            <label for="Ocupacion_oficio"> Ocupacion u oficio (PN):</label>
                            <input type="text" class="form-control" id="Ocupacion_oficio" name="Ocupacion_oficio" required>
                        </div>
                        <div class="mb-3">
                            <label for="Proposito"> Proposito de la relacion legal o contractual:</label>
                            <input type="text" class="form-control" id="Proposito" name="Proposito" required>
                        </div>
                        <div class="mb-3">
                            <label for="Pagina_Web"> Pagina web (PN o PJ):</label>
                            <input type="text" class="form-control" id="Pagina_Web" name="Pagina_Web" required>
                        </div>
                        <div class="mb-3">
                            <label for="Informe_Email"> Informar email para envio de facturacion electronica (PN o PJ):</label>
                            <input type="text" class="form-control" id="Informe_Email" name="Informe_Email" required>
                        </div>
                        <div class="mb-3">
                            <label for="Correo_Contacto"> Correo electronico de contacto (PN o PJ):</label>
                            <input type="text" class="form-control" id="Correo_Contacto" name="Correo_Contacto" required>
                        </div>
                        <div class="mb-3">
                            <label for="Direccion_domicilio"> Direccion domicilio de la empresa o persona natural:</label>
                            <input type="text" class="form-control" id="Direccion_domicilio" name="Direccion_domicilio" required>
                        </div>
                        <div class="mb-3">
                            <label for="Ciudad"> Ciudad(PN o PJ):</label>
                            <input type="text" class="form-control" id="Ciudad" name="Ciudad" required>
                        </div>
                        <div class="mb-3">
                            <label for="Pais"> Pais (PN o PJ):</label>
                            <input type="text" class="form-control" id="Pais" name="Pais" required>
                        </div>
                        <div class="mb-3">
                            <label for="Telefono_fijo"> Telefono fijo (PN o PJ):</label>
                            <input type="text" class="form-control" id="Telefono_fijo" name="Telefono_fijo" required>
                        </div>
                        <div class="mb-3">
                            <label for="Numero_Celular"> Numero celular (PN o PJ):</label>
                            <input type="text" class="form-control" id="Numero_Celular" name="Numero_Celular" required>
                        </div>
                        <div class="mb-3">
                            <label for="Casa">Tiene casa matriz (PJ):</label>
                            <select class="form-select" id="Casa" name="Casa" required>
                                <option value="">Seleccione</option>
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="Nombre_Casa"> Nombre de la casa matriz (PJ):</label>
                            <input type="text" class="form-control" id="Nombre_Casa" name="Nombre_Casa" required>
                        </div>
                        <div class="mb-3">
                            <label for="Direccion_Casa"> Direccion domicilio de la casa matriz (PJ):</label>
                            <input type="text" class="form-control" id="Direccion_Casa" name="Direccion_Casa" required>
                        </div>
                        <div class="mb-3">
                            <label for="Pais_Pj"> Pais (PJ):</label>
                            <input type="text" class="form-control" id="Pais_Pj" name="Pais_Pj" required>
                        </div>
                        <div class="mb-3">
                            <label for="Ciudad_Pj"> Ciudad (PJ):</label>
                            <input type="text" class="form-control" id="Ciudad_Pj" name="Ciudad_Pj" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php

    } else {
        echo "<p>Usted no tiene permisos para ver esta sección<p>";

        if ($_SESSION['rol'] === 'proveedor'){
            echo "<meta http-equiv='refresh' content='3;url=Proveedores.php'>";
            exit;
        }
        if ($_SESSION['rol'] === 'empleado'){
            echo "<meta http-equiv='refresh' content='3;url=Empleados.php'>";
            exit;
        }
    }
} else {
    header("Location: Login.php");
    exit();
}

?>