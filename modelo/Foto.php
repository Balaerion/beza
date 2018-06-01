<?php
  include_once("conexion.php");
  /**
   *
   */
  class Foto
  {
    private $idFoto = 0;
    private $nombre = "";
    private $foto = "img/";
    private $idproducto = 0;


	function setNombre($Nombre){
		$this->nombre = $Nombre;
	}
	function setidproducto($Tidproducto){
		$this->idproducto = $Tidproducto;
	}

	function getIDFoto(){
		return $this->idFoto;
	}
	function getNombre(){
		return $this->nombre;
	}
	function getfoto(){
		return $this->foto;
	}
	function getidproducto(){
		return $this->idproducto;
	}


    function insertar(){
  	$oConexion = new conexion();
  	$sQuery="";
  	$nAfectados=-1;
  		if ($this->nombre == "" OR $this->idproducto == 0)
  			throw new Exception("Fotos->insertar(): faltan datos");
  		else{
  			if ($oConexion->conectar()){
            try{
  		 		$sQuery = "INSERT INTO `foto`(`idfoto`, `nombre`, `foto`, `producto_idproducto`) VALUES (DEFAULT,'$this->nombre','$this->foto',$this->idproducto)";
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
  		 		$sQuery = "DELETE FROM `foto`	WHERE `producto_idproducto` = $this->idproducto";
  				$nAfectados = $oConexion->ejecutarComando($sQuery);
  				$oConexion->desconectar();
  			}
  		}
  		return $nAfectados;
  	}
		
	}



?>