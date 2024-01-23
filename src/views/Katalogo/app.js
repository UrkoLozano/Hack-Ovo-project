// Variable que mantiene el estado visible del carrito
var carritoVisible = false;

// Array para almacenar IDs de productos en el carrito
var carritoIds = [];

// Esperamos a que todos los elementos de la página carguen para ejecutar el script
$(document).ready(function () {
    // Agregamos funcionalidad a los botones eliminar del carrito
    $('.btn-eliminar').click(eliminarItemCarrito);

    // Agrego funcionalidad al botón sumar cantidad
    $('.sumar-cantidad').click(sumarCantidad);

    // Agrego funcionalidad al botón restar cantidad
    $('.restar-cantidad').click(restarCantidad);

    // Agregamos funcionalidad al botón Agregar al carrito
    $('.boton-item').click(agregarAlCarritoClicked);

    // Agregamos funcionalidad al botón comprar
    $('.btn-pagar').click(function(){
            window.location.href = "../gurisaldu.php";
    });

});

// Eliminamos todos los elementos del carrito y lo ocultamos
function pagarClicked() {

    // Elimino todos los elementos del carrito
    $('.carrito-items').empty();
    actualizarTotalCarrito();
    ocultarCarrito();

    // Limpiamos el array de IDs del carrito
    carritoIds = [];
}

// Función que controla el botón clickeado de agregar al carrito
function agregarAlCarritoClicked() {
    var item = $(this).closest('.item');
    var titulo = item.find('.titulo-item').text();
    var precio = item.find('.precio-item').text();
    var precioNum = parseFloat(precio.replace('.', ','));
    var modeloa = item.find('.modelo-item').text();
    var id = item.find('.id-item').text();
    var marka = item.find('.marka-item').text();

    // Verificamos si el ID ya está en el carritoIds
    if (carritoIds.includes(id)) {
        alert("El item ya se encuentra en el carrito");
        return;
    }

    // Agregamos el ID al array de IDs del carrito
    carritoIds.push(id);

    // Resto del código para agregar el artículo al carrito...
    agregarItemAlCarrito(titulo, precioNum, modeloa, id, marka);

    hacerVisibleCarrito();
}

// Función que hace visible el carrito
function hacerVisibleCarrito() {
    carritoVisible = true;
    var carrito = $('.carrito');
    carrito.css({
        'marginRight': '0',
        'opacity': '1'
    });

    var items = $('.contenedor-items');
    items.css('width', '60%');
}

// Función que agrega un item al carrito
function agregarItemAlCarrito(titulo, precioNum, modelo, id, marka) {
    // Controlamos que el item que intenta ingresar no se encuentre en el carrito
    var carritoItems = $('.carrito-item-id');

    for (var i = 0; i < carritoItems.length; i++) {
        if ($(carritoItems[i]).val() == id) {
            alert("El item ya se encuentra en el carrito");
            return; // Sale de la función si encuentra un duplicado
        }
    }

    var itemCarritoContenido = `
        <div class="carrito-item">
            <div class="carrito-item-detalles">
                <p class="carrito-item-modelo">${modelo}</p>
                <p class="carrito-item-marka">${marka}</p>
                <p class="carrito-item-titulo">${titulo}</p>
                <div class="selector-cantidad">
                    <i class="fa-solid fa-minus restar-cantidad"></i>
                    <input type="text" value="1" class="carrito-item-cantidad" disabled>
                    <i class="fa-solid fa-plus sumar-cantidad"></i>
                </div>
                <span class="carrito-item-precio">${precioNum}€</span>
            </div>
            <button class="btn-eliminar">
                <i class="fa-solid fa-trash"></i>
            </button>
        </div>`;

    $('.carrito-items').append(itemCarritoContenido);

    // Agregamos la funcionalidad eliminar al nuevo item
    $('.carrito-item:last .btn-eliminar').click(eliminarItemCarrito);

    // Agregamos la funcionalidad restar cantidad del nuevo item
    $('.carrito-item:last .restar-cantidad').click(restarCantidad);

    // Agregamos la funcionalidad sumar cantidad del nuevo item
    $('.carrito-item:last .sumar-cantidad').click(sumarCantidad);

    // Actualizamos total
    actualizarTotalCarrito();
}

// Aumento en uno la cantidad del elemento seleccionado
function sumarCantidad() {

    var cantidadActual = parseInt($(this).siblings('.carrito-item-cantidad').val());
    cantidadActual++; 

    // Actualizar la cantidad
    $(this).siblings('.carrito-item-cantidad').val(cantidadActual);

    // Actualizar el total
    actualizarTotalCarrito();
}

// Resto en uno la cantidad del elemento seleccionado
function restarCantidad() {
    var cantidadActual = parseInt($(this).siblings('.carrito-item-cantidad').val());
    cantidadActual--;
    if (cantidadActual >= 1) {
        $(this).siblings('.carrito-item-cantidad').val(cantidadActual);
        actualizarTotalCarrito();
    }
}

// Elimino el item seleccionado del carrito
function eliminarItemCarrito() {
    var carritoItem = $(this).closest('.carrito-item');
    var id = carritoItem.find('.id-item').text();

    console.log('ID a eliminar:', id);

    // Verificamos si el ID está presente en el array carritoIds antes de intentar eliminarlo
    if (carritoIds.includes(id)) {
        console.log('ID encontrado en carritoIds. Eliminando...');
        // Eliminamos el ID del array carritoIds
        var index = carritoIds.indexOf(id);
        carritoIds.splice(index, 1);
    } else {
        console.log('ID no encontrado en carritoIds.');
    }

    console.log('Nuevo array de carritoIds:', carritoIds);

    carritoItem.remove();
    // Actualizamos el total del carrito
    actualizarTotalCarrito();

    // La siguiente función controla si hay elementos en el carrito
    // Si no hay, eliminamos el carrito
    ocultarCarrito();
}

// Función que controla si hay elementos en el carrito. Si no hay, oculto el carrito.
function ocultarCarrito() {
    var carritoItems = $('.carrito-items');
    if (carritoItems.children().length == 0) {
        var carrito = $('.carrito');
        carrito.css({
            'marginRight': '-100%',
            'opacity': '0'
        });
        carritoVisible = false;

        var items = $('.contenedor-items');
        items.css('width', '100%');

        // Limpiamos el array de IDs del carrito
        carritoIds = [];
    }
}

// Actualizamos el total de Carrito
function actualizarTotalCarrito() {
    // Seleccionamos el contenedor carrito
    var carritoItems = $('.carrito-item');
    var total = 0;

    // Recorremos cada elemento del carrito para actualizar el total
    carritoItems.each(function () {
        var precioElemento = $(this).find('.carrito-item-precio');
        // Quitamos el símbolo peso y el punto de milesimos.
        var precio = parseFloat(precioElemento.text().replace('$', '').replace('.', ''));
        var cantidadItem = $(this).find('.carrito-item-cantidad');
        var cantidad = cantidadItem.val();
        total = total + (precio * cantidad);
    });

    total = Math.round(total * 100) / 100;
    $('.carrito-precio-total').text(total.toLocaleString("es") + "€");
}





