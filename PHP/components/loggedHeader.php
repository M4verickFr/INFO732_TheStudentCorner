<link rel="stylesheet" type="text/css" href="./css/panel.css"/>

<div class="banner">
	<img src="./images/banner.jpg">
	<?php print("<h2>Espace ".$espaces[get_role()]."</h2>");?>
</div>

<?php 
	print("<div class='logged_menu'>");
	foreach($onglets[get_role()] as $name => $href) {
		echo "<a class='onglet' href='$href'>$name</a>";
	}
	print("</div>");
?>