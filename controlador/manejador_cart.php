<?php
session_start();
include_once("../modelo/aDatos.php");
require("../config.inc.php");
setlocale(LC_MONETARY,"en_US");


# add products in cart 
if(isset($_POST["idproducto"])) {
	foreach($_POST as $key => $value){
		$product[$key] = filter_var($value, FILTER_SANITIZE_STRING);
	}	
	$statement = $conn->prepare("SELECT nombre, precio FROM producto WHERE idproducto=? LIMIT 1");
	$statement->bind_param('s', $product['idproducto']);
	$statement->execute();
	$statement->bind_result($nombre, $precio);
	while($statement->fetch()){ 
		$product["nombre"] = $nombre;
		$product["precio"] = $precio;		
		if(isset($_SESSION["products"])){ 
			if(isset($_SESSION["products"][$product['idproducto']])) {				
				$_SESSION["products"][$product['idproducto']]["product_qty"] = $_SESSION["products"][$product['idproducto']]["product_qty"] + $_POST["product_qty"];				
			} else {
				$_SESSION["products"][$product['idproducto']] = $product;
			}			
		} else {
			$_SESSION["products"][$product['idproducto']] = $product;
		}	
	}	
 	$total_product = count($_SESSION["products"]);
	die(json_encode(array('products'=>$total_product)));
}
# Remove products from cart
if(isset($_GET["remove_code"]) && isset($_SESSION["products"])) {
	$idproducto  = filter_var($_GET["remove_code"], FILTER_SANITIZE_STRING);
	if(isset($_SESSION["products"][$idproducto]))	{
		unset($_SESSION["products"][$idproducto]);
	}	
 	$total_product = count($_SESSION["products"]);
	die(json_encode(array('products'=>$total_product)));
}
# Update cart product quantity
if(isset($_GET["update_quantity"]) && isset($_SESSION["products"])) {	
	if(isset($_GET["quantity"]) && $_GET["quantity"]>0) {		
		$_SESSION["products"][$_GET["update_quantity"]]["product_qty"] = $_GET["quantity"];	
	}
	$total_product = count($_SESSION["products"]);
	die(json_encode(array('products'=>$total_product)));
}	