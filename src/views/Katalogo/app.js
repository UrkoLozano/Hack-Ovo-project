// Variable que mantiene el estado visible del carrito
var carritoVisible = false;

// Array para almacenar IDs de productos en el carrito
var carritoIds = [];

// Esperamos a que todos los elementos de la página carguen para ejecutar el script
$(document).ready(function () {

    // Agregamos funcionalidad a los botones eliminar del carrito
    $('.btn-eliminar').click(eliminarItemCarrito);

    if($("#carritoVal").val() != "" && $("#carritoVal").val() != undefined){
        //TODO: URKO IKUSTEKO AER ONDO DABILEN
        var carritoIds = [];
        var carritoIdsString = $("#carritoVal").val();

        if (carritoIdsString) {
            var carritoIds = carritoIdsString.split(",");
        } else {
            console.log("carritoIdsString no está definida o es undefined");
        }
        console.log(carritoIds);
        hacerVisibleCarrito();
    }
 
    $(".btn-eliminar").on("click", function() {            
        quitarCosasDeSession(this);
    });

    // Agrego funcionalidad al botón sumar cantidad
    $('.sumar-cantidad').click(function () {
        sumarCantidad(this);
        guardarNumeroEnSession(this);
    });

    // Agrego funcionalidad al botón restar cantidad
    $('.restar-cantidad').click(function () {
        restarCantidad(this);
        guardarNumeroEnSession(this);
    });

    // Agregamos funcionalidad al botón Agregar al carrito
    $('.boton-item').click(
        function () {
            agregarAlCarritoClicked(this);
            guardarInfoCarritoEnSession(this);
        });

    // Agregamos funcionalidad al botón comprar
    $('.btn-pagar').click(function () {
        window.location.href = "../gurisaldu.php";
    });

    $('.ordaindubtn').click(function () {
        window.location.href = "../Ordaindu/Ordaindu.php";
    });
    
    $(".submit-btn").click(function(e){
        //TODO: Konprobatu ea datuak sartuta dauden

        //Ajax dei bat egin informazio guztiarekin
        e.preventDefault();

        $("#ordaindu1").css("display", "none");
        $("#ordaindu2").css("display", "block");
        alert("hona dator");

        //codigoAlPagar();
    });

});

function guardarInfoCarritoEnSession(elem) {
    //Bidali nahi den informazioa LORTU
    var item = $(elem).closest('.item');
    var kantitatea = item.find('.id-elim').text();
    var id = item.find('.id-item').text();
    var titulo = item.find('p.titulo-item').text(); 
    var marka = item.find('.marka-item').text();
    var modeloa = item.find('p.modelo-item').text();
    var precio = item.find('.precio-item').text();
    var precioNum = parseFloat(precio.replace('.', ','));
    alert(precio);

    $.ajax({
            url: "post.php",
            type: 'POST',
            data: {
                action: "addInCart",
                indizea: "cart",
                titulua: titulo,
                modelo: modeloa,
                marca: marka,
                precioZenb: precioNum,
                prezioa: precio,
                id: id,
                kantitatea: kantitatea
            }
        })
        .done(function (itzultzenDuena) {
            alert(itzultzenDuena);
        })
        .fail(function () {})
        .always(function () {});

}

function guardarNumeroEnSession(elem) {
    console.log($(elem).siblings());
    var cantidadActual = parseInt($(elem).siblings('.carrito-item-cantidad').val());
    var idActual = parseInt($(elem).siblings('p.carrito-item-id').text());
    $.ajax({
        url: "post.php",
        type: 'POST',
        data: {
            action: "changeNumberInCart",
            indizea: "cart",
            id: idActual,
            zenbatekoa: cantidadActual
        }
    })
    .done(function (itzultzenDuena) {
        alert(itzultzenDuena);
    })
    .fail(function () {})
    .always(function () {});

}

function quitarCosasDeSession(elem){

    var item = $(elem).closest('.item');
    var id = item.find('.id-elim').text();
    

    $.ajax({
            url: "post.php",
            type: 'POST',
            data: {
                action: "removeFromCart",
                itemId: id,
            }
        })
        .done(function (response) {
            alert("Se ha eliminado correctamente");
        })
        .fail(function () {ç
            alert("Error al eliminar elemento");
        })
}

function codigoAlPagar(){

        // Serializa los datos del formulario
        var formData = $(this).serialize();

        // Realiza la solicitud AJAX
        $.ajax({
            type: "POST",
            url: "Ordaindu.php", // Reemplaza esto con la ruta correcta a tu archivo PHP
            data: formData,
            dataType: "json",
            success: function(response) {
                //TODO: ERAKUTSI EDO EZKUTATU PANTAILAK

                // Maneja la respuesta del servidor
                if (response.code == "200") {
                    // Si la respuesta es exitosa, muestra el mensaje de éxito
                    alert("Zuzenki gehitu da: " + response.message);
                } else {
                    // Si la respuesta indica un error, muestra el mensaje de error
                    alert("Error: " + response.message);
                }
            },
            error: function(xhr, status, error) {
                // Maneja los errores de la solicitud AJAX
                alert("Error al procesar la solicitud AJAX: " + error);
            }
        });
}


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
function agregarAlCarritoClicked(elem) {

    var item = $(elem).closest('.item');
    var titulo = item.find('.titulo-item').text();
    var precio = item.find('.precio-item').text();
    var precioNum = parseFloat(precio.replace('.', ','));
    var modeloa = item.find('.modelo-item').text();
    var id = item.find('.id-item').text();
    alert(id);
    var marka = item.find('.marka-item').text();

    // Verificamos si el ID ya está en el carritoIds
    if (carritoIds.includes(id)) {
        return "";
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
                    <p class="carrito-item-id hidden">${id}</p>
                    <i class="fa-solid fa-plus sumar-cantidad"></i>
                </div>
                <p hidden class='id-elim'>${id}</p> 
                <span class="carrito-item-precio">${precioNum}€</span>
            </div>
            <button class="btn-eliminar">
                <i class="fa-solid fa-trash"></i>
            </button>
        </div>`;

    $('.carrito-items').append(itemCarritoContenido);

    $('.carrito-item:last .btn-eliminar').click(eliminarItemCarrito);

    $('.carrito-item:last .restar-cantidad').click(function () {
        restarCantidad(this);
        guardarNumeroEnSession(this);
    });

    $('.carrito-item:last .sumar-cantidad').click(function () {
        sumarCantidad(this);
        guardarNumeroEnSession(this);
    });

    actualizarTotalCarrito();
}

function sumarCantidad(elem) {

    var cantidadActual = parseInt($(elem).siblings('.carrito-item-cantidad').val());
    cantidadActual++;

    $(elem).siblings('.carrito-item-cantidad').val(cantidadActual);

    actualizarTotalCarrito();
}

function restarCantidad(elem) {
    var cantidadActual = parseInt($(elem).siblings('.carrito-item-cantidad').val());
    cantidadActual--;
    if (cantidadActual >= 1) {
        $(elem).siblings('.carrito-item-cantidad').val(cantidadActual);
        actualizarTotalCarrito();
    }
}

function eliminarItemCarrito() {

    var carritoItem = $(this).closest('.carrito-item');
    console.log(carritoItem);
    var id = carritoItem.find('.id-elim').text();


    console.log(id);
    console.log(carritoIds);
    console.log(id);

    var index = carritoIds.indexOf(id);
    console.log(index);
    carritoIds.splice(index, 1);

    carritoItem.remove();
    console.log(carritoIds);

    actualizarTotalCarrito();

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