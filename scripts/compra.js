
const formulario = document.querySelector('form');

formulario.addEventListener('submit', (e) => {
    e.preventDefault();

    const nombre = document.getElementById('nombre').value;
    const apellido = document.getElementById('apellido').value;
    const email = document.getElementById('email').value;
    const direccion = document.getElementById('direccion').value;
    const ciudad = document.getElementById('ciudad').value;
    const telefono = document.getElementById('telefono').value;

    if (nombre && apellido && email && direccion && ciudad && telefono) {
        alert('Gracias por su compra');
        formulario.submit();
    } else {
        alert('Por favor, complete todos los campos');
    }
});