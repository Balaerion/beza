<?php

  include_once("..\modelo\conexion.php");

  $form_Name = $_POST['Name'];
  $form_FName = $_POST['FName'];
  $form_SName = $_POST['SName'];
  $form_Tel = $_POST['Tel'];
  $form_Address = $_POST['Address'];
  $form_Bank_Account = $_POST['Bank_Account'];
  $form_User = $_POST['User'];
  $form_Pass = $_POST['Password'];

  $conexion=new conexion();
  if ($conexion->conectar()){
     $query_1 = "INSERT INTO `usuario`(`idusuario`,`passwd`, `usuario`, `tipo`) VALUES (DEFAULT,'$form_Pass','$form_User','Usuario')";

     $query_2 = "INSERT INTO `cliente`(`usuario_idusuario`, `nombre`, `appat`, `apmat`, `tel`, `dir`, `banc`) VALUES ((SELECT `idusuario` FROM `usuario` WHERE `usuario` = '$form_User'),'$form_Name','$form_FName','$form_SName','$form_Tel','$form_Address','$form_Bank_Account')";
     $nAfectados = $conexion->ejecutarComando($query_1);
     $nAfectados = $conexion->ejecutarComando($query_2);
     $conexion->desconectar();
  }

?>
