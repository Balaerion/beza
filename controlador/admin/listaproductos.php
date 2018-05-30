
<?php 
  include_once("header.html");
?>
          <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal2">
            <i class="fa fa-fw fa-plus-square"></i> ADD PRODUCT
          </button>
          <br><br>
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
        <select class="form-control" name="Type" id="exampleFormControlSelect1">
        <option selected><?php echo $oProduc->getTipo();?></option>
        <?php
        include("selectortipo.php");
        ?>
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

          
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel2">New Product</h5>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  <form action="ABCProducto.php" enctype="multipart/form-data" method="post">
    <input type="hidden" name="txtOpe">
  <div class="modal-body">
    <div class="form-group">
      <label for="exampleFormControlInput1">Name</label>
      <input class="form-control" id="exampleFormControlInput1" name="Name" placeholder="Nombre del Articulo" required="required">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Price</label>
      <input class="form-control" id="exampleFormControlInput1" name="Price" placeholder="Precio del Articulo" required="required" pattern="([0-9]+|[0-9]+[.][0-9]+)">
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">Type</label>
      <select class="form-control" name="Type" id="exampleFormControlSelect1">
      <?php
        include("selectortipo.php");
      ?>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">Quantity</label>
      <input class="form-control" id="exampleFormControlInput1" name="Quantity" placeholder="Cantidad en inventario" required="required"  pattern="[0-9]+">
    </div>
    <div class="custom-file">
      <input type="file" class="custom-file-input" name="file_img[]" multiple  id="customFile" required="required">
      <label class="custom-file-label" for="customFile">Choose file</label>
    </div>
  </div>
  <div class="modal-footer">
    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
    <button type="submit" class="btn btn-primary" type="button" onClick="txtOpe.value='a'" >Register</button>
  </div>
  </form>
</div>
</div>
</div>

<?php 
  include_once("footer.html");
?>