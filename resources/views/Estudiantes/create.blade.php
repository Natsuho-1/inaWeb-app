@extends('layouts.Estudiantes')

@section('title', 'Agregar Estudiante')

@section('content')
<style>
    .opcional{
        color: red;
      }
      .subti{
        font-weight: bold;
      }
</style>
<div class="Busqueda"></div>
    <form action="">
        <div class="container">
            <h5>DATOS PERSONALES DEL ESTUDIANTE</h5>
            <div class="row">
              <div class="col-4">
                <div class="form-group">
                    <label for="nietext">NIE</label>
                    <input type="text" class="form-control" id="nietext" aria-describedby="IngresarNIE" placeholder="########">
                    <small id="IngresarNIE" class="form-text text-muted">Ingresar NIE.</small>
                  </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                    <label for="carnettext">Carnet de Menoridad (Si posee)<span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="carnettext" aria-describedby="IngresarCARNET" placeholder="Ingresar Carnet">
                    <small id="IngresarCARNET" class="form-text text-muted">Ingresar Carnet de Menoridad.</small>
                  </div>
              </div>
            </div>
          </div>
          <br>
          <div class="container">
            <div class="row">
              <div class="col-8">
                <div class="form-group">
                    <label for="nombrestext">Nombres</label>
                    <input type="text" class="form-control" id="nombrestext" aria-describedby="IngresarNOMBRE" placeholder="Ingresar Nombres">
                  </div>
              </div>
            </div>
          </div>
          <br>
          <div class="container">
            <div class="row">
              <div class="col-8">
                <div class="form-group">
                    <label for="apellidostext">Apellidos</label>
                    <input type="text" class="form-control" id="apellidostext" aria-describedby="IngresarAPELLIDOS" placeholder="Ingresar Apellidos">
                  </div>
              </div>
            </div>
          </div>
          <br>
          <div class="container">
            <div class="row">
              <div class="col-sm">
                <div class="form-group">
                    <label for="fechaNacimientotext">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="fechaNacimientotext" aria-describedby="IngresarFECHA">
                  </div>
              </div>
              <div class="col-sm">
                <div class="form-group">
                    <label for="edadtext">Edad</label>
                    <input type="number" class="form-control" id="edadtext" aria-describedby="IngresarEDAD" placeholder="Ingresar Edad">
                  </div>
              </div>
              <div class="col-sm">
                <div class="form-group">
                    <label for="duitext">DUI (Si es mayor de 18 años)<span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="duitext" aria-describedby="IngresarDUI" placeholder="########-#">
                  </div>
              </div>
            </div>
          </div>
          <br>
          <div class="container">
            <div class="row">
              <div class="col-sm">
                <div class="form-group">
                    <label for="teltext">Telefono Fijo <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="teltext" aria-describedby="Ingresartel" placeholder="####-####">
                  </div>
              </div>
              <div class="col-sm">
                <div class="form-group">
                    <label for="tel2text">Telefono Movil <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="tel2text" aria-describedby="Ingresartel2" placeholder="####-####">
                  </div>
              </div>
              <div class="col-sm">
                <div class="form-group">
                    <label for="tel3text">Otro Telefono <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="tel3text" aria-describedby="Ingresartel3" placeholder="####-####">
                  </div>
              </div>
            </div>
          </div>
          <br>
          <div class="container">
            <div class="row">
              <div class="col-4">
                <div class="form-group">
                    <label for="correotext">Correo Personal <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="correotext" aria-describedby="Ingresarcorreo" placeholder="Ingresar correo">
                  </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                    <label for="correo2text">Correo Institucional <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="correo2text" aria-describedby="Ingresarcorreo2" placeholder="Ingresar Correo Institucional">
                  </div>
              </div>
            </div>
          </div>
          <br>
          <div class="container">
            <div class="row">
              <div class="col-4">
                <div class="form-group">
                  <br>
                    <label for="correotext">Sexo:</label>
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                      Masculino
                    </label>
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                      Femenino
                    </label>
                  </div>
              </div>
              <div class="col-8">
                <div class="form-group">
                    <label for="correo2text">Direccion <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="correo2text" aria-describedby="Ingresarcorreo2" placeholder="Ingresar Correo Institucional">
                  </div>
              </div>
            </div>
          </div>
          <br>
          <div class="container">
            <div class="row">
              <div class="col-sm">
                <div class="form-group">
                    <label for="nacionalidadtext">Nacionalidad <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="nacionalidadtext" aria-describedby="Ingresarnacionalidad" placeholder="Ingresar Nacionalidad">
                  </div>
              </div>
              <div class="col-sm">
                <div class="form-group">
                    <label for="departamentotext">Departamento <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="departamentotext" aria-describedby="Ingresardepartamento" placeholder="Ingresar Departamento">
                  </div>
              </div>
              <div class="col-sm">
                <div class="form-group">
                    <label for="Municipiotext">Municipio <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="Municipiotext" aria-describedby="Ingresarmunicipio" placeholder="Ingresar Municipio">
                  </div>
              </div>
            </div>
          </div>
          <br>
          <div class="container">
            <div class="row">
              <div class="col-4">
                <div class="form-group">
                    <label for="distritotext">Distrito <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="distritotext" aria-describedby="Ingresardistrito" placeholder="Ingresar distrito">
                  </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                    <label for="estadociviltext">Estado Civil <span class="opcional">*</span></label>
                    <input type="text" class="form-control" id="estadociviltext" aria-describedby="Ingresarestadocivil" placeholder="Ingresar Estado Civil">
                  </div>
              </div>
            </div>
          </div>
          <br>
          <div class="container">
            <h5>INOFRMACIÓN ACADÉMICA DEL ASPIRANTE</h5>
            <div class="row">
              <div class="col-4">
                <div class="form-group">
                    <label class="subti" for="correotext">Nivel al que aspira</label><br>
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                      PRIMERO
                    </label>
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                      SEGUNDO
                    </label>
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                      TERCERO
                    </label>
                  </div>
                  <span class="opcional">debemos generar la gestion de niveles para llenar esto</span>
                </div>
              </div>
          </div>
          <br>
          <div class="container">
            <div class="row">
              <div class="col-4">
                <div class="form-group">
                    <label class="subti" for="correotext">Especialidad a la que aspira</label><br>
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                      1
                    </label>
                    <br>
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                      2
                    </label>
                    <br>
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                      3
                    </label>
                    <br>
                  </div>
                  <span class="opcional">debemos generar la gestion de Especialidades para esta parte para llenar esto</span>
                </div>
              </div>
          </div>
    </form>
@endsection