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
			<h2 class="title-section"> Checkout</h2>
			<p class="lead"> </p>
		</header>
		<?php
if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){
	$total = 0;
	$list_tax = '';
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
					$cart_box = '';
					foreach($_SESSION["products"] as $product){
						$nombre = $product["nombre"];
						$product_qty = $product["product_qty"];
						$precio = $product["precio"];
						$idproducto = $product["idproducto"];
						$item_price = sprintf("%01.2f",($precio * $product_qty)); 		
						?>
						<tr>
							<td>
								<?php echo $nombre;?>
							</td>
							<td>
								<?php echo $precio; ?>
							</td>
							<td>
								<?php echo $product_qty; ?>
							</td>
							<td>
								<?php echo sprintf("%01.2f", ($precio * $product_qty)); ?>
							</td>
							<td>&nbsp;</td>
						</tr>
						<?php		
							$subtotal = ($precio * $product_qty);
							$total = ($total + $subtotal);

						}	
						$grand_total = $total + $shipping_cost;
						foreach($taxes as $key => $value){
								$tax_amount = round($total * ($value / 100));
								$tax_item[$key] = $tax_amount;
								$grand_total = $grand_total + $tax_amount; 
						}	
						foreach($tax_item as $key => $value){
							$list_tax .= $key. ' : '.  sprintf("%01.2f", $value).'<br />';
						}
						$_SESSION['grandtotal'] = $grand_total;
						$_SESSION['subtotal'] = $total;	
						$shipping_cost = ($shipping_cost)?'Shipping Cost : '. sprintf("%01.2f", $shipping_cost).'<br />':'';	
						$cart_box .= "<span>$shipping_cost  $list_tax <hr>Payable Amount : ".sprintf("%01.2f", $grand_total)."</span>";
						

						?>
							<tfoot>
								<tr>
									<td>
										<br>
										<br>
										<br>
										<br>
										<br>
										<br>
										<a href="index.php" class="btn btn-warning">
											<i class="glyphicon glyphicon-menu-left"></i> Continue Shopping</a>
									</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td class="text-center view-cart-total">
										<strong>
											<?php echo $cart_box; ?>
										</strong>
									</td>
									<td>
										<br>
										<br>
										<br>
										<br>
										<br>
										<br>
										<a href="inventario.php" class="btn btn-success btn-block ">Place Order
											<i class="glyphicon glyphicon-menu-right"></i>
										</a>
									</td>
								</tr>
							</tfoot>
							<?php	
} else {
	echo "Your Cart is empty";
}
?>
				</tbody>
			</table>

	</div>
	<!-- container .//  -->
</section>

<?php
    include_once("footer.html");
    ?>