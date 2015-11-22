<?php

include("../configs/include.php");

$tpl = new TemplatePower("profile");
    $tpl->prepare();

if(isset($_POST['uid']))
{

}

if(isset($_POST['pass']))
{
    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];
    $pass3 = $_POST['pass3'];

    $password = User::getinfo("password");

    if(!password_verify($pass, $password))
    {
        $tpl->newBlock("error");
            $tpl->assign("msg", "Huidige wacht wordt komt niet overeen.");
    }
    elseif($pass2 != $pass3)
    {
        $tpl->newBlock("error");
        $tpl->assign("msg", "De twee wachtwoorden zijn niet het zelfde.");

    }
    elseif(empty($pass2) || empty($pass3))
    {
        $tpl->newBlock("error");
        $tpl->assign("msg", "Het nieuwe wachtwoord is leeg.");
    }
else
    {
        $tpl->newBlock("success");
        $tpl->assign("msg", "Uw wachtwoord is success vol gewijzigd");
        $newpassword = password_hash($pass2, PASSWORD_DEFAULT);
        $edit = $db->prepare("UPDATE user SET password=:password WHERE uid=:uid");
            $edit->bindValue(":password", $newpassword);
            $edit->bindValue(":uid", $_SESSION['uid']);
        $edit->execute();

    }
}

$user = User::getinfo("*");
$tpl->gotoBlock("_ROOT");
$tpl->assign("uid", $user["uid"]);
$tpl->assign("name", $user["name"]);
$tpl->assign("last", $user["lastname"]);
$tpl->assign("adres", $user["adres"]);
$tpl->assign("zip", $user["zip"]);
$tpl->assign("city", $user["city"]);
$tpl->assign("email", $user["email"]);



$head->printToScreen();
$tpl->printToScreen();

include("../configs/foot.php");

