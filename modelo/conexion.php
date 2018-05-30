<?php
 class conexion{
    private $oConexion=null;

      function conectar(){
        $bRet = false;
        try{
          //$this->oConexion = new PDO("pgsql:dbname=ejhospdb; host=localhost; user=hospital; password=hospital1");
          $this->oConexion = new PDO("mysql:host=localhost;dbname=beza","root","",  array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"));
          $bRet = true;
        }catch(Exception $e){
          throw $e;
        }
      return $bRet;
    }


    function desconectar(){
    $bRet = true;
    if ($this->oConexion != null){
      $this->oConexion=null;
    }
    return $bRet;
    }


      function ejecutarComando($psComando){
        $nAfectados = -1;
        if ($psComando == ""){
          throw new Exception("AccesoDatos->ejecutarComando: falta indicar el comando");
        }
        if ($this->oConexion == null){
          throw new Exception("AccesoDatos->ejecutarComando: falta conectar la base");
        }
        try{
          $nAfectados =$this->oConexion->exec($psComando);
        }catch(Exception $e){
          throw $e;
        }
        return $nAfectados;
      }

      function ejecutarConsulta($psConsulta){
        $arrRS = null;
        $rst = null;
        $oLinea = null;
        $sValCol = "";
        $i=0;
        $j=0;
          if ($psConsulta == ""){
               throw new Exception("AccesoDatos->ejecutarConsulta: falta indicar la consulta");
          }
          if ($this->oConexion == null){
            throw new Exception("AccesoDatos->ejecutarConsulta: falta conectar la base");
          }
          try{
            $rst = $this->oConexion->query($psConsulta); //un objeto PDOStatement o falso en caso de error
          }catch(Exception $e){
            throw $e;
          }
          if ($rst){
            foreach($rst as $oLinea){
              foreach($oLinea as $llave=>$sValCol){
                if (is_string($llave)){
                  $arrRS[$i][$j] = $sValCol;
                  $j++;
                }
              }
              $j=0;
              $i++;
            }
          }
          return $arrRS;
        }
}
 ?>
<?php
$mysqli=new mysqli('localhost','root','','beza');
if ($mysqli->connect_errno) {
  echo "Error al conectarse con My SQL debido al error".$mysqli->connect_error;
}
 ?>