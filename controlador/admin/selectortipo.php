<?php
include_once("../../modelo/Tipo.php");
        $arrTipo=null;
        $Tipo = new Tipo();
        $arrTipo = $Tipo->buscarTodos();
        if ($arrTipo!=null){
            foreach($arrTipo as $oTipo){
?>
        <option><?php echo $oTipo->getTipo();?></option>
<?php
            }//foreach
        }else{
?>
      <option>No hay datos</option>
<?php
        }
?>