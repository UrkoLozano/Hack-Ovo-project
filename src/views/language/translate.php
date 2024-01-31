<?php
session_start();

$KARPETA_DIR = "/VisualStudios/Hack-OVO";
define('APP_DIR', $_SERVER['DOCUMENT_ROOT'] . $KARPETA_DIR);

if (!isset($_SESSION["hizkuntza"])) {
    defaultLanguage();
}

aldatuHizkuntza();

function defaultLanguage(){
    $_SESSION["hizkuntza"] = "eus";
}

function aldatuHizkuntza(){
    if (isset($_POST["aukeratutakoHizkuntza"])) {
        $_SESSION["hizkuntza"] = $_POST["aukeratutakoHizkuntza"];
    }
}

function itzuli($indexPhrase){
    static $itzultzekoArray = array();
    if (file_exists(APP_DIR . '/src/views/language/' . $_SESSION["hizkuntza"] . '.php')) {
        $url = APP_DIR . '/src/views/language/';
        $itzultzekoArray = include($url . $_SESSION["hizkuntza"] . '.php');
    }
    return (!array_key_exists($indexPhrase, $itzultzekoArray)) ? $indexPhrase : $itzultzekoArray[$indexPhrase];
}
