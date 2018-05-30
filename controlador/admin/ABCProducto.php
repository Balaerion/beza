<?php
  include_once("../../modelo/Productos.php");
  include_once("../uploader.php");
  $oProducto = new Productos();
  $sErr="";
  if (isset($_POST["txtOpe"]) && !empty($_POST["txtOpe"])){
			$sOpe = $_POST["txtOpe"]; 
      
      if ($sOpe == "a" || $sOpe == "c"){
      $oProducto->setNombre($_POST["Name"]);
      $oProducto->setPrecio($_POST["Price"]);
      $oProducto->setTipo($_POST["Type"]);
      $oProducto->setCantidad($_POST["Quantity"]);
      if ($sOpe == "c") {
        if(isset($_POST["txtID"]) && !empty($_POST["txtID"])){
          $oProducto->setIDProducto($_POST["txtID"]);
        }
      }        
    }else if ($sOpe == "b"){
      if(isset($_POST["txtID"]) && !empty($_POST["txtID"])){
        $oProducto->setIDProducto($_POST["txtID"]);
      } 
    }
  try{
    if ($sOpe == 'a')
    {
      $nResultado = $oProducto->insertar();
      $oProducto->buscar();
      UploadFiles($oProducto->getNombre(),$oProducto->getIDProducto());
    }
    else if ($sOpe == 'b'){
      DeleteFiles($_POST["txtID"]);
      $nResultado = $oProducto->borrar();      
    }
    else
      $nResultado = $oProducto->modificar();

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
		header("Location: listaproductos.php");
	else
		echo $sErr;
	exit();
 ?>
