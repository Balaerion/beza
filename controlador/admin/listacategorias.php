<?php 
  include_once("header.php");
?>
    <br><br>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Type</th>
                </tr>
              </thead>

              <tbody>
        <?php
        include_once("../../modelo/Tipo.php");
        $arrTipo=null;
        $Tipo = new Tipo();
        $arrTipo = $Tipo->buscarTodos();
        if ($arrTipo!=null){
            foreach($arrTipo as $oTipo){
        ?>
        <tr>
        <td><?php echo $oTipo->getIDTipo();?></td>
        <td><?php echo $oTipo->getTipo();?></td>
        </tr>
<?php
    }//foreach
  }else{
?>
    <tr>
      <td colspan="2">No hay datos</td>
    </tr>
<?php
  }
?>
              </tbody>
            </table>
          </div>
<?php 
  include_once("footer.html");
?>