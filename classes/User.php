<?php


class User
{

    public static function getName()
    {
        global $db;
        //$db = new PDO('mysql:host=localhost;dbname=beast', 'root', '');
        $user = $db->prepare("SELECT name, lastname FROM user WHERE uid = ?");
            $user->bindValue(1, $_SESSION['uid']);
        $user->execute();
        $user_fetch = $user->fetch();
        $name = ucfirst($user_fetch['name']);
        $lastname = ucfirst($user_fetch['lastname']);

        return $name. " ". $lastname;
    }

    public static function checklogin($redirect = false)
    {
        if($redirect){
            if(!isset($_SESSION['uid']))header('Location: /index.php?login');
        }
        else
        {
            if(isset($_SESSION['uid']))
                return true;
            else
                return false;

        }

    }

    public static function getinfo($data, $uid = false)
    {
        global $db;
        if(!$uid) $uid = $_SESSION['uid'];
        //$db = new PDO('mysql:host=localhost;dbname=beast', 'root', '');
        $user = $db->prepare("SELECT * FROM user WHERE uid = ?");
        $user->bindValue(1, $uid);
        $user->execute();
        $user_fetch = $user->fetch();

        if(is_array($data)){
            $return = array();
            foreach($data as $i)
            {
                $return[$i] = $user_fetch[$i];
            }
            return $return;
        }
        elseif($data == "*") return $user_fetch;
        else return $user_fetch[$data];
    }

    public static function isAdmin($redirect = false)
    {
        $admin = User::getinfo("admin");

        if($redirect && !$admin){

           header('Location: /index.php');

        }
        else
        {
            if($admin)
                return true;
            else
                return false;

        }
    }



}