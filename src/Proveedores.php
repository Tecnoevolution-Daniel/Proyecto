<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos proveedor</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <form action="Proveedores.php" method="post">
            <legend>Datos del proveedor</legend>
            <div class="card">
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
                                    <option value="economía_Mixta">Economía Mixta</option>
                                    <option value="enComandita">En Comandita</option>
                                    <option value="anónima">Anónima</option>
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
                                <label for="numeroCelular"> Telefono:</label>
                                <input type="text" class="form-control" id="numeroCelular" name="numeroCelular" required>
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
                                <label for="cargoContacto"> Ocupacion de la persona de contacto</label>
                                <input type="text" class="form-control" id="cargoContacto" name="cargoContacto" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="telefonoContacto"> Celular persona de contacto:</label>
                                <input type="text" class="form-control" id="telefonoContacto" name="telefonoContacto" required>
                            </div>
                        </div>
                        <div class="form-row">  
                            <div class="form-group col-md-4">
                                <label for="correoContacto"> Correo electronico de contacto:</label>
                                <input type="text" class="form-control" id="correoContacto" name="correoContacto" required>
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
                                    <option selected disabled value="">Selecciona...</option>
                                    <option>Cedula de ciudadania</option>
                                    <option>Cedula de extranjeria</option>
                                    <option>Pasaporte</option>
                                    <option>Otro</option>
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
                                <label for="profesion">Profesion:</label>
                                <input type="text" class="form-control" id="profesion" name="profesion" required>
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
                                    <option>Gran contribuyente</option>
                                    <option>Autorretenedor</option>
                                    <option>Regimen comun</option>
                                    <option>Regimen simplificado</option>
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
                                <label for="operacionMoneda">¿Cuál(es) de las siguientes operaciones realiza en moneda extranjera:</label>
                                <select id="operacionMoneda" class="form-control" name="operacionMoneda" required>
                                    <option selected disabled value="">Selecciona...</option>
                                    <option>Importacion</option>
                                    <option>Exportacion</option>
                                    <option>Pago de servicios</option>
                                    <option>Prestamos</option>
                                    <option>Inversiones</option>
                                    <option>Otra</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="otra"> Si su respuesta anterior fue (otra), especifique cual operacion hace?       </label>
                                <input type="text" class="form-control" id="otra" name="otra" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="cuentaMonedaExtranjera">¿Cómo persona natural o jurídica posee cuentas en moneda extranjera en países diferentes al domicilio de la empresa o persona natural?</label>
                                <select id="cuentaMonedaExtranjera" class="form-control" name="cuentaMonedaExtranjera" required>
                                    <option selected disabled value="">Selecciona...</option>
                                    <option>Si</option>
                                    <option>No</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <h6>Si su respuesta anterior fue si, porfavor llena la siguente tabla</h6>
                                <table x-data="table_kids" class="table table-striped">
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
                                                <td><input type="text" class="form-control" x-on:input="updateData(row - 1, 'tipoProducto', $el.value)" required></td>
                                                <td><input type="text" class="form-control" x-on:input="updateData(row - 1, 'tipoMoneda', $el.value)" required></td>
                                                <td><input type="text" class="form-control" x-on:input="updateData(row - 1, 'nombreEntidad', $el.value)" required></td>
                                                <td><input type="text" class="form-control" x-on:input="updateData(row - 1, 'numeroCuenta', $el.value)" required></td>
                                                <td><input type="text" class="form-control" x-on:input="updateData(row - 1, 'pais', $el.value)" required></td>
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
                        
                        <div class="form-row">    
                            <div class="form-group col-md-8">
                                <label for="activosVirtuales">¿Cómo persona natural o jurídica posee activos virtuales?</label>
                                <select id="activosVirtuales" class="form-control" name="activosVirtuales" required>
                                    <option selected disabled value="">Selecciona...</option>
                                    <option>Si</option>
                                    <option>No</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <h6>Si su respuesta anterior fue si, porfavor llena la siguente tabla</h6>
                                <table x-data="table_kids" class="table table-striped">
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
                                                <td><input type="text" class="form-control" x-on:input="updateData(row - 1, 'tipoProducto', $el.value)" required></td>
                                                <td><input type="text" class="form-control" x-on:input="updateData(row - 1, 'tipoMoneda', $el.value)" required></td>
                                                <td><input type="text" class="form-control" x-on:input="updateData(row - 1, 'nombreEntidad', $el.value)" required></td>
                                                <td><input type="text" class="form-control" x-on:input="updateData(row - 1, 'numeroCuenta', $el.value)" required></td>
                                                <td><input type="text" class="form-control" x-on:input="updateData(row - 1, 'pais', $el.value)" required></td>
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
                            <label for="ingreso"> Ingreso totales anual</label>
                            <input type="text" class="form-control" id="ingreso" name="ingreso" required>
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
                                                <td><input type="text" class="form-control" x-on:input="updateData(row - 1, 'pais', $el.value)" required></td>
                                                <td><input type="text" class="form-control" x-on:input="updateData(row - 1, 'nacionalidad', $el.value)" required></td>
                                                <td>
                                                    <select class="form-control" x-on:change="updateData(row - 1, 'tipoDocumento', $el.value)" required>
                                                        <option value="" disabled selected>Selecciona...</option>
                                                        <option value="TI">T.I</option>
                                                        <option value="CC">C.C</option>
                                                        <option value="NIT">NIT</option>
                                                        <option value="CE">C.E</option>
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