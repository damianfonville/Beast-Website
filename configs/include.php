<?php
session_start();

$root = $_SERVER["DOCUMENT_ROOT"];

include($root."/configs/config.php");
include($root."/template parser/class.TemplatePower.inc.php");
include($root."/classes/user.php");
include($root."/classes/products.php");
include($root."/classes/reviews.php");

include("head.php");


