<?php 
  include_once("header.php");
?>
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Total</th>
                  <th>Subtotal</th>
                  <th>Date</th>
                  <th>IDCliente</th>
                </tr>
              </thead>

              <tbody>
        <?php
        include_once("../../modelo/Ventas.php");
        $arrVentas=null;
        $Ventas = new Ventas();
        $arrVentas = $Ventas->buscarTodos();
        ?>
<?php
  if ($arrVentas!=null){
    foreach($arrVentas as $oVentas){
?>      <tr>
        <td class="llave"><?php echo $oVentas->getIDVenta(); ?></td>
        <td><?php echo $oVentas->getTotal(); ?></td>
        <td><?php echo $oVentas->getSubtotal(); ?></td>   
        <td><?php echo $oVentas->getFecha(); ?></td>
        <td><?php echo $oVentas->getIDcliente_usuario(); ?></td>
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