                <?php
                  include_once("../../modelo/Productos.php");
                  $arrProduc=null;
                  $Produc = new Productos();
                  $arrProduc = $Produc->buscarTodos();
                  ?>
                  <?php
                    if ($arrProduc!=null){
                      foreach($arrProduc as $oProduc){
                  ?>                   
                    <div class="modal fade" id="#exampleModalM<?php echo $oProduc->getIDProducto();?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalM<?php echo $oProduc->getIDProducto();?>Label" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalM<?php echo $oProduc->getIDProducto();?>Label">Modify Product</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <form action="ABCProducto.php" enctype="multipart/form-data" method="post">
                              <input type="hidden" name="txtOpe">
                              <input type="hidden" name="txtID">
                            <div class="modal-body">
                              <div class="form-group">
                                <label for="exampleFormControlInput1">Name</label>
                                <input class="form-control" id="exampleFormControlInput1" name="Name" placeholder="Nombre del Articulo" value = "<?php echo $oProduc->getNombre();?>" required="required">
                              </div>
                              <div class="form-group">
                                <label for="exampleFormControlInput1">Price</label>
                                <input class="form-control" id="exampleFormControlInput1" name="Price" placeholder="Precio del Articulo" value = "<?php echo $oProduc->getPrecio();?>" required="required" pattern="([0-9]+|[0-9]+[.][0-9]+)">
                              </div>
                              <div class="form-group">
                                <label for="exampleFormControlSelect1">Type</label>
                                <select class="form-control" name="Type" value = "<?php echo $oProduc->getTipo();?>" id="exampleFormControlSelect1">
                                  <option>Corbata</option>
                                  <option>Moño</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="exampleFormControlSelect1">Quantity</label>
                                <input class="form-control" id="exampleFormControlInput1"  name="Quantity" value = "<?php echo $oProduc->getCantidad();?>" placeholder="Cantidad en inventario" required="required"  pattern="[0-9]+">
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
                      }//foreach
                    }
                ?>