<?php 
 include_once("conexion.php");
    class Tipo 
    {
        private $idtipo = 0;
        private $tipo = "";

        function getIDTipo(){
            return $this->idtipo;
        }
        function getTipo(){
            return $this->tipo;
        }
        function setIDTipo($oIDTipo){
            $this->idtipo = $oIDTipo;
        }
        function setTipo($oTipo){
            $this->tipo = $oTipo;
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
                        $sQuery = "SELECT * FROM `tipo` WHERE `tipo` = $this->tipo";
                        $arrRS = $oConexion->ejecutarConsulta($sQuery);
                        $oConexion->desconectar();
                        if ($arrRS){
                            $this->idtipo = $arrRS[0][0];
                            $this->tipo = $arrRS[0][1];
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
                    if ($this->tipo == "")
                        throw new Exception("Productos->insertar(): faltan datos");
                    else{
                        if ($oConexion->conectar()){
                      try{
                             $sQuery = "INSERT INTO `tipo`(`idtipo`, `tipo`) VALUES (DEFAULT,'$this->tipo')";
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

        function buscarTodos(){
                $oConexion = new conexion();
                $sQuery="";
                $arrRS=null;
                $aLinea=null;
                $j=0;
                $oTipo=null;
                $arrResultado=false;
                    if ($oConexion->conectar())
                    {
                        $sQuery = "SELECT * FROM `tipo`	ORDER BY idtipo";
                        $arrRS = $oConexion->ejecutarConsulta($sQuery);
                        $oConexion->desconectar();
                        if ($arrRS)
                        {
                            foreach($arrRS as $aLinea)
                            {
                                $oTipo = new Tipo();
                                $oTipo->setIDTipo($aLinea[0]);
                                $oTipo->setTipo($aLinea[1]);
                                            $arrResultado[$j] = $oTipo;
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