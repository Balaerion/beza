<?php
session_start();
require_once("header.html");
require_once("inciarsesion.php");
require_once("registro.php");
require("controlador/list_art.php");
?>
<script type="text/javascript" src="js/cart.js"></script>
<br>
<br>
<section class="section-content bg padding-y">
	<header class="section-heading text-center">
		<h2 class="title-section"> Floral Ties</h2>
		<p class="lead"> Treat yourself to a floral arrangement with one of our iconic floral tiese </p>
	</header>
	<div class="container">
		<div class="row">
			<?php echo $dynamicList; ?>

		</div>
	</div>
</section>

<section class="section-name bg-white padding-y">
	<div class="container">
		<h4>Another section if needed</h4>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
			Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
			irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
			non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</div>
</section>


<?php
    include_once("footer.html");
    ?>