<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Encabezado</title>
    <link rel="stylesheet" href="{{ asset('css/estilos_menu_materias.css') }}">
</head>
<body>
    <header class="header">
        <h1 class="title">Menú Administrativo</h1>
    </header>
    <div class="contenedor-card">
        <div class="card">
            <img src="img/iconos_0002_user.jpg" alt="Imagen de la Materia">
            <div class="card-content">
                <div class="card-title">Estudiantes</div>
                <button onclick="">ver</button>
            </div>
        </div>
        <div class="card">
            <img src="img/iconos_0001_users.jpg" alt="Imagen de la Materia">
            <div class="card-content">
                <div class="card-title">Docentes</div>
                <button onclick="window.location='{{ route('docentes.index') }}'">ver</button>
            </div>
        </div>
        <div class="card">
            <img src="img/iconos_0006_box-padding.jpg" alt="Imagen de la Materia">
            <div class="card-content">
                <div class="card-title">Especialidades</div>    
                <button onclick="window.location='{{ route('especialidades.index') }}'">ver</button>
            </div>
        </div>
        <div class="card">
            <img src="img/iconos_0000_users-group.jpg" alt="Imagen de la Materia">
            <div class="card-content">
                <div class="card-title">Secciones</div>
                <button onclick="window.location='{{ route('secciones.index') }}'">ver</button>
            </div>
        </div>
        <div class="card">
            <img src="img/iconos_0002_user.jpg" alt="Imagen de la Materia">
            <div class="card-content">
                <div class="card-title">Usuarios</div>
                <button onclick="">ver</button>
            </div>
        </div>
        <div class="card">
            <img src="img/iconos_0008_books.jpg" alt="Imagen de la Materia">
            <div class="card-content">
                <div class="card-title">Pensums</div>
                <button onclick="">ver</button>
            </div>
        </div>
        <div class="card">
            <img src="img/iconos_0009_book.jpg" alt="Imagen de la Materia">
            <div class="card-content">
                <div class="card-title">Materias</div>
                <button onclick="window.location='{{ route('asignaturas.index') }}'">ver</button>            </div>
        </div>
        <div class="card">
            <img src="img/iconos_0004_golf.jpg" alt="Imagen de la Materia">
            <div class="card-content">
                <div class="card-title">Asistencias</div>
                <button onclick="">ver</button>
            </div>
        </div>
        <div class="card">
            <img src="img/iconos_0000_users-group.jpg" alt="Imagen de la Materia">
            <div class="card-content">
                <div class="card-title">Grupos</div>
                <button onclick="window.location='{{ route('grupos.index') }}'">ver</button>
            </div>
        </div>
        <div class="card">
            <img src="img/iconos_0007_box-multiple-6.jpg" alt="Imagen de la Materia">
            <div class="card-content">
                <div class="card-title">Nivel</div>
                <button onclick="window.location='{{ route('niveles.index') }}'">ver</button>
            </div>
        </div>
        <div class="card">
            <img src="img/iconos_0000_users-group.jpg" alt="Imagen de la Materia">
            <div class="card-content">
                <div class="card-title">Grado</div>
                <button onclick="window.location='{{ route('grados.index') }}'">ver</button>
            </div>
        </div>
    </div>
</body>
</html>
