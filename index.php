<?php
include("db.php");

$users = [];
try{
    $connection = new PDO("mysql:host=$hostname",$dusers, $dpassword);
    dbname=$dbname", $dbuser, $dbpassword); 
    $connection--->setAttribute(PDD::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = $connection--->query("select * from user");
    //fetchALL: permet de récupérer toutes les lignes
    retournées par la requète
    $users = $req--->fetchALL(PDD::FETCH_ASSOC);
    echo"</pre>";
    var_dump($users);
    echo"</pre>";
} catch (PDDEXCEPTION $e) {
    var_dump($e)
    die("stop");
    // throw $th;
}
$users = [ //Tableau qui contient trois utilisateurs
[
    "prenom" => "sidney",
    "nom"=> "Aicha",
    "email" => "sidney@icloud.com",
    "Tel" => "0758363743"
],
[
    "prenom" => "sidney",
    "nom"=> "Alibaba",
    "email" => "sidney@icloud.com",
    "Tel" => "0758363748"
]

];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <table class="table table-striped">
        <tr>
            <th>Prenom</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Telephone</th>
        </tr>
        <tr>
            <td>JUNIOR</td>
            <td>FOZE</td>
            <td>foze15@icloud.com</td>
            <td>0758363743</td>
        </tr>
        <tr>
            <td>STEVE</td>
            <td>TOTO</td>
            <td>Steeve16@ece.fr</td>
            <td>0758387432</td>
        </tr>
        <tr>
            <td>stephane</td>
            <td>ngampa</td>
            <td>Stephane17@icloud.com</td>
            <td>0758363743</td>
        </tr>
        <tr>
            <td>cristiano</td>
            <td>ronaldo</td>
            <td>Cr7@icloud.com</td>
            <td>0758363943</td>
        </tr>
        <?php
        foreach($users as $value){
            echo "
            <tr>
            <td>".$value["prenom"]."</td>
            <td>".$value["nom"]."</td>
            <td>".$value["email"]."</td>
            <td>".$value["Tel"]."</td>
            </tr>
            ";
        }
        ?>
    </table>
</body>
</html>