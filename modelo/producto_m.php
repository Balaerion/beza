<?php
require("modelo/aDatos.php");
$varId = $_GET['id'];
$productos=$mysqli->query("SELECT producto.nombre,producto.precio,foto.foto,producto.idproducto,producto.cantidad
                        	FROM producto
							INNER JOIN foto ON producto.idproducto = foto.producto_idproducto
							WHERE producto.idproducto='$varId'");
$productCount = mysqli_num_rows($productos); // count the output amount
?>