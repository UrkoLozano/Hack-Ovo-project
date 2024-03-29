<!DOCTYPE html>
<html lang="eus">
    
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
    </script>

    <div class="filter-section">
        <form method="GET">
            <label for="categoryFilter">Kategoria:</label>
            <select id="categoryFilter" name="category">
                <option value="all" <?php if (isset($_GET['category']) && $_GET['category'] === 'Dena') echo 'selected="selected"'; ?>>Dena</option>
                <option value="Prozesadorea" <?php if (isset($_GET['category']) && $_GET['category'] === 'Prozesadorea') echo 'selected="selected"'; ?>>Prozesadoreak</option>
                <option value="Txartel Grafikoa" <?php if (isset($_GET['category']) && $_GET['category'] === 'Txartel Grafikoa') echo 'selected="selected"'; ?>>Txartel Grafikoak</option>
                <option value="Plaka Basea" <?php if (isset($_GET['category']) && $_GET['category'] === 'Plaka Basea') echo 'selected="selected"'; ?>>Plaka Baseak</option>
                <option value="Disko Gogorra" <?php if (isset($_GET['category']) && $_GET['category'] === 'Disko Gogorra') echo 'selected="selected"'; ?>>Disko Gogorrak</option>
                <option value="Ram Memoria" <?php if (isset($_GET['category']) && $_GET['category'] === 'Ram Memoria') echo 'selected="selected"'; ?>>Ram Memoriak</option>
                <option value="Sagua" <?php if (isset($_GET['category']) && $_GET['category'] === 'Sagua') echo 'selected="selected"'; ?>>Saguak</option>
                <option value="Aurikularrak" <?php if (isset($_GET['category']) && $_GET['category'] === 'Aurikularrak') echo 'selected="selected"'; ?>>Aurikularrak</option>
                <option value="Teklatua" <?php if (isset($_GET['category']) && $_GET['category'] === 'Teklatua') echo 'selected="selected"'; ?>>Teklatuak</option>
                <option value="Pantaila" <?php if (isset($_GET['category']) && $_GET['category'] === 'Pantaila') echo 'selected="selected"'; ?>>Pantailak</option>
                <option value="Portatila" <?php if (isset($_GET['category']) && $_GET['category'] === 'Portatila') echo 'selected="selected"'; ?>>Portatilak</option>
            </select>
            <label for="brandFilter">Marka:</label>
            <input type="textarea" id="brandFilter" name="brand" placeholder="idatzi marka">

            <label for="priceFilter" >Prezioa:</label>
            <input type="number" id="priceFilter" name="price" placeholder="prezio maximoa">

            <label for="balorazioFilter">Balorazioa:</label>
            <select id="balorazioFilter" name="balorazioa">
                <option value="all" <?php if (isset($_GET['balorazioa']) && $_GET['balorazioa'] === 'all') echo 'selected="selected"'; ?>>Denak</option>
                <option value="1" <?php if (isset($_GET['balorazioa']) && $_GET['balorazioa'] === '1') echo 'selected="selected"'; ?>>1⭐</option>
                <option value="2" <?php if (isset($_GET['balorazioa']) && $_GET['balorazioa'] === '2') echo 'selected="selected"'; ?>>2⭐</option>
                <option value="3" <?php if (isset($_GET['balorazioa']) && $_GET['balorazioa'] === '3') echo 'selected="selected"'; ?>>3⭐</option>
                <option value="4" <?php if (isset($_GET['balorazioa']) && $_GET['balorazioa'] === '4') echo 'selected="selected"'; ?>>4⭐</option>
                <option value="5" <?php if (isset($_GET['balorazioa']) && $_GET['balorazioa'] === '5') echo 'selected="selected"'; ?>>5⭐</option>
            </select>
            <br><br>
            <button aria-label="Filtratu" type="submit" class="filter-button" id="filter-button">Filtratu</button>
        </form>
    </div>

    <center><h2>Gure almazenaren katalogoa</h2></center>
    <center>
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
            echo "<div class='product'>                     
                <img src='../../../public/" . $row["Irudia"] . "'>                     
                <h3>" . $row["marka"] . "</h3>    
                <p>" . $row["izena"] . "</p>                   
                <p>" . $row["modeloa"] . "</p>
                <p style='color: red;'>" . $row["prezioaS"] . "€</p>
                <p>" . $row["balorazioa"] . "⭐</p>
                <button onclick='addToCart(" . $row["ErregistroID"] . ")'>Gehitu saskira</button>
                </div>";
        }
    } else {
        echo "Ez dago datuak taulan.";
    }

    $conn->close();
    ?>
    </center>
    
    <?php
    require_once("../../require/footer.php");
    ?>

</html>

