<?php
  session_start();
  require('aDatos.php');
  sleep(2);
  $usu=$_POST['na'];
  $pass=$_POST['pw'];
  $usuarios=$mysqli->query("Select usuario,tipo
                          From usuario Where usuario='".$usu."'
                        AND passwd='".$pass."'");
  if ($usuarios->num_rows==1):
    $datos= $usuarios->fetch_assoc();
      echo json_encode(array('error'=>false,'tipo'=>$datos['tipo']));
       $_SESSION['user'] = $datos['usuario'];
  else:
      echo json_encode(array('error'=>true));
  endif;
  $mysqli->close();
  ?>
