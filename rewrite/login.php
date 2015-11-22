<?php
include("../configs/include.php");

if(isset($_POST['login']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(empty($email) || empty($password)) {
            $head->newBlock("loginerror");
            $head->newBlock("login");
        }
        else
        {
            $user = $db->prepare("SELECT uid, password FROM user WHERE email = ?");
                $user->bindValue(1, $email, PDO::PARAM_STR);
            $user->execute();
            $user_fetch = $user->fetch();
            if(password_verify($password, $user_fetch['password']))
            {
                $_SESSION['uid'] = $user_fetch['uid'];
                header('Location: '.$_SERVER['HTTP_REFERER'].'');
            }
            else
            {
                $head->newBlock("loginerror");
                $head->newBlock("login");
            }
        }
    }
else
{
    $head->newBlock("loginerror");
    $head->newBlock("login");
}

//print all
$head->printToScreen();

include("../configs/foot.php");