<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php

session_start();

$cars = [ 
    0 => "cars1",
    1 => "cars2", 
    2 =>"cars3",
    3 =>"cars4"
 ];


echo $cars[1] . "<br>";


$cars = [
    "cars1" => "BMW",
    "cars2" => "Mercedes",
    "cars3" => "Audi",
    "cars4" => "Volkswagen",
    "cars5" => "Porsche",
    "cars6" => "Ferrari",
    "cars7" => "Lamborghini",
    "cars8" => "Tesla",
    "cars9" => "Ford",
    "cars10" => "Chevrolet"
];

echo $cars["cars5"] . "<br>";

echo "Welcome to the home page!  !" . $_SESSION['user']['nom'] . " " . $_SESSION['user']['prenom'] . "<br>";

?>
</body>
</html>