<?php

include("configs/include.php");

$head->newBlock("customjs");
$head->assign("href", "js/homepage.js");

$tpl = new TemplatePower("homepage");

$tpl->prepare();


		$lastfour = Products::lastFour();

		foreach($lastfour as $product)
		{
			$tpl->newBlock("latest");
			$tpl->assign("image", base64_encode($product["image"]));
			$tpl->assign("name", $product["name"]);
			$tpl->assign("id", $product["pid"]);
			$desc = explode(".", $product["details"], 2);
			$tpl->assign("desc", htmlentities($desc[0], ENT_COMPAT, "ISO-8859-1"));
		}

//print all
$head->printToScreen();
$tpl->printToScreen();


include("configs/foot.php");