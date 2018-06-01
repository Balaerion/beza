<?php
session_start();
require_once("header.php");
require_once("inciarsesion.php");
require_once("registro.php");
require_once("config.inc.php")
?>
<script type="text/javascript" src="js/cart.js"></script>
<br>
<br>
<section class="section-content bg padding-y border-top">
    <div class="container">
        <header class="section-heading text-center">
            <h2 class="title-section"> Cart</h2>
            <p class="lead"> </p>
        </header>
        <?php		
            if(isset($_SESSION["products"]) && count($_SESSION["products"])>0) { 
        ?>
        <div class="row">
            <main class="col-sm-9">
                <div class="card">
                    <table class="table table-hover shopping-cart-wrap" id="shopping-cart-results">
                        <thead class="text-muted">
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col" width="120">Quantity</th>
                                <th scope="col" width="120">Total</th>
                                <th scope="col" class="text-right" width="200">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $cart_box = '<ul class="cart-products-loaded">';
                            $total = 0;
                            foreach($_SESSION["products"] as $product){					
                                $nombre = $product["nombre"]; 
                                $precio = $product["precio"];
                                $idproducto = $product["idproducto"];
                                $product_qty = $product["product_qty"];
                                $subtotal = ($precio * $product_qty);
                                $total = ($total + $subtotal);
                            ?>
                            <tr>
                                <td>
                                    <figure class="media">
                                        <figcaption class="media-body">
                                            <h5 class="title text-truncate"><?php echo $nombre;?> </h5>
                                            <dl class="dlist-inline small">
                                                <dt>ID: </dt>
                                                <dd><?php echo $idproducto;?></dd>
                                            </dl>
                                            <dl class="dlist-inline small">
                                                <dt>Price: </dt>
                                                <dd>$<?php echo $precio;?></dd>
                                            </dl>
                                        </figcaption>
                                    </figure>
                                </td>
                                <td>
                                    <input type="number" data-code="<?php echo $idproducto; ?>" class="form-control text-center quantity" value="<?php echo $product_qty; ?>">
                                </td>
                                <td>
                                    <div class="price-wrap">
                                         <var class="price">USD <?php echo sprintf("%01.2f", ($precio * $product_qty)); ?></var>
                                    </div>
                                    <!-- price-wrap .// -->
                                </td>
                                <td class="text-right">
                                    <a href="#" class="btn btn-danger remove-item" data-code="<?php echo $idproducto; ?>">
                                        <i class="fa fa-trash"></i>
                                        Remove
									</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- card.// -->
            </main>
            <?php if(isset($total)) {?>
            <aside class="col-sm-3">
                <dl class="dlist-align h4">
                    <dt>Total:</dt>
                    <dd class="text-right">
                        <strong>USD <?php echo sprintf("%01.2f",$total); ?></strong>
                    </dd>
                </dl>
                <hr>
                <a type="submit" href="compra.php" class="btn btn-outline-success btn-lg btn-block">
                    <i class="fa fa-shopping-cart"></i>
                    Checkout
                </a>
                <a href="floral.php" class="btn btn-warning btn-lg btn-block">
                    Continue shopping
                </a>
            </aside>
            <?php } ?>
            
            <!-- col.// -->
        </div>
        <?php } else { 	echo "Your Cart is empty";	?>
            <br>
            <br>
            <a href="index.php" class="btn btn-warning btn-lg">
                <i class="glyphicon glyphicon-menu-left"></i> Continue Shopping
            </a>
        <?php } ?>
    </div>
    <!-- container .//  -->
</section>

<?php
    include_once("footer.html");
    ?>