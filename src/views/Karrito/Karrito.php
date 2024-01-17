<?php
session_start();

if (isset($_POST['agregar_al_carrito'])) {
    $producto = [
        'name' => $_POST['izena'], 
        'price' => $_POST['prezioa'], 
        'amount' => $_POST['kantitatea'], 
        
    ];

    $_SESSION['karrito'][] = $producto;
}

?>

<!DOCTYPE html>
<html lang="eus">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saskia</title>
</head>
<?php
    require_once("../../require/header2.php");
    ?>
<body>
    <h2>Zure saskia</h2>

    <?php
    if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) {
        echo "<ul>";
        foreach ($_SESSION['carrito'] as $producto) {
            echo "<li>";
            echo "name: " . $producto['izena'] . "<br>";
            echo "price: " . $producto['prezioa'] . "<br>";
            echo "amount: " . $producto['kantitatea'] . "<br>";
            echo "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Saskirik ez.</p>";
    }
    ?>

    <a href="../Hasiera/index.php">Itzuli</a>
</body>

</html>

