<?php
include("../configs/include.php");
$head->newBlock("customcss");
$head->assign("href", "bootstrap/css/shop-cat.css");


$tpl = new TemplatePower("category");
$tpl->prepare();

$categorys = $db->query("SELECT category FROM product GROUP BY category");

foreach($categorys as $category){
    $tpl->newBlock("category");
        if(isset($_GET['q']) && $_GET["q"] == $category[0])
            $tpl->assign("active", "active");
        $tpl->assign("category", $category[0]);
}

if(isset($_GET['q'])){

    $dbproduct = $db->prepare("SELECT stock.stock, product.* FROM product INNER JOIN stock ON product.pid=stock.pid WHERE lid = 1 AND category = ? LIMIT 15");

    $dbproduct->bindValue(1, $_GET["q"], PDO::PARAM_INT);
    $last = Products::lastFour($_GET["q"]);

    $i = 0;
    foreach($last as $product)
    {

        $tpl->newBlock("carousel");
        $tpl->assign("id", $product["pid"]);
        $image = Products::create_thumbnail($product["image"], 300);
        $tpl->assign("image", $image);
        if($i == 0)
        {
            $tpl->assign("active", "active");
            $i++;
        }
    }

}
else
{
    $dbproduct = $db->prepare("SELECT stock.stock, product.* FROM product INNER JOIN stock ON product.pid=stock.pid WHERE lid = 1 LIMIT 15");
        $last = Products::lastFour();
            $i = 0;
            foreach($last as $product)
            {

                $tpl->newBlock("carousel");
                    $tpl->assign("id", $product["pid"]);
                $image = Products::create_thumbnail($product["image"], 300);
                    $tpl->assign("image", $image);
                if($i == 0)
                {
                    $tpl->assign("active", "active");
                    $i++;
                }
            }
}
        $dbproduct->execute();
        if ($dbproduct->rowCount() == 0) {
            $tpl->newBlock("notfound");
        } else {

            while ($row = $dbproduct->fetch(PDO::FETCH_ASSOC)) {
                $tpl->newBlock("product");
                $image = Products::create_thumbnail($row["image"]);
                $tpl->assign("id", $row["pid"]);
                $tpl->assign("image", base64_encode($row["image"]));
                $tpl->assign("name", $row["name"]);
                $tpl->assign("price", $row["price"]);
                $desc = explode(".", $row["details"], 2);
                $tpl->assign("desc", htmlentities($desc[0], ENT_COMPAT, "ISO-8859-1"));
                if($row["stock"] > 0)
                    $tpl->assign("stock", "<span class=\"text-success\"><strong>Op voorraad</strong>");
                else
                    $tpl->assign("stock", "<span class=\"text-warning\"><strong>binnen 2-3 weken leverbaar</strong>");

                $reviewsstars = Reviews::getStars($row["pid"]);

                $tpl->assign("reviewcount", $reviewsstars["aantal"]);

                for ($i=1; $i <= 5 ; $i++){
                    $tpl->newBlock("star");
                    if($i > $reviewsstars['gem']){  $tpl->assign("empty", "-empty");}
                }
            }
        }




$head->printToScreen();
$tpl->printToScreen();



include("../configs/foot.php");
?>