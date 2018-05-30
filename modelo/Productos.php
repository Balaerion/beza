<?php
  include_once("conexion.php");
  /**
   *
   */
  class Productos
  {
    private $idproducto = 0;
    private $nombre = "";
    private $precio = "";
    private $tipo = "";
	private $cantidad = "";

	function setIDProducto($tIDProducto){
		$this->idproducto = $tIDProducto;
	}
	function setNombre($Nombre){
		$this->nombre = $Nombre;
	}
	function setPrecio($TPrecio){
		$this->precio = $TPrecio;
	}
	function setTipo($TTipo){
		$this->tipo = $TTipo;
	}
	function setCantidad($TCantidad){
		$this->cantidad = $TCantidad;
	}

	function getIDProducto(){
		return $this->idproducto;
	}
	function getNombre(){
		return $this->nombre;
	}
	function getPrecio(){
		return $this->precio;
	}
	function getTipo(){
		return $this->tipo;
	}
	function getCantidad(){
		return $this->cantidad;
	}

	function buscar(){
		$oConexion = new conexion();
		$sQuery="";
		$arrRS=null;
		$bRet = false;
			if ($this->nombre == "")
				throw new Exception("Productos->buscar(): faltan datos");
			else{
				if ($oConexion->conectar()){
					$sQuery = "SELECT * FROM `producto` WHERE nombre = '$this->nombre'";
					$arrRS = $oConexion->ejecutarConsulta($sQuery);
					$oConexion->desconectar();
					if ($arrRS){
						$this->idproducto = $arrRS[0][0];
						$this->nombre = $arrRS[0][1];
						$this->precio = $arrRS[0][2];
						$this->tipo = $arrRS[0][3];
						$this->cantidad = $arrRS[0][4];
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
  		if ($this->nombre == "" OR $this->precio == "" OR $this->tipo == "" OR $this->cantidad <= -1)
  			throw new Exception("Productos->insertar(): faltan datos");
  		else{
  			if ($oConexion->conectar()){
            try{
  		 		$sQuery = "INSERT INTO `producto`(`idproducto`, `nombre`, `precio`, `tipo`, `cantidad`) 
				   VALUES (DEFAULT,'$this->nombre','$this->precio',(SELECT `idtipo` FROM `tipo` WHERE `tipo` = '$this->tipo'),'$this->cantidad')";
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
  		if ($this->idproducto == "" OR $this->nombre == "" OR $this->precio == "" OR $this->tipo == "" OR $this->cantidad <= -1)
  			throw new Exception("PersonalHospitalario->modificar(): faltan datos");
  		else{
  			if ($oConexion->conectar()){
  		 		$sQuery = "UPDATE `producto` SET `nombre`='$this->nombre',`precio`='$this->precio',`tipo`=(SELECT `idtipo` FROM `tipo` WHERE `tipo` = '$this->tipo'),`cantidad`= '$this->cantidad' WHERE `idproducto`='$this->idproducto'";
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
  		if ($this->idproducto==0)
  			throw new Exception("Producto->borrar(): faltan datos");
  		else{
  			if ($oConexion->conectar()){
  		 		$sQuery = "DELETE FROM `producto`
  							WHERE idproducto = $this->idproducto";
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
			$oProducto=null;
			$arrResultado=false;
				if ($oConexion->conectar())
				{
					$sQuery = "SELECT `idproducto`, `nombre`, `precio`, `tipo`.`tipo`, `cantidad` FROM `producto` INNER JOIN `tipo` WHERE `tipo`.`idtipo` = `producto`.`tipo` ORDER BY idproducto";
					$arrRS = $oConexion->ejecutarConsulta($sQuery);
					$oConexion->desconectar();
					if ($arrRS)
					{
						foreach($arrRS as $aLinea)
						{
							$oProducto = new Productos();
							$oProducto->setIDProducto($aLinea[0]);
							$oProducto->setNombre($aLinea[1]);
							$oProducto->setPrecio($aLinea[2]);
							$oProducto->setTipo($aLinea[3]);
							$oProducto->setCantidad($aLinea[4]);
										$arrResultado[$j] = $oProducto;
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
