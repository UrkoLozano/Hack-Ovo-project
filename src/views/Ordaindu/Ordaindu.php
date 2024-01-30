<!DOCTYPE html>
<html>
<header>
    <link rel="stylesheet" href="../../css/estilos.css">
</header>

<body>
    <?php 
    require_once("../../require/functions.php"); 

    $conn = null;
    $conn = connect($conn);

    if($_SERVER['REQUEST_METHOD']=="POST"){
        $NAN = $_POST['NAN'];
   
        $sql = "INSERT INTO eskariak (NAN) VALUES ('$NAN')";
        $stmt = $conn->prepare($sql);

        $stmt->close(); 
    }
        $conn->close();
    ?>
    w
    <div class="container">

        <form method="post">
            <div class="row">

                <div class="col">
                    <h3 class="title">ZURE DATUAK</h3>
                    <div class="inputBox">
                        <span name="NAN">NAN:</span>
                        <input name="NAN" type="text" required>
                    </div>

                    <div class="inputBox">
                        <span>Herria:</span>
                        <input type="text" required>
                    </div>

                    <div class="inputBox">
                        <span>Helbidea:</span>
                        <input type="text" placeholder="Kalea Portala, Pisua Etxea" required>
                    </div>

                    <div class="flex">
                        <div class="inputBox">
                            <span>Herrialdea:</span>
                            <input type="text" required>
                        </div>

                        <div class="inputBox">
                            <span>Posta Kodea:</span>
                            <input type="text" required>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <h3 class="izenburua">ORDAINKETA SEKZIOA</h3><br>
                    <div class="inputBox">
                        <span>Txarteleko izena:</span>
                        <input type="text" placeholder="Izena abizenak" required>
                    </div>

                    <div class="inputBox">
                        <span>Onartzen diren txartelak:</span>
                        <img src="https://www.rrhhdigital.com/wp-content/uploads/userfiles/Logo-empresa-Visa-fuera.jpg"
                            width="60" heigth="40">
                        <img src="data:image/png;base64,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"
                            width="60" height="40">
                    </div>

                    <div class="inputBox">
                        <span>Txartel zenbakia:</span>
                        <input type="number" placeholder="1111 2222 3333 4444" required>
                    </div>

                    <div class="inputBox">
                        <span>Epemuga :</span>
                        <input type="date" required>
                    </div>

                    <div class="inputBox">
                        <span>CVV :</span>
                        <input type="text" required>
                    </div>
                </div>
            </div>
            <br>
            <button type="submit" value="Ordaindu" class="submit-btn">Ordaindu</button>
    </div>
    </form>
    </div>
</body>

</html>