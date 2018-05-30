<?php 
  include_once("header.html");
?>
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Type</th>
                  <th>Quantity</th>
                  <th>Actions</th>
                </tr>
              </thead>

              <tbody>
        <?php
        include_once("../../modelo/Productos.php");
        $arrProduc=null;
        $Produc = new Productos();
        $arrProduc = $Produc->buscarTodos();
        ?>
<?php
  if ($arrProduc!=null){
    foreach($arrProduc as $oProduc){
?>      <tr>
        <form action="ABCProducto.php" method="post">
        <td class="llave"><?php echo $oProduc->getIDProducto(); ?></td>
        <td><input class="form-control" id="exampleFormControlInput1" name="Name" placeholder="Nombre del Articulo" value = "<?php echo $oProduc->getNombre();?>" required="required"></td>
        <td><input class="form-control" id="exampleFormControlInput1" name="Price" placeholder="Precio del Articulo" value = "<?php echo $oProduc->getPrecio();?>" required="required" pattern="([0-9]+|[0-9]+[.][0-9]+)"></td>
        <td>
        <select class="form-control" name="Type" value = "<?php echo $oProduc->getTipo();?>" id="exampleFormControlSelect1">
                <option>Corbata</option>
                <option>Moño</option>
              </select>
        </td>
        <td><input class="form-control" id="exampleFormControlInput1"  name="Quantity" value = "<?php echo $oProduc->getCantidad();?>" placeholder="Cantidad en inventario" required="required"  pattern="[0-9]+"></td>
        <td>                          
          <input type="hidden" name="txtID">
          <input type="hidden" name="txtOpe">
          <button class="btn btn-warning btn-sm" onClick="txtID.value=<?php echo $oProduc->getIDProducto();?>;txtOpe.value='c'" type="submit"><i class="fa fa-fw fa-edit"></i></button>
          <button class="btn btn-danger btn-sm" onClick="txtID.value=<?php echo $oProduc->getIDProducto();?>;txtOpe.value='b'" type="submit"><i class="fa fa-fw fa-trash"></i></button>
        </td>
        </form>
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