<?php
    session_start();
    require('modelo/aDatos.php');
    foreach($_SESSION["products"] as $product){
        $product_qty = $product["product_qty"];
        $idproducto = $product["idproducto"];
        $sql = "UPDATE `producto` SET `cantidad` = `cantidad` - $product_qty 
                WHERE `idproducto` = $idproducto";
        $mysqli->query($sql);
    }
        unset($_SESSION['products']);
        header('Location: index.php');
?>