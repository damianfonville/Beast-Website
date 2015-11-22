<?php

include("../../configs/include.php");

$tpl = new TemplatePower("api/stock");
$tpl->prepare();

$qstock = $db->prepare("SELECT stock.stock, location.name FROM stock INNER JOIN location ON stock.lid=location.lid WHERE pid = ?");
    $qstock->bindValue(1, $_GET["pid"]);
    $qstock->execute();

    $labels = array();
    $data = array();

    while($stocks = $qstock->fetch(PDO::FETCH_ASSOC))
    {
        $labels[] = '"'.$stocks["name"].'"';
        $data[] = $stocks["stock"];
    }

    $labelsstring = implode(",", $labels);
    $datastring = implode(",", $data);



$tpl->assign("labels", $labelsstring);
$tpl->assign("data", $datastring);

$tpl->printToScreen();