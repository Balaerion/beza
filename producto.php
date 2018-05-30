<?php
require_once("header.html");
require_once("inciarsesion.php");
require_once("registro.php");
require_once("controlador/producto_c.php");
?>
<br>
<br>
<section class="section-content bg padding-y">
	<div class="container">
		<?php echo $dynamicList; ?>
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