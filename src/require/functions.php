<?php
    function connect(&$conn){    
        $dbName = "newlife";
        $conn = null;
        $servername = "localhost:3306";
        $username = "root";
        $password = "1WMG2023";
    
        $conn = new mysqli($servername, $username, $password, $dbName);
    
        if ($conn->connect_error) {
            die("Errorea: " . $conn->connect_error);
        }

        return $conn;
    }
    ?>

