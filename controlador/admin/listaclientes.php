<?php 
  include_once("header.php");
?>

<div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>First Last Name</th>
                  <th>Second Last Name</th>
                  <th>Telefon</th>
                  <th>Direction</th>
                  <th>Bank</th>
                </tr>
              </thead>
        <?php
        include_once("../../modelo/Cliente.php");
        $Clientes = new Cliente();
        $arrClientes = $Clientes->buscarTodos();
        ?>
                
        <?php
          if ($arrClientes!=null){
            foreach($arrClientes as $oClientes){
        ?>
          <tbody>
          <tr>
          <td><?php echo $oClientes->getNombre(); ?></td>
          <td><?php echo $oClientes->getAppat(); ?></td>
          <td><?php echo $oClientes->getApmat(); ?></td>
          <td><?php echo $oClientes->getTelefono(); ?></td>
          <td><?php echo $oClientes->getDireccion(); ?></td>
          <td><?php echo $oClientes->getBanco(); ?></td>      
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