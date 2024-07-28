const carritoBoton = document.querySelector('.carrito-boton');
const carritoFondo = document.querySelector('.carrito-fondo');
const carritoMenuPrin = document.querySelector('.volver');
let carritoVisible = false;

carritoBoton.addEventListener("click", () => {
    carritoVisible = !carritoVisible;
    if (carritoVisible) {
        carritoFondo.style.visibility = "visible";
    } else {
        carritoFondo.style.visibility = "hidden";
    }
});

carritoMenuPrin.addEventListener("click", () => {
    carritoVisible = !carritoVisible;
    if (carritoVisible) {
        carritoFondo.style.visibility = "visible";
    } else {
        carritoFondo.style.visibility = "hidden";
    }
});

///////////////////////////Botones Quitar//////////////////////////////

const botonesQuitar = document.getElementsByClassName("boton-quitar");

Array.from(botonesQuitar).forEach((boton) => {

    boton.addEventListener("click", removerProducto);
});

function removerProducto(evento){
    evento.target.parentElement.remove();
    actualizarTotal();
}

////////////////////////////////Actualizar Total///////////////////////
function actualizarTotal(){
    const precios = document.querySelectorAll('.renglon .precio');
    const total = document.querySelector('.precio-total');
    let sumaTotal = 0;
    Array.from(precios).forEach((precio) => {
        sumaTotal += parseFloat(precio.innerHTML.substring(1));
    });
    total.innerHTML = "$" + sumaTotal.toFixed(2);
}

actualizarTotal();

/////////////////////////Botones Agregar Postre//////////////
const botonesAgregar = document.querySelectorAll('.producto-tarjeta .boton');
Array.from(botonesAgregar).forEach((boton)=>{
    boton.addEventListener('click', evento=>{
        let nombre = evento.target.parentElement.querySelector('.nombre');
        let precio = evento.target.parentElement.querySelector('.precio');

        agregarAlCarrito(nombre.innerHTML, precio.innerHTML);
    });
});

function agregarAlCarrito(nombre, precio){
    const productos = document.querySelector('.producto');
    let renglon = document.createElement('div');

    renglon.classList.add('renglon');
    renglon.innerHTML = 
    `<p class="nombre">${nombre}</p>
    <p class="precio">$${precio}</p>
    <button class="boton-quitar">Remover</button>`;

const boton = renglon.querySelector('.boton-quitar');
boton.addEventListener('click', removerProducto);


    productos.append(renglon);
    alert('Producto agregado al carrito!!.');
}