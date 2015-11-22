<?php
include("../configs/include.php");
//include("classes/user.php");
$tpl = new TemplatePower("product");
    $tpl->prepare();


$head->newBlock("customcss");
$head->assign("href", "bootstrap/css/shop-item.css");





if(!isset($_GET['pid'])){
    $tpl->newBlock("notfound");
}
else
{

 $product = Products::getProduct($_GET['pid']);
    if(!$product)
    {
     $tpl->newBlock("notfound");
    }
    else
    {
        if(isset($_SESSION["uid"])) $tpl->newBlock("reviewbtn");

        if(isset($_POST['submit'])) Reviews::addReview();


            $categorys = $db->query("SELECT category FROM product GROUP BY category");
            foreach($categorys as $category){
                $tpl->newBlock("category");
                if($category[0] == $product["category"])
                    $tpl->assign("active", "active");
                $tpl->assign("category", $category[0]);
            }
            $tpl->newBlock("product");
            $image = Products::create_thumbnail($product["image"]);
            $tpl->assign("image", $image);
            $tpl->assign("id", $product["pid"]);
            $tpl->assign("name", $product["name"]);
            $tpl->assign("price", $product["price"]);
            $details = htmlentities($product['details'], ENT_COMPAT, "ISO-8859-1");
            $details = str_replace("\r",'<br />',$details);
            $tpl->assign("desc", $details);

            if($product['stock'] == 0)
            {
                $tpl->assign("disable", "disabled");
                $tpl->assign("stock", "<span class=\"text-warning\"><strong>binnen 2-3 weken leverbaar</strong>");
            }


            $reviewsstars = Reviews::getStars($product["pid"]);

            $tpl->assign("reviewcount", $reviewsstars["aantal"]);
            $stars = number_format($reviewsstars["gem"], 1);
            $tpl->assign("starscount", $stars);

            for ($i=1; $i <= 5 ; $i++){
                $tpl->newBlock("star");
                if($i > $reviewsstars['gem']){  $tpl->assign("empty", "-empty");}
            }

            if(User::checklogin()) $tpl->newBlock("reviewbtn");

            $reviews = Reviews::getReviews($product["pid"]);

            foreach($reviews as $review)
            {
                $tpl->newBlock("review");
                $tpl->assign("name", $review["name"]." ".$review["lastname"]);
                $ago = Reviews::timeAgo($review["created_at"]);
                $tpl->assign("time", $ago);
                $tpl->assign("text", $review["comment"]);
                    for ($i=1; $i <= 5 ; $i++){
                        $tpl->newBlock("reviewstar");
                        if($i > $reviewsstars['gem']){  $tpl->assign("empty", "-empty");}
                    }


            }


    }
}


$head->printToScreen();
    $tpl->printToScreen();



include("../configs/foot.php");
?>