<?php

include("../../configs/include.php");

User::isAdmin(true);

$head->newBlock("customcss");
$head->assign("href", "bootstrap/css/edit.css");

$tpl = new TemplatePower("admin/products");
$tpl->prepare();

if(isset($_GET["pid"]) && isset($_GET['delete'])){
    $tpl->newBlock("delete");
    try {
        $delete = $db->prepare("DELETE FROM product WHERE pid=:pid;DELETE FROM reviews WHERE pid=:pid;DELETE FROM stock WHERE pid=:pid");
        $delete->bindValue(":pid", $_GET['pid']);
        $delete->execute();
    header('Location: /beheer/producten');


    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}

if(isset($_POST['add']))
{

    $tpl->newBlock("edited");
    try {
        $update = $db->prepare("INSERT INTO product (name, brand, price, details, category, image) VALUES (:name, :brand, :price, :details, :category, :image)");
        $update->bindValue(":name", $_POST['name'], PDO::PARAM_STR);
        $update->bindValue(":brand", $_POST['brand'], PDO::PARAM_STR);
        $update->bindValue(":price", $_POST['price'], PDO::PARAM_INT);
        $update->bindValue(":details", $_POST['details'], PDO::PARAM_STR);
        $update->bindValue(":category", $_POST['cat'], PDO::PARAM_STR);
        $file =  file_get_contents($_FILES['img']['tmp_name']);
        $update->bindValue(":image", $file, PDO::PARAM_INT);

        $update->execute();

        $lastid = $db->lastInsertId();

        $loc = $db->query("SELECT lid FROM location");

        while($lid = $loc->fetch()[0]){
            echo $lid;
            $stock = $db->prepare("INSERT INTO stock (pid, lid, stock) VALUES (:pid, :lid, :stock)");

            $stock->bindValue(":pid", $lastid, PDO::PARAM_INT);
            if($lid == 1) {
                $stock->bindValue(":stock", $_POST['stock'], PDO::PARAM_INT);
                $stock->bindValue(":lid", 1, PDO::PARAM_INT);
            }
            else{
                $rnd = rand(0, 10);
                $stock->bindValue(":stock", $rnd , PDO::PARAM_INT);
                $stock->bindValue(":lid", $lid , PDO::PARAM_INT);
            }


            $stock->execute();
        }



    }
    catch(PDOException $e){
        echo $e->getMessage();
    }


    }
elseif(isset($_GET['add']))
{
    $tpl->newBlock("add");

}
elseif(isset($_POST['pid']) && isset($_GET['edit'])){
    $tpl->newBlock("edited");
    try {
        $update = $db->prepare("UPDATE product SET name=:name, brand=:brand, price=:price, details=:details, category=:category WHERE pid =:pid; UPDATE stock SET stock=:stock WHERE pid=:spid AND lid=1;");
        $update->bindValue(":name", $_POST['name'], PDO::PARAM_STR);
        $update->bindValue(":brand", $_POST['brand'], PDO::PARAM_STR);
        $update->bindValue(":price", $_POST['price'], PDO::PARAM_INT);
        $update->bindValue(":details", $_POST['details'], PDO::PARAM_STR);
        $update->bindValue(":category", $_POST['cat'], PDO::PARAM_STR);
        $update->bindValue(":pid", $_POST['pid'], PDO::PARAM_INT);
        $update->bindValue(":stock", $_POST['stock'], PDO::PARAM_INT);
        $update->bindValue(":spid", $_POST['pid'], PDO::PARAM_INT);

        $update->execute();

        $update->closeCursor();

    if(isset($_FILES['img']) && $_FILES['img']['error'] == 0)
    {

        $file =  file_get_contents($_FILES['img']['tmp_name']);

        $image = $db->prepare("UPDATE product SET image=:image WHERE pid=:pid", array(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true));

        $image->bindValue(":pid", $_POST['pid'], PDO::PARAM_INT);
        $image->bindValue(":image", $file, PDO::PARAM_STR);
        $image->execute();
    }
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}
elseif(isset($_GET["pid"]) && isset($_GET['edit'])){
    $product = Products::getProduct($_GET['pid']);
$tpl->newBlock("edit");
    $tpl->assign("pid", $product["pid"]);
    $tpl->assign("name", $product["name"]);
    $tpl->assign("price", $product["price"]);
    $tpl->assign("stock", $product["stock"]);
    $tpl->assign("details", $product["details"]);
    $tpl->assign("cat", $product["category"]);
    $tpl->assign("brand", $product["brand"]);
}
else
{
    $tpl->newBlock("products");
    $products = $db->query("SELECT stock.stock, product.* FROM product INNER JOIN stock ON product.pid=stock.pid WHERE lid=1");

    while($product = $products->fetch(PDO::FETCH_ASSOC)) {
        $tpl->newBlock("product");
        $tpl->assign("pid", $product["pid"]);
        $tpl->assign("name", $product["name"]);
        $tpl->assign("price", $product["price"]);
        $tpl->assign("stock", $product["stock"]);
    }
}

$head->printToScreen();
$tpl->printToScreen();

include("../../configs/foot.php");