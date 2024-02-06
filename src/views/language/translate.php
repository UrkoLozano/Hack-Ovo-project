<?php


if (!isset($_SESSION["_LANGUAGE"])) {
    defaultLanguage();
}

aldatuHizkuntza();

function defaultLanguage()
{
    $_SESSION["_LANGUAGE"] = "eus";
}

function aldatuHizkuntza()
{
    if (isset($_POST["aukeratutakoHizkuntza"])) {
        $_SESSION["_LANGUAGE"] = $_POST["aukeratutakoHizkuntza"];
    }
}

function itzuli($indexPhrase)
{
    static $itzultzekoArray = array();
    if (file_exists(APP_DIR . '/src/views/language/' . $_SESSION["_LANGUAGE"] . '.php')) {
        $url = APP_DIR . '/src/views/language/';
        $itzultzekoArray = include($url . $_SESSION["_LANGUAGE"] . '.php');
    }
    return (!array_key_exists($indexPhrase, $itzultzekoArray)) ? $indexPhrase : $itzultzekoArray[$indexPhrase];
}

?>