<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$configfile = $_SERVER['DOCUMENT_ROOT']."/config.json";
if(!file_exists($configfile)) header('Location: /install.php');

$conf = json_decode(file_get_contents($configfile));

$db = new PDO('mysql:host='.$conf->ip.';dbname='.$conf->db, $conf->user, $conf->pass);

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



?>