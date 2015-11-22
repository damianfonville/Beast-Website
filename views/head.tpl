<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico"/>
    <link rel="icon" type="image/png" href="/images/logo.png">

    <title>Beast - for all sports!</title>

    <!-- Bootstrap Core CSS -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/bootstrap/css/heroic-features.css" rel="stylesheet">
    <link href="/bootstrap/css/login.css" rel="stylesheet">
    <!-- START BLOCK : customcss -->
    <link href="/{href}" rel="stylesheet">
    <!-- END BLOCK : customcss -->


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="/bootstrap/js/jquery.js"></script>
    <!-- START BLOCK : customjs -->
    <script src="/{href}"></script>
    <!-- END BLOCK : customjs -->

    <!-- START BLOCK : login -->
    <script type="text/javascript">
        $(document).ready(function(){
            $('#login-modal').modal('show');
        });
    </script>
    <!-- END BLOCK : login -->

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><img style="max-width:100px; margin-top: -7px;" src="/images/logo-white.png"></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="/">Home</a>
                </li>
                <li>
                    <a href="/categorie&euml;n">categorie&euml;n</a>
                </li>
                <li>
                    <a href="/winkelwagen">Winkelwagen<span class="glyphicon glyphicon-shopping-cart"></span></a>
                </li>
                <!-- START BLOCK : admin -->
                <li>
                    <a href="/Beheer">Beheer <span class="glyphicon glyphicon-user"></span></a>
                </li>
                <!-- END BLOCK : admin -->
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!-- START BLOCK : guest -->
                <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a></li>
                <li><a href="/registeren">Registeren</a></li>
                <!-- END BLOCK : guest -->
                <!-- START BLOCK : user -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{name} <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/profiel">Profiel</a></li>
                        <li><a href="/facturen">Facturen</a></li>
                        <li><a href="/logout">Uitloggen</a></li>
                    </ul>
                </li>
                <!-- END BLOCK : user -->
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="loginmodal-container">
            <h1>Login op jouw account</h1><br>
            <form action="/login" method="post">
                <!-- START BLOCK : loginerror -->
                <div class="alert alert-danger">
                    <strong>Error!</strong> Voer de juiste gegevens in
                </div>
                <!-- END BLOCK : loginerror -->
                <input type="text" name="email" placeholder="E-mail">
                <input type="password" name="password" placeholder="Wachtwoord">
                <input type="submit" name="login" class="login loginmodal-submit" value="Login">
            </form>

            <div class="login-help">
                <a href="/registeren">Registeren</a>
            </div>
        </div>
    </div>
</div>