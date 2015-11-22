<?php

include("../configs/include.php");

User::isAdmin(true);

$tpl = new TemplatePower("admin/home");

$tpl->prepare();



//print all
$head->printToScreen();
$tpl->printToScreen();


include("../configs/foot.php");