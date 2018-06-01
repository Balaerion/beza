<?php
    session_start();
    require('modelo/aDatos.php');
    $compras=$mysqli->query("SELECT * FROM compra");
    $compCount = mysqli_num_rows($compras); // count the output amount
    $gtotal= $_SESSION['grandtotal'];
    $iduser = $_SESSION['iduser'];
    $stotal = $_SESSION['subtotal'];
    $idvent = $compCount+1;
    $sql2 = "INSERT INTO `beza`.`compra` (`idventa`, `total`, `subtotal`, `fecha`, `cliente_usuario_idusuario`) 
            VALUES ('$idvent','$gtotal','$stotal', now(),'$iduser')";
    $mysqli->query($sql2);
    foreach($_SESSION["products"] as $product){
        $product_qty = $product["product_qty"];
        $idproducto = $product["idproducto"];
        $precio = $product["precio"];
        $sql = "UPDATE `producto` SET `cantidad` = `cantidad` - $product_qty 
                WHERE `idproducto` = $idproducto";
        $mysqli->query($sql);
        $sql3 = "INSERT INTO `beza`.`compra_has_producto` (`venta_idventa`, `producto_idproducto`, `cantidad`, `precio`, `descuento`) 
        VALUES ('$idvent', '$idproducto', '$product_qty', '$precio', '0')";
        $mysqli->query($sql3);
    }
        unset($_SESSION['products']);
        header('Location: index.php');
?>