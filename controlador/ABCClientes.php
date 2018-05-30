<?php
  include_once("../../modelo/Cliente.php");
  include_once("../uploader.php");
  $oCliente = new Cliente();
  $sErr="";
  if (isset($_POST["txtOpe"]) && !empty($_POST["txtOpe"])){
			$sOpe = $_POST["txtOpe"]; 
      
      if ($sOpe == "a" || $sOpe == "c"){
      $oCliente->setNombre($_POST["Name"]);
      $oCliente->setAppat($_POST["Price"]);
      $oCliente->setApmat($_POST["Type"]);
      $oCliente->setTelefono($_POST["Quantity"]);
      $oCliente->setDireccion($_POST["Quantity"]);
      $oCliente->setBanco($_POST["Quantity"]);
      if ($sOpe == "c") {
        if(isset($_POST["txtID"]) && !empty($_POST["txtID"])){
          $oCliente->setIDusuario($_POST["txtID"]);
        }
      }        
    }else if ($sOpe == "b"){
      if(isset($_POST["txtID"]) && !empty($_POST["txtID"])){
        $oCliente->setIDusuario($_POST["txtID"]);
      } 
    }
  try{
    if ($sOpe == 'a')
    {
      $nResultado = $oCliente->insertar();
    }
    else if ($sOpe == 'b'){
      $nResultado = $oCliente->borrar();      
    }
    else
      $nResultado = $oCliente->modificar();

    if ($nResultado != 1){
      $sError = "Error en bd";
    }
  }catch(Exception $e){
    //Enviar el error específico a la bitácora de php (dentro de php\logs\php_error_log
    error_log($e->getFile()." ".$e->getLine()." ".$e->getMessage(),0);
    $sErr = "Error en base de datos, comunicarse con el administrador".$e->getFile()." ".$e->getLine()." ".$e->getMessage();
  }

  }else{
    echo "ALGO NO LLEGA";
  }
    

  if ($sErr == "")
		header("Location: listaclientes.php");
	else
		echo $sErr;
	exit();
 ?>
