<?php

include("../../configs/include.php");

User::isAdmin(true);

$tpl = new TemplatePower("admin/users");
$tpl->prepare();

if(isset($_GET["uid"]) && isset($_GET['delete']))
{
    try {
        $delete = $db->prepare("DELETE FROM user WHERE uid=:uid;DELETE FROM reviews WHERE uid=:uid;");
        $delete->bindValue(":uid", $_GET['uid']);
        $delete->execute();
        header('Location: /beheer/gebruikers');


    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}
if(isset($_POST['uid']) && isset($_GET['edit'])){
    try {

        $user = $db->prepare("UPDATE user SET name=:name, lastname=:lastname, adres=:adres, zip=:zip, city=:city, email=:email, admin=:admin WHERE uid=:uid");
            $user->bindValue(":name", $_POST['name'], PDO::PARAM_STR);
            $user->bindValue(":lastname", $_POST['lastname'], PDO::PARAM_STR);
            $user->bindValue(":adres", $_POST['adres'], PDO::PARAM_STR);
            $user->bindValue(":zip", $_POST['zip'], PDO::PARAM_STR);
            $user->bindValue(":city", $_POST['city'], PDO::PARAM_STR);
            $user->bindValue(":email", $_POST['email'], PDO::PARAM_STR);
            $user->bindValue(":admin", $_POST['admin'], PDO::PARAM_INT);
            $user->bindValue(":uid", $_POST['uid'], PDO::PARAM_INT);

        $user->execute();

        if(!empty($_POST['pas']))
        {
            $user->closeCursor();
            echo "pas";
            $passwordq = $db->prepare("UPDATE user SET password=:password WHERE uid=:uid");
            $password = password_hash($_POST['pas'],PASSWORD_DEFAULT);
            $passwordq->bindValue(":password", $password, PDO::PARAM_STR);
            $passwordq->bindValue(":uid", $_POST['uid'], PDO::PARAM_INT);
            $passwordq->execute();
        }
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}
elseif(isset($_GET["uid"]) && isset($_GET['edit'])){
    $user = User::getinfo("*", $_GET['uid']);
    $tpl->newBlock("edit");
    $tpl->assign("uid", $user["uid"]);
    $tpl->assign("name", $user["name"]);
    $tpl->assign("last", $user["lastname"]);
    $tpl->assign("adres", $user["adres"]);
    $tpl->assign("zip", $user["zip"]);
    $tpl->assign("city", $user["city"]);
    $tpl->assign("email", $user["email"]);
    if($user["admin"]) $tpl->assign("ja", "selected"); else $tpl->assign("nee", "selected");

}
else{
$users = $db->query("SELECT * FROM user");
$tpl->newBlock("users");
$users->execute();

while($user = $users->fetch(PDO::FETCH_ASSOC))
{
    $tpl->newBlock("user");
    $tpl->assign("uid", $user["uid"]);
    $tpl->assign("name", $user["name"]." ".$user["lastname"]);
    $tpl->assign("adres", $user["adres"]);
    $tpl->assign("zip", $user["zip"]);
    $tpl->assign("city", $user["city"]);
    $tpl->assign("email", $user["email"]);
    if($user["admin"]) $tpl->assign("admin", "Ja"); else $tpl->assign("admin", "Nee");
}
}

$head->printToScreen();
$tpl->printToScreen();

include("../../configs/foot.php");