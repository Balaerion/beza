<?php
  include_once("conexion.php");
  /**
   *
   */
  class Cliente
  {
    private $idusuario = 0;
    private $nombre = "";
    private $appat = "";
    private $apmat = "";
    private $tel = "";
    private $dir = "";
    private $banc = "";

    function getIDusuario (){
      return $this->idusuario;
    }
    function getNombre (){
      return $this->nombre;
    }
    function getAppat (){
      return $this->appat;
    }
    function getApmat (){
      return $this->apmat;
    }
    function getTelefono (){
      return $this->tel;
    }
    function getDireccion (){
      return $this->dir;
    }
    function getBanco (){
      return $this->banc;
    }

    function setIDusuario ($setIDusuario){
      $this->idusuario = $setIDusuario;
    }
    function setNombre ($setNombre){
      $this->nombre = $setNombre;
    }
    function setAppat ($setAppat){
      $this->appat = $setAppat;
    }
    function setApmat ($setApmat){
      $this->apmat = $setApmat;
    }
    function setTelefono ($setTelefono){
      $this->tel = $setTelefono ;
    }
    function setDireccion ($setDireccion){
      $this->dir = $setDireccion ;
    }
    function setBanco ($setBanco){
      $this->banc = $setBanco ;
    }

    function buscar(){
      $oConexion = new conexion();
      $sQuery="";
      $arrRS=null;
      $bRet = false;
        if ($this->nombre == "")
          throw new Exception("Ventas->buscar(): faltan datos");
        else{
          if ($oConexion->conectar()){
            $sQuery = "SELECT * FROM `compra` WHERE `idventa`= $this->idventa";
            $arrRS = $oConexion->ejecutarConsulta($sQuery);
            $oConexion->desconectar();
            if ($arrRS){
              $this->idusuario = $arrRS[0][0];
              $this->nombre = $arrRS[0][1];
              $this->appat = $arrRS[0][2];
              $this->apmat = $arrRS[0][3];
              $this->tel = $arrRS[0][4];
              $this->dir = $arrRS[0][5];
              $this->banc = $arrRS[0][6];
              $bRet = true;
            }
          } 
        }
        return $bRet;
      }

    function insertar($oUsuario){
      $oConexion = new conexion();
      $sQuery="";
      $nAfectados=-1;
        if ($this->nombre == "" OR $this->idproducto == 0)
          throw new Exception("Clientes->insertar(): faltan datos");
        else{
          if ($oConexion->conectar()){
              try{
             $sQuery = "INSERT INTO `cliente`(`usuario_idusuario`, `nombre`, `appat`, `apmat`, `tel`, `dir`, `banc`)
                        VALUES
                        ((SELECT `idusuario` FROM `usuario` WHERE `usuario` = '$oUsuario'),'this->$nombre','this->$nombre','this->$nombre','this->$nombre','this->$nombre','this->$nombre')";
            $nAfectados = $oConexion->ejecutarComando($sQuery);
            $oConexion->desconectar();
              }catch(Exception $e){
            //Enviar el error específico a la bitácora de php (dentro de php\logs\php_error_log
            error_log($e->getFile()." ".$e->getLine()." ".$e->getMessage(),0);
            $sErr = "Error en base de datos, comunicarse con el administrador";
          }
          }
        }
        return $nAfectados;
      }
      
      function modificar(){
      $oConexion = new conexion();
      $sQuery="";
      $nAfectados=-1;
        if ($this->idusuario == 0 
         OR $this->nombre == "" 
         OR $this->appat == "" 
         OR $this->apmat == "" 
         OR $this->tel == "" 
         OR $this->dir == "" 
         OR $this->banc =="")
          throw new Exception("Cliente->modificar(): faltan datos");
        else{
          if ($oConexion->conectar()){
             $sQuery = "UPDATE `cliente`
                        SET `nombre`= '$this->nombre',
                            `appat`= ' $this->appat',
                            `apmat`= '$this->apmat',
                            `tel`= '$this->tel',
                            `dir`= '$this->dir ',
                            `banc`= '$this->banc' 
                            WHERE `usuario_idusuario` = $this->idusuario";
            $nAfectados = $oConexion->ejecutarComando($sQuery);
            $oConexion->desconectar();
          }
        }
        return $nAfectados;
      }
      
      function borrar(){
      $oConexion = new conexion();
      $sQuery="";
      $nAfectados=-1;
        if ($this->idproducto == 0)
          throw new Exception("Cliente->borrar(): faltan datos");
        else{
          if ($oConexion->conectar()){
             $sQuery = "DELETE FROM `cliente` WHERE `usuario_idusuario` = $this->idusuario";
            $nAfectados = $oConexion->ejecutarComando($sQuery);
            $oConexion->desconectar();
          }
        }
        return $nAfectados;
      }

      function buscarTodos(){
        $oConexion = new conexion();
        $sQuery="";
        $arrRS=null;
        $aLinea=null;
        $j=0;
        $oCliente=null;
        $arrResultado=false;
            if ($oConexion->conectar())
            {
                $sQuery = "SELECT * FROM `cliente` ORDER BY `usuario_idusuario`";
                $arrRS = $oConexion->ejecutarConsulta($sQuery);
                $oConexion->desconectar();
                if ($arrRS)
                {
                    foreach($arrRS as $aLinea)
                    {
                        $oCliente = new Cliente();
                        $oCliente->setIDusuario($aLinea[0]);
                        $oCliente->setNombre($aLinea[1]);
                        $oCliente->setAppat($aLinea[2]);
                        $oCliente->setApmat($aLinea[3]);
                        $oCliente->setTelefono($aLinea[4]);
                        $oCliente->setDireccion($aLinea[5]);
                        $oCliente->setBanco($aLinea[6]);
                                    $arrResultado[$j] = $oCliente;
                        $j=$j+1;
                    }
                }
                else
                    $arrResultado = false;
            }
            return $arrResultado;
        }
  }


 ?>
