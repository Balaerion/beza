<?php
  include_once("conexion.php");
  /**
   *
   */
  class Ventas
  {
    private $idventa = 0;
    private $total = "";
    private $subtotal = "";
    private $fecha = null;
    private $cliente_usuario_idusuario = 0;

    function setIDVenta($IDVenta){
		$this->idventa = $IDVenta;
	}
	function setTotal($Total){
		$this->total = $Total;
	}
	function setSubtotal($Subtotal){
		$this->subtotal = $Subtotal;
    }
    function setFecha($Fecha){
		$this->fecha = $Fecha;
	}
	function setIDcliente_usuario($IDcliente_usuario){
		$this->cliente_usuario_idusuario = $IDcliente_usuario;
	}

	function getIDVenta(){
		return $this->idventa;
	}
	function getTotal(){
		return $this->total;
	}
	function getSubtotal(){
		return $this->subtotal;
	}
	function getFecha(){
		return $this->fecha;
    }
    function getIDcliente_usuario(){
        return $this->cliente_usuario_idusuario;
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
						$this->idventa = $arrRS[0][0];
						$this->total = $arrRS[0][1];
						$this->subtotal = $arrRS[0][2];
						$this->fecha = $arrRS[0][3];
						$this->cliente_usuario_idusuario = $arrRS[0][4];
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
  		if ($this->nombre == "" OR $this->idproducto == 0)
  			throw new Exception("Ventas->insertar(): faltan datos");
  		else{
  			if ($oConexion->conectar()){
            try{
  		 		$sQuery = " INSERT INTO `compra`
                                    (`idventa`, `total`, `subtotal`, `fecha`, `cliente_usuario_idusuario`)
                            VALUES  (DEFAULT,'$this->total;','$this->subtotal;','$this->fecha;',$this->cliente_usuario_idusuario)";
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
  			throw new Exception("Ventas->borrar(): faltan datos");
  		else{
  			if ($oConexion->conectar()){
  		 		$sQuery = "DELETE FROM `foto`	WHERE `producto_idproducto` = $this->idproducto";
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
        $oVentas=null;
        $arrResultado=false;
            if ($oConexion->conectar())
            {
                $sQuery = "SELECT * FROM `producto`	ORDER BY idproducto";
                $arrRS = $oConexion->ejecutarConsulta($sQuery);
                $oConexion->desconectar();
                if ($arrRS)
                {
                    foreach($arrRS as $aLinea)
                    {
                        $oVentas = new Ventas();
                        $oVentas->setIDVenta($aLinea[0]);
                        $oVentas->setTotal($aLinea[1]);
                        $oVentas->setSubtotal($aLinea[2]);
                        $oVentas->setFecha($aLinea[3]);
                        $oVentas->setIDcliente_usuario($aLinea[4]);
                                    $arrResultado[$j] = $oVentas;
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