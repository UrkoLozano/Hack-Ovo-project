 
<?php
 
 session_start();
  
 if(isset($_POST["action"])){
     switch($_POST["action"]){
        case "addInCart":{
            if(!isset($_SESSION[$_POST["indizea"]][$_POST["balioa"]])){
                $_SESSION[$_POST["indizea"]][$_POST["balioa"]] = ["zenb" => 1, "titulo" => $_POST["titulua"], "marka" => $_POST["marca"], "modeloa" => $_POST["modelo"], "precioNum" => $_POST["precioZenb"]];
            }
            echo json_encode($_SESSION);
            break;
        }
        case "changeNumberInCart":{
            $_SESSION[$_POST["indizea"]][$_POST["balioa"]]["zenb"] = $_POST["zenbatekoa"];
            echo json_encode($_SESSION);
            break;
        }
     }
 }