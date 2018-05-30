<?php
  include_once("conexion.php");
  /**
   *
   */
  class Usuario
  {
    private $idusuario = 0;
    private $passw = "";
    private $usuario = "";
    private $tipo = "";


    function getIDusuario (){
      return $this->idusuario;
    }
    function getPassw (){
      return $this->passw;
    }
    function getUsuario (){
      return $this->usuario;
    }
    function getTipo (){
      return $this->tipo;
    }

    function setIDusuario ($setIDusuario){
      $this->idusuario = $setIDusuario;
    }
    function setPassw ($setPassw){
      $this->passw = $setPassw;
    }
    function setUsuario ($setUsuario){
      $this->usuario = $setUsuario;
    }
    function setTipo ($setTipo){
      $this->Tipo = $setTipo;
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
            $sQuery = "SELECT * FROM `usuario` WHERE `usuario`=$this->usuario  AND `passwd`= $this->passw";
            $arrRS = $oConexion->ejecutarConsulta($sQuery);
            $oConexion->desconectar();
            if ($arrRS){
              $this->idusuario = $arrRS[0][0];
              $this->passw = $arrRS[0][1];
              $this->usuario = $arrRS[0][2];
              $this->tipo = $arrRS[0][3];
              $bRet = true;
            }
          } 
        }
        return $bRet;
      }

    function insertar(){
      $oConexion = new conexion();
      $sQuery="";
      $nAfectados=-1;
        if ($this->passw == "" OR $this->usuario == "" OR $this->tipo == "" )
          throw new Exception("Fotos->insertar(): faltan datos");
        else{
          if ($oConexion->conectar()){
              try{
             $sQuery = "INSERT INTO `usuario`(`idusuario`, `passwd`, `usuario`, `tipo`)
                        VALUES
                        (DEFAULT,'$this->passw','$this->usuario','$this->tipo')";
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
      /*
      function modificar(){
      $oConexion = new conexion();
      $sQuery="";
      $nAfectados=-1;
        if ($this->idFoto == "" OR $this->nombre == "" OR $this->precio == "" OR $this->tipo == "" OR $this->cantidad <= -1)
          throw new Exception("PersonalHospitalario->modificar(): faltan datos");
        else{
          if ($oConexion->conectar()){
             $sQuery = "UPDATE `Foto` SET `nombre`=$this->nombre,`precio`=$this->precio,`tipo`=$this->tipo,`cantidad`= $this->cantidad WHERE `idFoto`=$this->idFoto";
            $nAfectados = $oConexion->ejecutarComando($sQuery);
            $oConexion->desconectar();
          }
        }
        return $nAfectados;
      }
      */
      function borrar(){
      $oConexion = new conexion();
      $sQuery="";
      $nAfectados=-1;
        if ($this->idproducto == 0)
          throw new Exception("Foto->borrar(): faltan datos");
        else{
          if ($oConexion->conectar()){
             $sQuery = "DELETE FROM `usuario` WHERE idusuario = $this->idusuario";
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
        $oUsuario=null;
        $arrResultado=false;
            if ($oConexion->conectar())
            {
                $sQuery = "SELECT * FROM `usuario` ORDER BY `idusuario`";
                $arrRS = $oConexion->ejecutarConsulta($sQuery);
                $oConexion->desconectar();
                if ($arrRS)
                {
                    foreach($arrRS as $aLinea)
                    {
                        $oUsuario = new Usuario();
                        $oUsuario->setIDusuario($aLinea[0]);
                        $oUsuario->setPassw($aLinea[1]);
                        $oUsuario->setUsuario($aLinea[2]);
                        $oUsuario->setTipo($aLinea[3]);
                                    $arrResultado[$j] = $oUsuario;
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