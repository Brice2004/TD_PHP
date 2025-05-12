<?php
$hostname = "localhost";
$dbname = "tp1";
$ $users = "root";
$password = "";

try{
    $connection = new PDD("mysql :host=$hostname;dbname=$dbname", $dbuser, $dbpassword);
    $connection--->setAttribute(PDD::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (\Throwable $th){
        die("Base de donnée indisponible");
    }
    ?>