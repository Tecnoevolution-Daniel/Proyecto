<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos empleado</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <form>
            <legend>Datos del cliente</legend>
            <div class="card">
                    <div class="card-header">
                        Información de la Empresa
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
                                <label for="nombreRazonSocial">Nombre o Razón Social:</label>
                                <input type="text" class="form-control" id="nombreRazonSocial" name="nombreRazonSocial" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="nit">NIT:</label>
                                <input type="text" class="form-control" id="nit" name="nit" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tipoSociedad">Tipo de Sociedad:</label>
                                <select class="form-control" id="tipoSociedad" name="tipoSociedad" required>
                                    <option value="">Seleccione</option>
                                    <option value="unipersonal">Unipersonal</option>
                                    <option value="limitada">Limitada</option>
                                    <option value="colectiva">Colectiva</option>
                                    <option value="economía_Mixta">Economía Mixta</option>
                                    <option value="enComandita">En Comandita</option>
                                    <option value="anónima">Anónima</option>
                                    <option value="sas">SAS</option>
                                    <option value="fideicomisos">Fideicomisos</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
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
                                <label for="tamañoEmpresa">Tamaño:</label>
                                <select class="form-control" id="tamañoEmpresa" name="tamañoEmpresa" required>
                                    <option value="">Seleccione</option>
                                    <option value="microempresa">Microempresa</option>
                                    <option value="pequeña">Pequeña</option>
                                    <option value="mediana">Mediana</option>
                                    <option value="grande">Grande</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="fechaInicio">Fecha de inicio de actividades o constitucion(PJ):</label>
                                <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="experiencia">Experiencia en el mercado (Años)(PN,PJ):</label>
                                <input type="text" class="form-control" id="experiencia" name="experiencia" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="personaContacto"> Nombre persona contacto (PN o PJ):</label>
                                <input type="text" class="form-control" id="personaContacto" name="personaContacto" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="ocupacionContacto"> Ocupacion de la persona de contacto (PN o PJ)</label>
                                <input type="text" class="form-control" id="ocupacionContacto" name="ocupacionContacto" required>
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="nacionalidad"> Nacionalidad (PN):</label>
                                <input type="text" class="form-control" id="nacionalidad" name="nacionalidad" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="profesion"> Profesion (PN):</label>
                                <input type="text" class="form-control" id="profesion" name="profesion" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="ocupacionOficio"> Ocupacion u oficio (PN):</label>
                                <input type="text" class="form-control" id="ocupacionOficio" name="ocupacionOficio" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="proposito"> Proposito de la relacion legal o contractual:</label>
                                <input type="text" class="form-control" id="proposito" name="proposito" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="paginaWeb"> Pagina web (PN o PJ):</label>
                                <input type="text" class="form-control" id="paginaWeb" name="paginaWeb" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="informeEmail"> Envio de facturacion electronica (PN o PJ):</label>
                                <input type="text" class="form-control" id="informeEmail" name="informeEmail" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="correoContacto"> Correo electronico de contacto (PN o PJ):</label>
                                <input type="text" class="form-control" id="correoContacto" name="correoContacto" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="direccionDomicilio"> Direccion de la empresa o persona natural:</label>
                                <input type="text" class="form-control" id="direccionDomicilio" name="direccionDomicilio" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="ciudad"> Ciudad(PN o PJ):</label>
                                <input type="text" class="form-control" id="ciudad" name="ciudad" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="pais"> Pais (PN o PJ):</label>
                                <input type="text" class="form-control" id="pais" name="pais" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="telefonoFijo"> Telefono fijo (PN o PJ):</label>
                                <input type="text" class="form-control" id="telefonoFijo" name="telefonoFijo" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="numeroCelular"> Numero celular (PN o PJ):</label>
                                <input type="text" class="form-control" id="numeroCelular" name="numeroCelular" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="casa">Tiene casa matriz (PJ):</label>
                                <select class="form-control" id="casa" name="casa" required>
                                    <option value="">Seleccione</option>
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="nombreCasa"> Nombre de la casa matriz (PJ):</label>
                                <input type="text" class="form-control" id="nombreCasa" name="nombreCasa" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="direccionCasa"> Direccion domicilio de la casa matriz (PJ):</label>
                                <input type="text" class="form-control" id="direccionCasa" name="direccionCasa" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="paisPj"> Pais (PJ):</label>
                                <input type="text" class="form-control" id="paisPj" name="paisPj" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="ciudadPj"> Ciudad (PJ):</label>
                                <input type="text" class="form-control" id="ciudadPj" name="ciudadPj" required>
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

                            </div>
                            <div class="form-group col-md-4">

                            </div>
                            <div class="form-group col-md-4">

                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">

                            </div>
                            <div class="form-group col-md-4">

                            </div>
                            <div class="form-group col-md-4">

                            </div>
                        </div>














                    </div>
            </div>









        </form>
    </div>
</body>
</html>