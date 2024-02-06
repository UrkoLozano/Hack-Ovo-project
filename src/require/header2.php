<?php



$KARPETA_DIR = "/VisualStudios/Hack-OVO";
define('APP_DIR', $_SERVER['DOCUMENT_ROOT'] . $KARPETA_DIR);
require_once(APP_DIR . "/src/require/layoutTop.php");
?>

<style>
    .list-favorites {

        width: 360px;
        height: 80%;
        overflow-y: auto;
        border: 1px solid #ccc;

    }

    .menu-header button {

        border: none;
        background: none;
        outline: none;
        width: 45px;
        height: 45px;
        color: #fff;
        font-size: 22px;
        position: relative;
        cursor: pointer;
    }

    .menu-header button:hover {
        transform: scale(1.05);
    }

    .counter-favorite {
        font-size: 10px;
        position: absolute;
        background-color: orange;
        color: #000;
        font-weight: 700;
        width: 20px;
        height: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        bottom: 0;
        right: 0;
        border-radius: 50%;
    }



    .container-buttons-card button {
        border: none;
        background: none;
        outline: none;
        cursor: pointer;
        box-shadow: 0px 0px 15px #00000025;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        font-size: 18px;
    }

    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600&family=Titillium+Web:wght@200;300;400;600;700&display=swap');

    * {
        margin: 0;
        padding: 0;
    }

    div.header {
        display: grid;
        grid-template-columns: 1fr 4fr 1fr;
        background-color: #000;
    }

    div.header h1 {
        text-align: center;
        font-size: 35px;
        /* background-color: #000; */
        color: #fff;
        padding: 30px 0;
    }

    .contenedor {
        max-width: 1200px;
        padding: 10px;
        margin: auto;
        display: flex;
        justify-content: space-between;
        flex-direction: row;
        /* Añade esta línea */
        /* oculto lo que queda fuera del .contenedor */
        contain: paint;
    }

    /* SECCION CONTENEDOR DE ITEMS */
    .contenedor .contenedor-items {
        margin-top: 30px;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        grid-gap: 30px;
        grid-row-gap: 30px;
        /* width: 60%; */
        width: 100%;
        transition: .3s;
    }

    .contenedor .contenedor-items .item {
        max-width: 200px;
        margin: auto;
        border: 1px solid #666;
        border-radius: 10px;
        padding: 20px;
        transition: .3s;
    }

    .contenedor .contenedor-items .item .img-item {
        width: 100%;
    }

    .img-item {
        width: 200px;
        /* Ancho deseado */
        height: 150px;
        /* Altura deseada */
        overflow: hidden;
        /* Oculta partes de las imágenes que excedan las dimensiones */
    }

    .img-item img {
        width: 100%;
        height: auto;
    }

    .contenedor .contenedor-items .item:hover {
        box-shadow: 0 0 10px #666;
        scale: 1.05;
    }

    .contenedor .contenedor-items .item .titulo-item {
        display: block;
        font-weight: bold;
        text-align: center;
        text-transform: uppercase;
    }

    .contenedor .contenedor-items .item .precio-item {
        display: block;
        text-align: center;
        font-weight: bold;
        font-size: 22px;
    }

    .contenedor .contenedor-items .item .boton-item {
        display: block;
        margin: 10px auto;
        border: none;
        background-color: black;
        color: #fff;
        padding: 5px 15px;
        border-radius: 5px;
        cursor: pointer;
    }

    .carrito {
        border: 1px solid #666;
        width: 35%;
        height: 40%;
        margin-top: 20px;
        border-radius: 10px;
        overflow-y: auto;
        max-height: 80vh;
        position: fixed;
        top: 310px;
        /* Ajusta la distancia desde la parte superior, considerando el header de 300px */
        right: 20px;
        transition: .3s;
        opacity: 0;
    }


    .carrito .header-carrito {
        background-color: #000;
        color: #fff;
        text-align: center;
        padding: 30px 0;
    }

    .carrito .carrito-item {
        display: flex;
        align-items: center;
        /* justify-content: space-between; */
        position: relative;
        border-bottom: 1px solid #666;
        padding: 20px;
    }

    .carrito .carrito-item img {
        margin-right: 20px;
    }

    .carrito .carrito-item .carrito-item-titulo {
        display: block;
        font-weight: bold;
        margin-bottom: 10px;
        text-transform: uppercase;
    }

    .carrito .carrito-item .selector-cantidad {
        display: inline-block;
        margin-right: 25px;
    }

    .carrito .carrito-item .carrito-item-cantidad {
        border: none;
        font-size: 18px;
        background-color: transparent;
        display: inline-block;
        width: 30px;
        padding: 5px;
        text-align: center;
    }

    .carrito .carrito-item .selector-cantidad i {
        font-size: 18px;
        width: 32px;
        height: 32px;
        line-height: 32px;
        text-align: center;
        border-radius: 50%;
        border: 1px solid #000;
        cursor: pointer;
    }

    .carrito .carrito-item .carrito-item-precio {
        font-weight: bold;
        display: inline-block;
        font-size: 18px;
        margin-bottom: 5px;
    }

    .carrito .carrito-item .btn-eliminar {
        position: absolute;
        right: 15px;
        top: 15px;
        color: #000;
        font-size: 20px;
        width: 40px;
        height: 40px;
        line-height: 40px;
        text-align: center;
        border-radius: 50%;
        border: 1px solid #000;
        cursor: pointer;
        display: block;
        background: transparent;
        z-index: 20;
    }

    .carrito .carrito-item .btn-eliminar i {
        pointer-events: none;
    }

    .carrito-total {
        background-color: #f3f3f3;
        padding: 30px;
    }

    .carrito-total .fila {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 22px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .carrito-total .btn-pagar {
        display: block;
        width: 100%;
        border: none;
        background: #000;
        color: #fff;
        border-radius: 5px;
        font-size: 18px;
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        cursor: pointer;
        transition: .3s;
    }

    .carrito-total .btn-pagar:hover {
        scale: 1.05;
    }

    /* SECCION RESPONSIVE */
    @media screen and (max-width: 850px) {
        .contenedor {
            display: block;
        }

        .contenedor-items {
            width: 100% !important;
        }

        .carrito {
            width: 100%;
        }
    }





    div.header a {
        text-decoration: none;
        font-size: 30px;
        color: #fff;
    }

    .p15 {
        padding: 15px;
    }

    .menu-header button {
        border: none;
        background: none;
        outline: none;
        width: 45px;
        height: 45px;
        color: #fff;
        font-size: 22px;
        position: relative;
        cursor: pointer;
        float: right;
    }

    .menu-header button:hover {
        transform: scale(1.05);
    }

    .counter-favorite,
    .counter-cart {
        font-size: 10px;
        position: absolute;
        background-color: orange;
        color: #000;
        font-weight: 700;
        width: 20px;
        height: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        bottom: 0;
        right: 0;
        border-radius: 50%;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .container-products {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        margin: 30px 0;
        gap: 30px;
    }

    .card-product {
        display: flex;
        flex-direction: column;
        gap: 20px;
        cursor: pointer;
    }

    .content-card-product {
        display: flex;
        flex-direction: column;
        gap: 15px;
        padding: 10px 25px;
    }

    .container-img {
        height: 200px;
        border-radius: 12px;
        overflow: hidden;
    }

    .container-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .footer-card-product {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0px;
    }

    .price {
        font-weight: 700;
        font-size: 24px;
        color: #555;
    }

    .container-buttons-card {
        display: flex;
        gap: 20px;
    }

    .container-buttons-card button {
        border: none;
        background: none;
        outline: none;
        cursor: pointer;
        box-shadow: 0px 0px 15px #00000025;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        font-size: 18px;
    }




    #menuToggle {
        color: #fff;
        padding: 15px;
        background-color: #000;
        border: 0;
    }

    div.logodiv {
        display: flex;
        align-items: center;
        left: 60;
    }
</style>

</head>

<body>
    <?php
    require_once("../language/translate.php");
    ?>


    <div class="header">

        <div class="p15">
            <button id="menuToggle">
                &#9776; Menu
            </button>
        </div>

        <div id="trans">
            <?php
            $APP_DIR;
            require_once("../language/language.php");
            ?>
        </div>
        <div>

        </div>

        <div>

        </div>


    </div>