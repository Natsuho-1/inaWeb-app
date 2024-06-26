function permitirSoloNumeros(event) {
    var charCode = event.charCode;

    // Si el charCode no está en el rango de los dígitos (0-9), impedir el ingreso
    if (charCode < 48 || charCode > 57) {
        event.preventDefault();
    }
}
function calcularEdad() {
    // Obtener la fecha de nacimiento ingresada por el usuario
    var fechaNacimiento = document.getElementById('fechanacimiento').value;
    
    // Calcular la edad
    var hoy = new Date();
    var fechaNacimientoDate = new Date(fechaNacimiento);
    var edad = hoy.getFullYear() - fechaNacimientoDate.getFullYear();
    
    // Ajustar la edad si el cumpleaños aún no ha pasado este año
    var mes = hoy.getMonth() - fechaNacimientoDate.getMonth();
    if (mes < 0 || (mes === 0 && hoy.getDate() < fechaNacimientoDate.getDate())) {
        edad--;
    }
    
    // Mostrar la edad calculada en el campo de texto
    document.getElementById('edad').value = edad;
}
