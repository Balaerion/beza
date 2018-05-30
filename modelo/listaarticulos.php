<?php
    require_once('modelo/aDatos.php');
    $productos=$mysqli->query("Select producto.nombre,producto.precio,foto.ruta,producto.idproducto
                        FROM producto
                        INNER JOIN foto ON producto.idproducto = foto.producto_idproducto");
    $productCount = mysqli_num_rows($productos); // count the output amount
?>