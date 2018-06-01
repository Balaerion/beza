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
		<div class="row">
			<main class="col-sm-9">
				<div class="text-left">
					<div class="col-md-8">
						<?php		
						if(isset($_SESSION["products"]) && count($_SESSION["products"])>0) { 
						?>
							<table class="table" id="shopping-cart-results">
								<thead>
									<tr>
										<th>Product</th>
										<th>Price</th>
										<th>Quantity</th>
										<th>Subtotal</th>
										<th>&nbsp;</th>
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
												<?php echo $nombre;?>
											</td>
											<td>
												<?php echo $precio; ?>
											</td>
											<td>
												<input type="number" data-code="<?php echo $idproducto; ?>" class="form-control text-center quantity" value="<?php echo $product_qty; ?>">
											</td>
											<td>
												<?php echo sprintf("%01.2f", ($precio * $product_qty)); ?>
											</td>
											<td>
												<a href="#" class="btn btn-danger remove-item" data-code="<?php echo $idproducto; ?>">
													<i class="fa fa-trash"></i>
												</a>
											</td>
										</tr>
										<?php } ?>
										<tfoot>
											<br>
											<br>
											<tr>
												<td>
													<a href="index.php" class="btn btn-warning">
														<i class="glyphicon glyphicon-menu-left"></i> Continue Shopping</a>
												</td>
												<td colspan="2"></td>
												<?php if(isset($total)) {?>
												<td class="text-center cart-products-total">
													<strong>Total
														<?php echo sprintf("%01.2f",$total); ?>
													</strong>
												</td>
												<td>
													<a href="compra.php" class="btn btn-success btn-block">Checkout
														<i class="glyphicon glyphicon-menu-right"></i>
													</a>
												</td>
												<?php } ?>
											</tr>
										</tfoot>
										<?php } else { 	echo "Your Cart is empty";	?>
										<tfoot>
											<br>
											<br>
											<tr>
												<td>
													<a href="index.php" class="btn btn-warning">
														<i class="glyphicon glyphicon-menu-left"></i> Continue Shopping</a>
												</td>
												<td colspan="2"></td>
											</tr>
										</tfoot>
										<?php } ?>
								</tbody>
							</table>
					</div>
				</div>
			</main>
			<aside class="col-sm-3">
				<p class="alert alert-success">Add USD 5.00 of eligible items to your order to qualify for FREE Shipping. </p>
				<dl class="dlist-align">
					<dt>Total price: </dt>
					<dd class="text-right">USD 568</dd>
				</dl>
				<dl class="dlist-align">
					<dt>Discount:</dt>
					<dd class="text-right">USD 658</dd>
				</dl>
				<dl class="dlist-align h4">
					<dt>Total:</dt>
					<dd class="text-right">
						<strong>USD 1,650</strong>
					</dd>
				</dl>
				<hr>
				<figure class="itemside mb-3">
					<aside class="aside">
						<img src="images/icons/pay-visa.png">
					</aside>
					<div class="text-wrap small text-muted">
						Pay 84.78 AED ( Save 14.97 AED ) By using ADCB Cards
					</div>
				</figure>
				<figure class="itemside mb-3">
					<aside class="aside">
						<img src="images/icons/pay-mastercard.png"> </aside>
					<div class="text-wrap small text-muted">
						Pay by MasterCard and Save 40%.
						<br> Lorem ipsum dolor
					</div>
				</figure>

			</aside>
			<!-- col.// -->
		</div>

	</div>
	<!-- container .//  -->
</section>

<?php
    include_once("footer.html");
    ?>