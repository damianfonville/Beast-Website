<?php
include("../configs/include.php");
//include("classes/user.php");
$tpl = new TemplatePower("register");
$tpl->prepare();

if(isset($_POST['register']))
{
    if (in_array(null, $_POST)) {
        echo "null";
        $tpl->newBlock("register");
        $tpl->newBlock("error");
    }
    elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        echo !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $tpl->newBlock("register");
        $tpl->newBlock("error");
    }
    elseif($_POST['password'] !== $_POST['password2']){
        echo "password";
        $tpl->newBlock("register");
        $tpl->newBlock("error");
    }
    else
    {
        $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
        $register = $db->prepare("INSERT INTO user (name, lastname, adres, zip, city, email, password) VALUES (:name, :lastname, :adres, :zip, :city, :email, :password)");
            $register->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
            $register->bindParam(':lastname', $_POST['lastname'], PDO::PARAM_STR);
            $register->bindParam(':adres', $_POST['adres'], PDO::PARAM_STR);
            $register->bindParam(':zip', $_POST['zip'], PDO::PARAM_STR);
            $register->bindParam(':city', $_POST['city'], PDO::PARAM_STR);
            $register->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
            $register->bindParam(':password', $password, PDO::PARAM_STR);
        $register->execute();
        $tpl->newBlock("success");
    }

}
else
{
    $tpl->newBlock("register");
}

$head->printToScreen();
$tpl->printToScreen();


include("../configs/foot.php");
?>