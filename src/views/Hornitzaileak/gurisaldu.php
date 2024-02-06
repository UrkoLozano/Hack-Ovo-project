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
    require_once("../../require/header2.php");
    require_once("../../require/sidebar.php");
    ?>

<div class="search-form">
    <input aria-label="Bilatu" id="search-input" placeholder="<?= itzuli("buscador")?>" class="search-input" value="">
    <button aria-label="Search" type="submit" class="search-button" id="search-button"><?= itzuli("BilatuButt")?></button>
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
       
            }
        }
    });

</script>
</script>



<center>
    <h2><?= itzuli("Almacen") ?></h2>
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
?>
    <form method='POST'>
        <table border='1'>
            <tr>
                <th><?= itzuli("Prod") ?></th>
                <th><?= itzuli("Cant") ?></th>
            </tr>

            <?php

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "
            <tr>
                <td>". itzuli ($row["trans_key"]) . " " . $row['marka'] . " " . $row['modeloa'] . "<a hidden>" . $row['kantitatea'] . " " . $row['ErregistroID'] . " </a></td>
                <td><input type='number' min='0' value='0'  name='kantitatea[" . $row['ErregistroID'] . "]'></td>
            </tr>
            ";
        }
    } else {
    echo "Ez dago datuak taulan.";
    }
    ?>
        
    </table>
        <button class='saldu'> <?= itzuli("Sald")?> </button>
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