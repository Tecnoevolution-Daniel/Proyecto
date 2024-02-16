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
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Día" id="fechaNacimientoDia" required>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Mes" id="fechaNacimientoMes" required>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Año" id="fechaNacimientoAnio" required>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="lugarNacimientoPais">Lugar de Nacimiento:</label>
                    <input type="text" class="form-control" placeholder="País" id="lugarNacimientoPais" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="lugarNacimientoCiudad">Ciudad:</label>
                    <input type="text" class="form-control" id="lugarNacimientoCiudad" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="lugarNacimientoDpto">Dpto:</label>
                    <input type="text" class="form-control" id="lugarNacimientoDpto" required>
                </div>
            </div>
            <div class="form-row">
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
            </div>
            <div class="form-row">
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
                <div class="form-group col-md-4">
                    <label for="profesional">Profesional:</label>
                    <input type="text" class="form-control" id="profesional" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="titulo">Título:</label>
                    <input type="text" class="form-control" id="titulo" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="institucionEducativa">Institución Educativa:</label>
                    <input type="text" class="form-control" id="institucionEducativa" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="fechaGrado">Fecha de Grado:</label>
                    <input type="text" class="form-control" id="fechaGrado" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="vehiculo">Vehículo:</label>
                    <input type="text" class="form-control" id="vehiculo" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="marca">Marca:</label>
                    <input type="text" class="form-control" id="marca" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="modelo">Modelo:</label>
                    <input type="text" class="form-control" id="modelo" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="anio">Año:</label>
                    <input type="text" class="form-control" id="anio" required>
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
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="tallaZapatos">Talla Zapatos:</label>
                    <input type="text" class="form-control" id="tallaZapatos" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="tallaCamisa">Talla Camisa:</label>
                    <input type="text" class="form-control" id="tallaCamisa" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="tallaPantalon">Talla Pantalón:</label>
                    <input type="text" class="form-control" id="tallaPantalon" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="grupoSanguineo">Grupo Sanguíneo:</label>
                    <input type="text" class="form-control" id="grupoSanguineo" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="rh">RH:</label>
                    <input type="text" class="form-control" id="rh" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="tieneViviendaPropia">Tiene Vivienda Propia:</label>
                    <input type="text" class="form-control" id="tieneViviendaPropia" required>
                </div>
            </div>
            <div class="form-row">
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
                    <label for="FondoPension"> Fondo de pensiones(AFP):</label>
                    <input type="text" class="form-control" id="FondoPension" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="FondoCesantias">Fondo de cesantias:</label>
                    <input type="email" class="form-control" id="FondoCesantias" required>
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
                                <td><input type="text" class="form-control" required></td>
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
                    <input type="text" class="form-control" id="fecha" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="firma">Firma:</label>
                    <input type="text" class="form-control" id="firma" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</body>
</html>
