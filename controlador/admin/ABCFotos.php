<?php
    include_once("../../modelo/Foto.php");
    $oFoto = new Foto();
    $sErr="";
    if (isset($_POST["txtOpe"]) && !empty($_POST["txtOpe"])){
        $sOpe = $_POST["txtOpe"];
?>