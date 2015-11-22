<?php

$head = new TemplatePower("head");

$head->prepare();



if(User::checklogin()){
    $head->newBlock("user");
    $name = User::getName();
    $head->assign("name", $name);
}
else
{
    $head->newBlock("guest");
}

if(isset($_SESSION["uid"]) && User::isAdmin())$head->newBlock("admin");

if(isset($_GET['login'])){$head->newBlock("login");}


?>