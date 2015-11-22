<?php

include ("../configs/include.php");

User::checklogin(true);
//include("classes/user.php");
$tpl = new TemplatePower("facture");
$tpl->prepare();

if(isset($_GET['fid'])) {
    $exsist = false;

    $user = $db->prepare("SELECT  * FROM factuur WHERE fid = ? AND uid = ?");
    $user->bindValue(1, $_GET['fid'], PDO::PARAM_INT);
    $user->bindValue(2, User::getinfo("uid"), PDO::PARAM_INT);
    $user->execute();
    if ($user->rowCount() == 1) $exsist = true;

    if (isset($_GET["fid"]) && $exsist) {
        $tpl->newBlock("cart");

        $user = $db->prepare("SELECT  * FROM factuur_product INNER JOIN product ON factuur_product.pid = product.pid INNER JOIN stock ON product.pid=stock.pid WHERE lid=1 AND factuur_product.fid = ?");
        $user->bindValue(1, $_GET['fid'], PDO::PARAM_INT);
        $user->execute();
        $cart = $user->fetchAll(PDO::FETCH_ASSOC);

        $subtotal = 0;

        foreach ($cart as $product) {
            $name = $product['name'];
            $price = number_format($product["price"], 2, ',', ' ');
            $total = number_format(($product["price"] * $product["aantal"]), 2, ',', ' ');
            $subtotal += ($product["price"] * $product["aantal"]);
            $tpl->newBlock("item");
            $tpl->assign("name", $name);
            $tpl->assign("id", $product['pid']);
            $tpl->assign("brand",  $product["brand"]);
            $tpl->assign("price", $price);
            $tpl->assign("value", $product["aantal"]);
            $tpl->assign("total", $total);
            $tpl->assign("image", base64_encode($product["image"]));
            if ($product["stock"] > 0)
                $tpl->assign("stock", "<span class=\"text-success\"><strong>Op voorraad</strong>");
            else
                $tpl->assign("stock", "<span class=\"text-warning\"><strong>binnen 2-3 weken leverbaar</strong>");


        }
        $tpl->gotoBlock("cart");
        $tpl->assign("subtotal", number_format($subtotal, 2, ',', ' '));
        $shipping = 0;
        if ($subtotal > 20) {
            $tpl->assign("shipping", "gratis");
        } else {
            $shipping = 2.00;
            $tpl->assign("shipping", "&euro;2,00");
        }

        $globaltotal = $subtotal + $shipping;

        $tpl->assign("globaltotal", number_format($globaltotal, 2, ',', ' '));




    } else $tpl->newBlock("error");

}
else
{
    $factures = $db->prepare("SELECT  * FROM factuur WHERE uid = ?");
    $factures->bindValue(1, User::getinfo("uid"), PDO::PARAM_INT);
    $factures->execute();
    if (!$factures->rowCount() == 1) $tpl->newBlock("empty");
    else
    {
        $tpl->newBlock("factures");
        while($facture = $factures->fetch())
        {
            $tpl->newBlock("facture");
            $tpl->assign("fid", $facture['fid']);
            $tpl->assign("name", User::getName());
            $tpl->assign("date", $facture['date']);

            $total = $db->prepare("SELECT SUM(price*aantal) AS total FROM factuur_product INNER JOIN product ON factuur_product.pid=product.pid WHERE fid = ?");
            $total->bindValue(1, $facture['fid'], PDO::PARAM_INT);
            $total->execute();
            $fetch = $total->fetch();
            $tpl->assign("total", $fetch[0]);
        }
    }

}


$head->printToScreen();
$tpl->printToScreen();



include("../configs/foot.php");
?>