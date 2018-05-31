<?php
    require("modelo/listaarticulos.php");
    $dynamicList = "";

if ($productCount > 0) {
	while($row = mysqli_fetch_array($productos)){ 
		$src=$row["foto"];
		$nom=$row["nombre"];
		$prc=$row["precio"];
		$id=$row["idproducto"];
		$dynamicList .= '<div class="col-md-3">
			<figure class="card card-product">
				<div class="img-wrap">
					<img src="'.$src.''.$nom.'0.jpg">
					<a class="btn-overlay" href="producto.php?id='.$id.'">
						<i class="fa fa-search-plus"></i> Quick view</a>
				</div>
				<figcaption class="info-wrap">
					<h6 class="title text-dots">
						<a style="color:#343a40" href="producto.php?id='.$id.'">'.$nom.'</a>
					</h6>
					<div class="action-wrap"><form class="product-form">
						<input name="idproducto" type="hidden" value="'.$id.'">
						<input name="product_qty" type="hidden" value="1">
						<button type="submit" href="#" class="btn btn-warning btn-sm float-right">
							<i class="fa fa-shopping-cart"></i>
							Add to cart
						</button></form>
						<div class="price-wrap h3">
							<span class="price-new">$'.$prc.'</span>
						</div>
					</div>
				</figcaption>
			</figure>
		</div>';
    }
} else {
	$dynamicList = "We have no products listed in our store yet";
}
?>