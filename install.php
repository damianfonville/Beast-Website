<?php

//installed

error_reporting(E_ALL);
ini_set('display_errors', 1);


$installed = false;

$configfile = $_SERVER['DOCUMENT_ROOT']."/config.json";
if(file_exists($configfile)) $installed = true;


$failed = false;

if(isset($_POST['install'])) {
    try {

            $sql['ip'] = $_POST['ip'];
            $sql['db'] = $_POST['db'];
            $sql['user'] = $_POST['user'];
            $sql['pass'] = $_POST['pass'];
            $json = json_encode($sql);


        $db = new PDO('mysql:host='.$sql['ip'].';', $sql['user'], $sql['pass']);

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $db->exec("CREATE DATABASE ".$sql['db']);
        $db->exec("USE ".$sql['db']);
        $sql = file_get_contents("install.sql"); //file name should be name of SQL file with .sql extension.
        $qr = $db->exec($sql);
        $installed = !$qr; // if query execut successfully, this will print 0 else 1
        if(!$installed)
        {
            $failed = true;
        }
        else
        {
            $myfile = fopen("config.json", "w");
            fwrite($myfile, $json);
        }
    } catch (Exception $e) {
        echo 'Connection failed: ' . $e->getMessage();
        $failed = true;
        $installed = false;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="/bootstrap/css/cover.css" rel="stylesheet"/>
    <link rel="stylesheet" href="http://css-spinners.com/css/spinner/whirly.css" type="text/css">
    <style>
        .whirly-loader{
            position: absolute;
            top:40%;
            visibility: hidden;
            z-index: 5;
        }
    </style>
</head>
<body>
<div class="whirly-loader" id="loader">loading</div>
<div class="site-wrapper">

    <div class="site-wrapper-inner">

        <div class="cover-container">

            <div class="masthead clearfix">
                <div class="inner">
                    <h3 class="masthead-brand">Installeren</h3>
                </div>
            </div>
            <div class="inner cover">
            <?php
            if($failed) {
                ?>
                <div class="alert alert-danger text-left">
                    <span class="glyphicon glyphicon-alert"></span> Er is een fout opgetreden
                </div>

                <?php
            }
                if($installed){
                    ?>


                <div class="alert alert-success text-left">
                    <span class="glyphicon glyphicon-ok"></span> De site is succesvol geinstaleerd
                </div>
                    <a href="/" class="btn btn-lg btn-primary">Ga naar de site.</a>
                <?php
                }elseif(!isset($_GET['install'])){
                    ?>

                    <a href="?install" class="btn btn-lg btn-primary" >installeren</a>

                <?php }

                if(isset($_GET['install']) && !$installed){
                ?>

                    <form action="" method="post" role="form" class="text-left">

                        <!-- Text input-->
                        <div class="form-group">
                            <label for="ip">MySQL ip:</label>
                                <input id="ip" name="ip" placeholder="localhost" class="form-control input-md" required="" type="text">

                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label for="db">MySQL database:</label>
                                <input id="db" name="db" placeholder="beast" class="form-control input-md" required="" type="text">

                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label for="user">MySQL username:</label>
                                <input id="user" name="user" placeholder="root" class="form-control input-md" required="" type="text">

                        </div>

                        <!-- Password input-->
                        <div class="form-group">
                            <label for="pass">MySQL password:</label>
                                <input id="pass" name="pass" placeholder="" class="form-control input-md" type="password">

                        </div>

                        <!-- Button -->
                        <div class="form-group">
                            <label for="install"></label>
                                <input type="submit" name="install" class="btn btn-lg btn-primary" data-loading-text="Loading..." onclick="loader.style.visibility = 'visible'; " value="installeren">

                        </div>
                        </form>

                <?php
                }
                ?>
            </div>

            <div class="mastfoot">
                <div class="inner">
                    <p>Copyright &copy; Beast.nl 2015.</p>
                </div>
            </div>

        </div>

    </div>

</body>

<script src="/bootstrap/js/jquery.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>
<script>
    $("input[name='install']").on('click', function () {
        var $btn = $(this).button('loading');
    })
</script>
</html>