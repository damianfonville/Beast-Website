<?php
include("../configs/include.php");

$tpl = new TemplatePower("succes");
$tpl->prepare();


$head->printToScreen();
$tpl->printToScreen();

include("../configs/foot.php");