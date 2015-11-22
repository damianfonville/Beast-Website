<?php
include("../configs/include.php");

$tpl = new TemplatePower("checkout");
$tpl->prepare();

if(isset($_POST['submit'])){

$uid = User::getinfo("uid");
$cart = $_SESSION['cart'];
$date = date("Y-m-d H:i:s");


    $factuur = $db->prepare("INSERT INTO factuur (uid, date) VALUES (:uid, :date)");
    $factuur->bindParam(':uid', $uid, PDO::PARAM_INT);
    $factuur->bindParam(':date', $date, PDO::PARAM_STR);
    $factuur->execute();

   $lastid = $db->lastInsertId();


    foreach($cart as $pid => $aantal) {
        $item = $db->prepare("INSERT INTO factuur_product (fid, pid, aantal) VALUES (:fid, :pid, :aantal)");
        $item->bindParam(':fid', $lastid, PDO::PARAM_INT);
        $item->bindParam(':pid', $pid, PDO::PARAM_INT);
        $item->bindParam(':aantal', $aantal, PDO::PARAM_INT);
        $item->execute();

        $stock = $db->prepare("UPDATE stock SET stock = stock - :aantal WHERE pid=:pid AND lid=1");
        $stock->bindParam(':aantal', $aantal, PDO::PARAM_INT);
        $stock->bindParam(':pid', $pid, PDO::PARAM_INT);
        $stock->execute();

    }
    $_SESSION['cart'] = array();
    header('Location: /voltooid');

}


$head->printToScreen();
$tpl->printToScreen();
include("../configs/foot.php");

