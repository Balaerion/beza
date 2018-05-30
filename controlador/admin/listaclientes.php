<?php 
  include_once("header.html");
?>

<div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Password</th>
                  <th>User Name</th>
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
        include_once("../../modelo/Usuario.php");
        $Clientes = new Cliente();
        $Usuario = new Usuario ();
        $arrClientes = $Clientes->buscarTodos();
        $arrUsuario = $Usuario->buscarTodos();
        ?>
        <tbody>        
        <?php
          if ($arrUsuario!=null AND $arrClientes!=null){
            foreach($arrUsuario as $oUsuario){
          ?>
          <tr>        
          <td class="llave"><?php echo $oUsuario->getIDusuario(); ?></td>
          <td><?php echo $oUsuario->getPassw(); ?></td>
          <td><?php echo $oUsuario->getUsuario(); ?></td>       
          <?php
              }//foreach
              foreach($arrClientes as $oClientes){
          ?>
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