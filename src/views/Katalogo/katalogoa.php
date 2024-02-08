<!DOCTYPE html>
<html lang="eus">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="estilo.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="app.js" async></script>
    <style>
        .container-list-favorites {
            position: fixed;
            top: 0;
            right: 0;
            transform: translateX(400px);
            background-color: #555;
            opacity: 0;
            width: 400px;
            height: 100vh;
            transition: all 0.5s linear;
        }

        .container-list-favorites.show {
            opacity: 1;
            transform: translateX(0);
            z-index: 1;
        }

        .header-favorite {
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-favorite i {
            cursor: pointer;
        }

        .list-favorites {
            padding: 35px 20px;
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .list-favorites .card-favorite {
            width: 100%;
            background-color: #fff;
            box-shadow: 0px 0px 20px #00000065;
            padding: 20px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
        }

        .card-favorite .title {
            color: #000;
            flex: 1;
        }

        .card-favorite p:last-child {
            font-weight: 700;
            font-size: 22px;
            color: #000;
        }

        /* ------------------- */

        #added-favorite {
            color: red;
            display: none;
        }

        #favorite-regular.active {
            background-color: red;
            display: none;
        }

        #added-favorite.active {
            display: block;
            color: red;
        }

    </style>
</head>

<body>
    <?php
    require_once("../../require/header.php");
    require_once("../../require/sidebar.php");
    ?>

    <div class="search-form">
        <input type="hidden" id="carritoVal" value="<?= $_SESSION["carritoIds"] ?? "" ?>">
        <input aria-label="Bilatu" id="search-input" placeholder="<?= itzuli("buscador") ?>" class="search-input" value="">
        <button aria-label="Search" type="submit" class="search-button" id="search-button"><?= itzuli("BilatuButt") ?></button>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('search-button').addEventListener('click', function(e) {
                e.preventDefault();
                var searchTerm = document.getElementById('search-input').value;
                searchProducts(searchTerm);
            });

            function searchProducts(term) {
                var found = window.find(term, false, false, true, false, true, false);
                if (!found) {
                    alert("No se encontraron coincidencias.");
                }
            }
        });


        function redirectToOrdaindu() {
            window.location.href = "Ordaindu/Ordaindu.php";
        }

        function guardarCantidad() {
            // Obtener la cantidad a pagar
            var cantidadAPagar = document.getElementById("carrito-precio-total").innerText;

            // Guardar la cantidad en el almacenamiento local
            localStorage.setItem('carrito-precio-total', cantidadAPagar);
        }
    </script>
    <div class="filter-section">
        <form method="GET">
            <label for="categoryFilter"><?= itzuli("Katergoria") ?>:</label>
            <select id="categoryFilter" name="category">
                <option value="all" <?php if (isset($_GET['category']) && $_GET['category'] === 'Dena') echo 'selected="selected"'; ?>>
                    <?= itzuli("options1") ?>
                </option>
                <option value="Prozesadorea" <?php if (isset($_GET['category']) && $_GET['category'] === 'Prozesadorea') echo 'selected="selected"'; ?>>
                    <?= itzuli("Procesador") ?></option>
                <option value="Txartel Grafikoa" <?php if (isset($_GET['category']) && $_GET['category'] === 'Txartel Grafikoa') echo 'selected="selected"'; ?>>
                    <?= itzuli("TxartGrafik") ?></option>
                <option value="Plaka Basea" <?php if (isset($_GET['category']) && $_GET['category'] === 'Plaka Basea') echo 'selected="selected"'; ?>>
                    <?= itzuli("plaka") ?></option>
                <option value="Disko Gogorra" <?php if (isset($_GET['category']) && $_GET['category'] === 'Disko Gogorra') echo 'selected="selected"'; ?>>
                    <?= itzuli("disko") ?></option>
                <option value="Ram Memoria" <?php if (isset($_GET['category']) && $_GET['category'] === 'Ram Memoria') echo 'selected="selected"'; ?>>
                    <?= itzuli("ram") ?></option>
                <option value="Sagua" <?php if (isset($_GET['category']) && $_GET['category'] === 'Sagua') echo 'selected="selected"'; ?>>
                    <?= itzuli("Raton") ?></option>
                <option value="Aurikularrak" <?php if (isset($_GET['category']) && $_GET['category'] === 'Aurikularrak') echo 'selected="selected"'; ?>>
                    <?= itzuli("Kasko") ?></option>
                <option value="Teklatua" <?php if (isset($_GET['category']) && $_GET['category'] === 'Teklatua') echo 'selected="selected"'; ?>>
                    <?= itzuli("Teklatu") ?></option>
                <option value="Pantaila" <?php if (isset($_GET['category']) && $_GET['category'] === 'Pantaila') echo 'selected="selected"'; ?>>
                    <?= itzuli("pantaia") ?></option>
                <option value="Portatila" <?php if (isset($_GET['category']) && $_GET['category'] === 'Portatila') echo 'selected="selected"'; ?>>
                    <?= itzuli("Portatil") ?></option>
            </select>
            <label for="brandFilter"><?= itzuli("Marka") ?>:</label>
            <input type="textarea" id="brandFilter" name="brand" placeholder="<?= itzuli("markaIdatz") ?>">

            <label for="priceFilter"><?= itzuli("Prezio") ?>:</label>
            <input type="number" id="priceFilter" name="price" placeholder="<?= itzuli("Prezioa") ?>">

            <label for="balorazioFilter"><?= itzuli("Valor") ?>:</label>
            <select id="balorazioFilter" name="balorazioa">
                <option value="all" <?php if (isset($_GET['balorazioa']) && $_GET['balorazioa'] === 'all') echo 'selected="selected"'; ?>>
                    <?= itzuli("Balorazio") ?></option>
                <option value="1" <?php if (isset($_GET['balorazioa']) && $_GET['balorazioa'] === '1') echo 'selected="selected"'; ?>>
                    1⭐
                </option>
                <option value="2" <?php if (isset($_GET['balorazioa']) && $_GET['balorazioa'] === '2') echo 'selected="selected"'; ?>>
                    2⭐
                </option>
                <option value="3" <?php if (isset($_GET['balorazioa']) && $_GET['balorazioa'] === '3') echo 'selected="selected"'; ?>>
                    3⭐
                </option>
                <option value="4" <?php if (isset($_GET['balorazioa']) && $_GET['balorazioa'] === '4') echo 'selected="selected"'; ?>>
                    4⭐
                </option>
                <option value="5" <?php if (isset($_GET['balorazioa']) && $_GET['balorazioa'] === '5') echo 'selected="selected"'; ?>>
                    5⭐
                </option>
            </select>
            <br><br>
            <button aria-label="Filtratu" type="submit" class="filter-button" id="filter-button"><?= itzuli("filterButt") ?></button>
        </form>
    </div>
    <center>
        <h2><?= itzuli("Almacen") ?></h2>
    </center>
    <center>
        <section class="contenedor">
            <!-- Contenedor de elementos -->
            <div class="contenedor-items">

                <?php
                require_once("../../require/functions.php");

                $conn = null;
                $conn = connect($conn);

                $categoryFilter = isset($_GET['category']) ? $_GET['category'] : 'all';
                $brandFilter = isset($_GET['brand']) ? $_GET['brand'] : '';
                $priceFilter = isset($_GET['price']) ? $_GET['price'] : '';
                $balorazioFilter = isset($_GET['balorazioa']) ? $_GET['balorazioa'] : 'all';

                $sql = "SELECT * FROM hackovo.almazena as a INNER JOIN hackovo.prodmota as p ON p.idProdukt = a.prd_mota_id WHERE 1";

                if ($categoryFilter !== 'all') {
                    $sql .= " AND izena = '$categoryFilter'";
                }

                if (!empty($brandFilter)) {
                    $sql .= " AND marka = '$brandFilter'";
                }

                if (!empty($priceFilter)) {
                    $sql .= " AND prezioaS <= $priceFilter";
                }

                if ($balorazioFilter !== 'all') {
                    $sql .= " AND balorazioa = $balorazioFilter";
                }

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='item card-product'>                     
                    <img class='img-item' src='../../../public/" . $row["Irudia"] . "'> 
                        <div class='content-card-product' data-product-id='" . $row["ErregistroID"] . "'>                    
                            <h3 class='marka-item'>" . $row["marka"] . "</h3>    
                            <p class='modelo-item'>" . $row["modeloa"] . "</p>
                            <p class='titulo-item'>" . itzuli($row["trans_key"]) . "</p>
                                <div class='footer-card-product'>
                                    <span class='precio-item price' style='color: red;'>" . $row["prezioaS"] . "€</span><br></br> 
                                    <p>" . $row["balorazioa"] . "⭐</p><br></br>     
                                        <div class='container-buttons-card'>
                                            <button class='favorite'>
                                            <i class='fa-regular fa-heart' id='favorite-regular'></i>
                                            <i class='fa-solid fa-heart' id='added-favorite'></i>
                                            </button>
                                        </div>
                                </div>
                        </div>
                    <p hidden class='id-item'>" . $row["ErregistroID"] . "</p> 
                    <button class='boton-item' data-erregistro-id='" . $row["ErregistroID"] . "'>" . itzuli("SaskiButt") . "</button>
                    
                </div>";
                    }
                } else {
                    echo "Ez dago datuak taulan.";
                }




                $conn->close();
                ?>
    </center>
    <script>
        // Botoia klikatzen denean funtzioa exekutatu
        $('.btn-pagar').on('click', function() {
            $.ajax({
                    url: "../Ordaindu.php", // Datu-basearen script-aren izena
                    method: 'GET',
                    data: {}
                })
                .done(function(data) {

                })
                .fail(function() {
                    alert('Errorea kargatzerakoan:', error);
                });
        });
    </script>
    </div>
    <!-- Carrito de Compras -->
    <div class="carrito" id="carrito">
        <div class="header-carrito">
            <h2><?= itzuli("saskia") ?></h2>
        </div>
        <div class="carrito-items">
            <?php
                if (isset($_SESSION["cart"]) && count($_SESSION["cart"]) > 0) {


                foreach ($_SESSION["cart"] as $id => $item) {
                    echo '<div class="item carrito-item">
                <div class="carrito-item-detalles">
                    
                    <p class="carrito-item-modelo">' .  $item["modeloa"] . '</p>
                    <p class="carrito-item-marka">' . $item["marka"] . '</p>
                    <p class="carrito-item-titulo">' . $item["titulo"] . '</p>
                    <div class="selector-cantidad">
                        <i class="fa-solid fa-minus restar-cantidad"></i>
                        <input type="text" value="1" class="carrito-item-cantidad" disabled>
                        <p class="carrito-item-id hidden">${id}</p>
                        <i class="fa-solid fa-plus sumar-cantidad"></i>
                    </div>
                    <p hidden class="id-elim">' . $id . '</p> 
                    <span class="carrito-item-precio">'. $item["precio"] .' </span>
                </div>
                <button class="btn-eliminar">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </div>';
                }
            }
            ?>
        </div>
        <div class="carrito-total">
            <div class="fila">
                <strong><?= itzuli("total") ?></strong>
                <span name="carrito-precio-total" class="carrito-precio-total">
                </span>
            </div>
            <button class="ordaindubtn" href="../Ordaindu/Ordaindu.php"><?= itzuli("pagar") ?><i class="fa-solid fa-bag-shopping"></i></button>
        </div>
    </div>

    </section>
    <script src="gustokoena.js"></script>

    <?php
    require_once("../../require/layoutBottom.php");
    ?>