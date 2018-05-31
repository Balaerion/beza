<?php
require_once("modelo/producto_m.php");
    $dynamicList = "";
if ($productCount > 0) {
	while($row = mysqli_fetch_array($productos)){ 
		$src=$row["foto"];
		$nom=$row["nombre"];
		$prc=$row["precio"];
		$id=$row["idproducto"];
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
								<div class="img-small-wrap">
									<div class="item-gallery">
										<img src="images/items/1.jpg">
									</div>
									<div class="item-gallery">
										<img src="images/items/2.jpg">
									</div>
									<div class="item-gallery">
										<img src="images/items/3.jpg">
									</div>
									<div class="item-gallery">
										<img src="images/items/4.jpg">
									</div>
								</div>
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
								<dl class="row">
									<dt class="col-sm-3">Model#</dt>
									<dd class="col-sm-9">12345611</dd>

									<dt class="col-sm-3">Color</dt>
									<dd class="col-sm-9">Black and white </dd>

									<dt class="col-sm-3">Delivery</dt>
									<dd class="col-sm-9">Russia, USA, and Europe </dd>
								</dl>								
								<a href="#" class="btn  btn-warning"> Buy now </a>
								<a href="#" class="btn  btn-outline-warning">
									<i class="fas fa-shopping-cart"></i> Add to cart </a>
							</article>
						</aside>
					</div>
				</div>';
    }
} else {
	$dynamicList = "Error 404 not found";
}
?>