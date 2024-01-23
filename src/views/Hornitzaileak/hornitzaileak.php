<!DOCTYPE html>
<html>
    <style>

        .navbar {
            background-color: rgb(21, 176, 0);
            overflow: hidden;
            border-bottom: 2px solid #ffffff;
            box-shadow: 0px 5px 10px rgb(252, 252, 252);
        }

    </style>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <?php
    require_once("../../require/header2.php");
    require_once("../../require/sidebar.php");
    ?>
</html> 
<body>
<div class="container">
    
    <center><h2>Hornitzaile formularioa</h2></center>

    <form action="hornitzaileak.php" method="post">
            <label for="telefonoa">Telefono zenbakia:</label>
            <input id="telefonoa" type="text" name="TelZenbakia" required><br><br>

            <label for="izena">Izena:</label>
            <input id="izena" type="text" name="Izena" required><br><br>

            <label for="NAN">NAN:</label>
            <input id="NAN" type="text" name="NAN" required><br><br>

            <label>Hornitzaile mota:</label>
            <input id="enpresa" type="radio" name="HornitzaileMota" value="empresa" required> Enpresa
            <input id="pertsona" type="radio" name="HornitzaileMota" value="pertsona" required> Pertsona<br><br>

            <label for="helbidea">Helbidea:</label>
            <input id="helbidea" type="text" name="Helbidea" required><br><br>

            <label for="eskaintza">Zerbitzua:</label>
            <input id="eskaintza" type="text" name="Zerbitzua" required><br><br>

            <input id="saldu" type="submit" value="Gorde hornitzailea">
            
        </form>
</div>
 
</body>  
<?php
     

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require_once("../../require/functions.php");
        
        $conn = null;
        $conn = connect($conn);

        $telefonoa = $_POST["TelZenbakia"];
        $izena = $_POST["Izena"];
        $NAN = $_POST["NAN"];
        $mota = $_POST["HornitzaileMota"];
        $helbidea = $_POST["Helbidea"];
        $eskaintza = $_POST["Zerbitzua"];

        $sql = "INSERT INTO hornitzaileFormulario (TelZenbakia, Izena, NAN, HornitzaileMota, Helbidea, Zerbitzua) VALUES (?, ?, ?, ?, ?, ?)";

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