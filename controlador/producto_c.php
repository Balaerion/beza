<?php
require_once("modelo/producto_m.php");
    $dynamicList = "";
if ($productCount > 0) {
	while($row = mysqli_fetch_array($productos)){ 
		$src=$row["foto"];
		$nom=$row["nombre"];
		$prc=$row["precio"];
		$id=$row["idproducto"];
		$qty=$row["cantidad"];
		$dynamicList .= '<div class="card">
					<div class="row no-gutters">
						<aside class="col-sm-5 border-right">
							<article class="gallery-wrap">
								<div class="img-big-wrap">
									<div>
										<a href="'.$src.''.$nom.'0.jpg" data-fancybox="">
											<img src="'.$src.''.$nom.'0.jpg">
										</a>
									</div>
								</div>
								<!-- slider-product.// -->
								
								<!-- slider-nav.// -->
							</article>
							<!-- gallery-wrap .end// -->
						</aside>
						<aside class="col-sm-7">
							<article class="p-5">
								<h3 class="title mb-3">'.$nom.'</h3>

								<div class="mb-3">
									<var class="price h3 text-warning">
										<span class="currency">US $</span>
										<span class="num">'.$prc.'</span>
									</var>
									<span>/each</span>
								</div>
								<dl>
									<dt>Description</dt>
									<dd>
										<p>Here goes description consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
											aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco </p>
									</dd>
								</dl>
								<form class="product-form">
									<input name="idproducto" type="hidden" value="'.$id.'">
									<input name="product_qty" type="number" min="1" max="'.$qty.'" value="1">
									<button type="submit" href="#" class="btn btn-warning btn-lg btn-block">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</form>							
							</article>
						</aside>
					</div>
				</div>';
    }
} else {
	$dynamicList = "Error 404 not found";
}
?>