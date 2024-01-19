<!DOCTYPE html>
<html lang="eus">

<head>
    <style>
        table {
  width: 80%;
  border-collapse: collapse;
  margin: 20px auto;
}

th, td {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: left;
}

th {
  background-color: #f2f2f2;
}

tr:hover {
  background-color: #f5f5f5;
}

input[type="number"] {
  width: 60px;
  padding: 5px;
  box-sizing: border-box;
}

.saldu {
  display: block;
  margin: 10px auto;
  border: none;
  background-color: black;
  color: #fff;
  padding: 5px 15px;
  border-radius: 5px;
  cursor: pointer;
}
    </style>
</head>
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
            <option value="all"
                <?php if (isset($_GET['category']) && $_GET['category'] === 'Dena') echo 'selected="selected"'; ?>>Dena
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
                <?php if (isset($_GET['balorazioa']) && $_GET['balorazioa'] === '1') echo 'selected="selected"'; ?>>1⭐
            </option>
            <option value="2"
                <?php if (isset($_GET['balorazioa']) && $_GET['balorazioa'] === '2') echo 'selected="selected"'; ?>>2⭐
            </option>
            <option value="3"
                <?php if (isset($_GET['balorazioa']) && $_GET['balorazioa'] === '3') echo 'selected="selected"'; ?>>3⭐
            </option>
            <option value="4"
                <?php if (isset($_GET['balorazioa']) && $_GET['balorazioa'] === '4') echo 'selected="selected"'; ?>>4⭐
            </option>
            <option value="5"
                <?php if (isset($_GET['balorazioa']) && $_GET['balorazioa'] === '5') echo 'selected="selected"'; ?>>5⭐
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
?>
    <form method='POST'>
        <table border='1'>
            <tr>
                <th>Produktua</th>
                <th>Kantitatea</th>
            </tr>

            <?php

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "
            <tr>
                <td>". $row['izena'] . " " . $row['marka'] . " " . $row['modeloa'] . "<a hidden>" . $row['kantitatea'] . " " . $row['ErregistroID'] . " </a></td>
                <td><input type='number' min='0' value='0'  name='kantitatea[" . $row['ErregistroID'] . "]'></td>
            </tr>
            ";
        }
    } else {
    echo "Ez dago datuak taulan.";
    }
    ?>
        
    </table>
        <button class='saldu'> Saldu </button>
    </form>
     
    <?php

        if (isset($_POST['kantitatea']) && is_array($_POST['kantitatea'])) {
            foreach ($_POST['kantitatea'] as $erregistroa_id => $kantitateBerria) {
            $sql_select = "SELECT kantitatea FROM almazena WHERE ErregistroID = $erregistroa_id";
            $result_select = $conn->query($sql_select);

            if ($result_select->num_rows > 0) {
                $row_select = $result_select->fetch_assoc();
                $existitzendenKantitatea = $row_select['kantitatea'];

                $berriTotala = $existitzendenKantitatea + $kantitateBerria;

                $sql_update = "UPDATE almazena SET kantitatea = $berriTotala WHERE ErregistroID = $erregistroa_id";
                $result_update = $conn->query($sql_update);

                if (!$result_update) {
                    echo "Errorea kantitatea idarekin hartzean $erregistroa_id: " . $conn->error;
                }
            } else {
                echo "Errorea kantitatea idarekin hartzean $erregistroa_id: " . $conn->error;
            }
        }
        }
    ?>
    

    <?php
    require_once("../../require/footer.php");
    ?>
</center>

</html>