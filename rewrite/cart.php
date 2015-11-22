<?php
include("../configs/include.php");
//include("classes/user.php");
$tpl = new TemplatePower("cart");
$tpl->prepare();



if(isset($_GET['add'])){
    $pid = $_GET['add'];
    if(isset($_SESSION['cart'][$pid]))
        $_SESSION['cart'][$pid]++;
    else
        $_SESSION['cart'][$pid] = 1;
    header('Location: /winkelwagen');
    exit;
}

if(isset($_GET['remove'])){
    $pid = $_GET['remove'];
    unset($_SESSION['cart'][$pid]);
    header('Location: /winkelwagen');
    exit;
}
if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $tpl->newBlock("cart");
    $cart = $_SESSION['cart'];

$subtotal = 0;

    foreach ($cart as $key => $value) {


        $product = Products::getProduct($key);
        $name = $product['name'];
        $price = number_format($product["price"], 2, ',', ' ');
        $total = number_format(($product["price"] * $value), 2, ',', ' ');
        $subtotal += ($product["price"] * $value);
        $tpl->newBlock("item");
        $tpl->assign("name", $name);
        $tpl->assign("id", $product['pid']);
        $tpl->assign("brand", $product["brand"]);
        $tpl->assign("price", $price);
        $tpl->assign("value", $value);
        $tpl->assign("total", $total);
        $tpl->assign("image", base64_encode($product["image"]));
        if($product["stock"] > 0)
        $tpl->assign("stock", "<span class=\"text-success\"><strong>Op voorraad</strong>");
        else
        $tpl->assign("stock", "<span class=\"text-warning\"><strong>binnen 2-3 weken leverbaar</strong>");
        $tpl->assign("id", $product['pid']);
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
    if(isset($_SERVER['HTTP_REFERER']))$link = $_SERVER['HTTP_REFERER']; else $link = "/";
    $tpl->assign("goto", $link);

    $data= "";
    if(User::checklogin())$link = "/checkout"; else $link = "";
    if(!User::checklogin())$data = "data-toggle=\"modal\" data-target=\"#login-modal\"";

    $tpl->assign("data", $data);
    $tpl->assign("link", $link);
}
else{
    $tpl->newBlock("empty");
}
$head->printToScreen();
$tpl->printToScreen();


include("../configs/foot.php");
?>