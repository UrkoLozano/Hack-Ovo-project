</html>
<!DOCTYPE html>
<html lang="eus">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="estilo.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="app.js" async></script>
    
</head>

<body>
    <?php
    require_once("../../require/header.php");
    require_once("../../require/sidebar.php");
    ?>

    <div class="search-form">
        <input aria-label="Bilatu" id="search-input" placeholder="Bilatu produktua..." class="search-input" value="">
        <button aria-label="Search" type="submit" class="search-button" id="search-button">Bilatu</button>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('search-button').addEventListener('click', function (e) {
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

        function addToCart(productId) {
            alert("Producto añadido al carrito. Id: " + productId);
        }
    </script>
    <div class="filter-section">
        <form method="GET">
            <label for="categoryFilter">Kategoria:</label>
            <select id="categoryFilter" name="category">
                <option value="all"
                    <?php if (isset($_GET['category']) && $_GET['category'] === 'Dena') echo 'selected="selected"'; ?>>
                    Dena
                </option>
                <option value="Prozesadorea"
                    <?php if (isset($_GET['category']) && $_GET['category'] === 'Prozesadorea') echo 'selected="selected"'; ?>>
                    Prozesadoreak</option>
                <option value="Txartel Grafikoa"
                    <?php if (isset($_GET['category']) && $_GET['category'] === 'Txartel Grafikoa') echo 'selected="selected"'; ?>>
                    Txartel Grafikoak</option>
                <option value="Plaka Basea"
                    <?php if (isset($_GET['category']) && $_GET['category'] === 'Plaka Basea') echo 'selected="selected"'; ?>>
                    Plaka Baseak</option>
                <option value="Disko Gogorra"
                    <?php if (isset($_GET['category']) && $_GET['category'] === 'Disko Gogorra') echo 'selected="selected"'; ?>>
                    Disko Gogorrak</option>
                <option value="Ram Memoria"
                    <?php if (isset($_GET['category']) && $_GET['category'] === 'Ram Memoria') echo 'selected="selected"'; ?>>
                    Ram Memoriak</option>
                <option value="Sagua"
                    <?php if (isset($_GET['category']) && $_GET['category'] === 'Sagua') echo 'selected="selected"'; ?>>
                    Saguak</option>
                <option value="Aurikularrak"
                    <?php if (isset($_GET['category']) && $_GET['category'] === 'Aurikularrak') echo 'selected="selected"'; ?>>
                    Aurikularrak</option>
                <option value="Teklatua"
                    <?php if (isset($_GET['category']) && $_GET['category'] === 'Teklatua') echo 'selected="selected"'; ?>>
                    Teklatuak</option>
                <option value="Pantaila"
                    <?php if (isset($_GET['category']) && $_GET['category'] === 'Pantaila') echo 'selected="selected"'; ?>>
                    Pantailak</option>
                <option value="Portatila"
                    <?php if (isset($_GET['category']) && $_GET['category'] === 'Portatila') echo 'selected="selected"'; ?>>
                    Portatilak</option>
            </select>
            <label for="brandFilter">Marka:</label>
            <input type="textarea" id="brandFilter" name="brand" placeholder="idatzi marka">

            <label for="priceFilter">Prezioa:</label>
            <input type="number" id="priceFilter" name="price" placeholder="prezio maximoa">

            <label for="balorazioFilter">Balorazioa:</label>
            <select id="balorazioFilter" name="balorazioa">
                <option value="all"
                    <?php if (isset($_GET['balorazioa']) && $_GET['balorazioa'] === 'all') echo 'selected="selected"'; ?>>
                    Denak</option>
                <option value="1"
                    <?php if (isset($_GET['balorazioa']) && $_GET['balorazioa'] === '1') echo 'selected="selected"'; ?>>
                    1⭐
                </option>
                <option value="2"
                    <?php if (isset($_GET['balorazioa']) && $_GET['balorazioa'] === '2') echo 'selected="selected"'; ?>>
                    2⭐
                </option>
                <option value="3"
                    <?php if (isset($_GET['balorazioa']) && $_GET['balorazioa'] === '3') echo 'selected="selected"'; ?>>
                    3⭐
                </option>
                <option value="4"
                    <?php if (isset($_GET['balorazioa']) && $_GET['balorazioa'] === '4') echo 'selected="selected"'; ?>>
                    4⭐
                </option>
                <option value="5"
                    <?php if (isset($_GET['balorazioa']) && $_GET['balorazioa'] === '5') echo 'selected="selected"'; ?>>
                    5⭐
                </option>
            </select>
            <br><br>
            <button aria-label="Filtratu" type="submit" class="filter-button" id="filter-button">Filtratu</button>
        </form>
    </div>
    <center>
        <h2>Gure almazenaren katalogoa</h2>
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

    $sql = "SELECT * FROM almazena WHERE 1";

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
            echo "<div class='item'>                     
                <img class='img-item' src='../../../public/" . $row["Irudia"] . "'>                     
                <h3 class='marka-item'>" . $row["marka"] . "</h3>    
                <p class='modelo-item'>" . $row["izena"] . "</p>                   
            <p class='titulo-item'>" . $row["modeloa"] . "</p>
            <span class='precio-item' style='color: red;'>" . $row["prezioaS"] . "€</span>
            <p>" . $row["balorazioa"] . "⭐</p>  
            <p hidden class='id-item'>" . $row["ErregistroID"] . "</p> 
            <button class='favorite'>
                <i class='fa-regular fa-heart' id='favorite-regular'></i>
                <i class='fa-solid fa-heart' id='added-favorite'></i>
            </button>
            <button class='boton-item' data-erregistro-id='" . $row["ErregistroID"] . "'>Gehitu saskira</button>
            </div>";
    }
} else {
    echo "Ez dago datuak taulan.";
}

				
			

    $conn->close();
    ?>
    </center>
        </div>
        <!-- Carrito de Compras -->
        <div class="carrito" id="carrito">
            <div class="header-carrito">
                <h2>Tu Carrito</h2>
            </div>
            <div class="carrito-items">
            </div>
            <div class="carrito-total">
                <div class="fila">
                    <strong>Tu Total</strong>
                    <span class="carrito-precio-total">
                    </span>
                </div>
                <button class="btn-pagar">Pagar <i class="fa-solid fa-bag-shopping"></i> </button>
            </div>
        </div>
    </section>
    <?php
    require_once("../../require/footer.php");
    ?>
</body>

</html>