 
<?php
 
 session_start();
  
 if(isset($_POST["action"])){
     switch($_POST["action"]){
        case "addInCart":{
            if(!isset($_SESSION[$_POST["indizea"]][$_POST["id"]])){
                $_SESSION[$_POST["indizea"]][$_POST["id"]] = [
                    "zenb" => 1, 
                    "titulo" => $_POST["titulua"], 
                    "marka" => $_POST["marca"], 
                    "modeloa" => $_POST["modelo"], 
                    "precio" => $_POST["prezioa"], 
                    "precioNum" => $_POST["precioZenb"]
                ];
                $_SESSION["carritoIdsArray"][] = $_POST["id"];
                $_SESSION["carritoIds"] = implode(",", $_SESSION["carritoIdsArray"]);
                
                // Guardar la cantidad en el array kantitateaArray
                $_SESSION["kantitateaArray"][] = $_POST["kantitatea"];
            }
            echo json_encode($_SESSION);
            break;
        }
        case "changeNumberInCart":{
            $_SESSION[$_POST["indizea"]][$_POST["id"]]["zenb"] = $_POST["zenbatekoa"];
            $_SESSION["carritoKantitateaArray"][][$_POST["id"]] = $_POST["zenbatekoa"];
            while(count($_SESSION["carritoKantitateaArray"]) > $i){
                if($_SESSION["carritoKantitateaArray"][$i][$_POST["id"]] > $_POST["zenbatekoa"]){

                } else{
                    $_SESSION["carritoKantitateaArray"][$i][$_POST["id"]] = $_POST["zenbatekoa"];
                }
            }
           
            echo json_encode($_SESSION);
            break;
        }
        case "removeFromCart":{ 
            if(isset($_POST["itemId"])) {
                $itemIdToRemove = $_POST["itemId"];
                $key = array_search($itemIdToRemove, $_SESSION['carritoIdsArray']);
                if ($key !== false) {
                    unset($_SESSION['cart'][$itemIdToRemove]);
                    unset($_SESSION['carritoIdsArray'][$key]);
                    $_SESSION["carritoIds"] = implode(",", $_SESSION["carritoIdsArray"]);
                }
                echo json_encode($_SESSION);
            }
            break;
        }   
        }
     }
 