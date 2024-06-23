<div class="container">
    <form>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mt-3">
                    <label for="iddocente">ID Docente</label>
                    <input type="text" name="iddocente" class="form-control" value="{{ old('iddocente', $docente->iddocente ?? '') }}" {{ isset($docente) ? 'readonly' : '' }} required>
                </div>
                <div class="form-group mt-3">
                    <label for="nombre">Nombre del Empleado</label>
                    <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $docente->nombre ?? '') }}" required>
                </div>
                <div class="form-group mt-3">
                    <label for="edad">Edad</label>
                    <input type="number" name="edad" class="form-control" value="{{ old('edad', $docente->edad ?? '') }}" required>
                </div>
                <div class="form-group mt-3">
                    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                    <input type="date" name="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento', $docente->fecha_nacimiento ?? '') }}" required>
                </div>
                <div class="form-group mt-3">
                    <label for="sexo">Sexo</label>
                    <select name="sexo" class="form-control">
                        <option value="M" {{ old('sexo', $docente->sexo ?? '') == 'M' ? 'selected' : '' }}>Masculino</option>
                        <option value="F" {{ old('sexo', $docente->sexo ?? '') == 'F' ? 'selected' : '' }}>Femenino</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="estado_civil">Estado Civil</label>
                    <input type="text" name="estado_civil" class="form-control" value="{{ old('estado_civil', $docente->estado_civil ?? '') }}" required>
                </div>
                <div class="form-group mt-3">
                    <label for="direccion">Dirección Particular</label>
                    <textarea name="direccion" class="form-control" required>{{ old('direccion', $docente->direccion ?? '') }}</textarea>
                </div>
                <div class="form-group mt-3">
                    <label for="telefono_fijo">Teléfono Fijo</label>
                    <input type="text" name="telefono_fijo" class="form-control" value="{{ old('telefono_fijo', $docente->telefono_fijo ?? '') }}">
                </div>
                <div class="form-group mt-3">
                    <label for="celular">Celular</label>
                    <input type="text" name="celular" class="form-control" value="{{ old('celular', $docente->celular ?? '') }}" required>
                </div>
                <div class="form-group mt-3">
                    <label for="celular_clase">Celular de Clase</label>
                    <input type="text" name="celular_clase" class="form-control" value="{{ old('celular_clase', $docente->celular_clase ?? '') }}">
                </div>
                <div class="form-group mt-3">
                    <label for="dui">DUI</label>
                    <input type="text" name="dui" class="form-control" value="{{ old('dui', $docente->dui ?? '') }}" required>
                </div>
                <div class="form-group mt-3">
                    <label for="nit">NIT</label>
                    <input type="text" name="nit" class="form-control" value="{{ old('nit', $docente->nit ?? '') }}" required>
                </div>
                <div class="form-group mt-3">
                    <label for="nip">NIP</label>
                    <input type="text" name="nip" class="form-control" value="{{ old('nip', $docente->nip ?? '') }}">
                </div>
                <div class="form-group mt-3">
                    <label for="nivel">Nivel</label>
                    <input type="text" name="nivel" class="form-control" value="{{ old('nivel', $docente->nivel ?? '') }}" required>
                </div>
                <div class="form-group mt-3">
                    <label for="categoria">Categoría</label>
                    <input type="text" name="categoria" class="form-control" value="{{ old('categoria', $docente->categoria ?? '') }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mt-3">
                    <label for="especialidad">Especialidad</label>
                    <input type="text" name="especialidad" class="form-control" value="{{ old('especialidad', $docente->especialidad ?? '') }}" required>
                </div>
                <div class="form-group mt-3">
                    <label for="fecha_graduacion">Fecha de Graduación</label>
                    <input type="date" name="fecha_graduacion" class="form-control" value="{{ old('fecha_graduacion', $docente->fecha_graduacion ?? '') }}" required>
                </div>
                <div class="form-group mt-3">
                    <label for="inpep">INPEP</label>
                    <input type="text" name="inpep" class="form-control" value="{{ old('inpep', $docente->inpep ?? '') }}">
                </div>
                <div class="form-group mt-3">
                    <label for="isss">ISSS</label>
                    <input type="text" name="isss" class="form-control" value="{{ old('isss', $docente->isss ?? '') }}">
                </div>
                <div class="form-group mt-3">
                    <label for="afp">AFP</label>
                    <input type="text" name="afp" class="form-control" value="{{ old('afp', $docente->afp ?? '') }}">
                </div>
                <div class="form-group mt-3">
                    <label for="nup">NUP</label>
                    <input type="text" name="nup" class="form-control" value="{{ old('nup', $docente->nup ?? '') }}">
                </div>
                <div class="form-group mt-3">
                    <label for="nacionalidad">Nacionalidad</label>
                    <input type="text" name="nacionalidad" class="form-control" value="{{ old('nacionalidad', $docente->nacionalidad ?? '') }}" required>
                </div>
                <div class="form-group mt-3">
                    <label for="pasaporte">Número de Pasaporte</label>
                    <input type="text" name="pasaporte" class="form-control" value="{{ old('pasaporte', $docente->pasaporte ?? '') }}">
                </div>
                <div class="form-group mt-3">
                    <label for="otros_cargos">Otros Cargos que Desempeña</label>
                    <input type="text" name="otros_cargos" class="form-control" value="{{ old('otros_cargos', $docente->otros_cargos ?? '') }}">
                </div>
                <div class="form-group mt-3">
                    <label for="lugar">Lugar</label>
                    <input type="text" name="lugar" class="form-control" value="{{ old('lugar', $docente->lugar ?? '') }}">
                </div>
                <div class="form-group mt-3">
                    <label for="otra_institucion">Otra Institución donde Trabaja</label>
                    <input type="text" name="otra_institucion" class="form-control" value="{{ old('otra_institucion', $docente->otra_institucion ?? '') }}">
                </div>
                <div class="form-group mt-3">
                    <label for="telefono_otrainstitucion">Número de Teléfono</label>
                    <input type="text" name="telefono_otrainstitucion" class="form-control" value="{{ old('telefono_otrainstitucion', $docente->telefono_otrainstitucion ?? '') }}">
                </div>
                <div class="form-group mt-3">
                    <label for="turno">Turno</label>
                    <input type="text" name="turno" class="form-control" value="{{ old('turno', $docente->turno ?? '') }}">
                </div>
                <div class="form-group mt-3">
                    <label for="idseccion">ID Sección</label>
                    <input type="text" name="idseccion" class="form-control" value="{{ old('idseccion', $docente->idseccion ?? '') }}">
                </div>
                <div class="form-group mt-3">
                    <label for="idpersonal">ID Personal</label>
                    <input type="number" name="idpersonal" class="form-control" value="{{ old('idpersonal', $docente->idpersonal ?? '') }}" required>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Guardar</button>
    </form>
</div>
