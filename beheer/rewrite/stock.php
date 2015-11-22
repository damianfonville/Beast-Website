<?php

include("../../configs/include.php");

User::isAdmin(true);

$tpl = new TemplatePower("admin/stock");

$tpl->prepare();


$qcount = $db->prepare("SELECT product.name FROM product INNER JOIN stock ON product.pid=stock.pid WHERE lid=1 AND product.pid=?");
    $qcount->bindValue(1, $_GET["pid"]);
    $qcount->execute();

if($qcount->rowCount() == 0) $tpl->newBlock("error");
else
{
    $fetch = $qcount->fetch(PDO::FETCH_ASSOC);

   $head->newBlock("customjs");
       $head->assign("href", "js/chart.js");
   $head->newBlock("customjs");
       $head->assign("href", "api/stock/".$_GET["pid"].".json");
   $head->newBlock("customjs");
       $head->assign("href", "js/stock.js");
    $tpl->newBlock("stock");
    $tpl->assign("product", $fetch["name"]);
}



//print all
$head->printToScreen();
$tpl->printToScreen();


include("../../configs/foot.php");