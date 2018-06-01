<?php
    require_once('modelo/aDatos.php');
    $productos=$mysqli->query("SELECT producto.nombre,producto.precio,foto.foto,producto.idproducto,producto.tipo
                        FROM producto
                        INNER JOIN foto ON producto.idproducto = foto.producto_idproducto
                        WHERE producto.tipo=2");
    $productCount = mysqli_num_rows($productos); // count the output amount
?>