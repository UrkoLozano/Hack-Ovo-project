<?php
require_once("../../require/header2.php");

?>
<style>
    .navbar {
        background-color: rgb(21, 176, 0);
        overflow: hidden;
        border-bottom: 2px solid #ffffff;
        box-shadow: 0px 5px 10px rgb(252, 252, 252);
    }
</style>
<?php
require_once("../../require/sidebar.php");
?>

<div class="container">

    <center>
        <h2><?= itzuli("horniForm") ?></h2>
    </center>

    <form action="hornitzaileak.php" method="post">
        <label for="telefonoa"><?= itzuli("telZen") ?>:</label>
        <input id="telefonoa" type="text" name="TelZenbakia" required><br><br>

        <label for="izena"><?= itzuli("name") ?>:</label>
        <input id="izena" type="text" name="Izena" required><br><br>

        <label for="NAN"><?= itzuli("Nan") ?>:</label>
        <input id="NAN" type="text" name="NAN" required><br><br>

        <label><?= itzuli("mota") ?>:</label>
        <input id="enpresa" type="radio" name="HornitzaileMota" value="empresa" required> <?= itzuli("op1") ?>
        <input id="pertsona" type="radio" name="HornitzaileMota" value="pertsona" required> <?= itzuli("op2") ?><br><br>

        <label for="helbidea"><?= itzuli("Helb") ?>:</label>
        <input id="helbidea" type="text" name="Helbidea" required><br><br>

        <label for="eskaintza"><?= itzuli("Zerb") ?>:</label>
        <input id="eskaintza" type="text" name="Zerbitzua" required><br><br>

        <input id="saldu" type="submit" value="<?= itzuli("Gorde") ?>">

    </form>
</div>

</body>
<?php


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['TelZenbakia'], $_POST['Izena'], $_POST['NAN'], $_POST['HornitzaileMota'], $_POST['Helbidea'], $_POST['Zerbitzua'])) {
    require_once("../../require/functions.php");

    $conn = null;
    $conn = connect($conn);

    $telefonoa = $_POST["TelZenbakia"];
    $izena = $_POST["Izena"];
    $NAN = $_POST["NAN"];
    $mota = $_POST["HornitzaileMota"];
    $helbidea = $_POST["Helbidea"];
    $eskaintza = $_POST["Zerbitzua"];

    $sql = "INSERT INTO hornitzaileformulario (TelZenbakia, Izena, NAN, HornitzaileMota, Helbidea, Zerbitzua) VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $telefonoa, $izena, $NAN, $mota, $helbidea, $eskaintza);

    $stmt->close();
    $conn->close();

    include 'gurisaldu.php';

    exit;
}

?>


<?php
require_once("../../require/footer.php");
?>

</html>