<?php

if (isset($_POST['login']) && isset ($_POST ['password']) && $_POST ['password']== "2020") {

echo "login : " .$_POST['login'];
echo "<br>password : ".$_POST['password'];

session_start();

$_SESSION ["id"]= $_POST ['login'];
echo "<a href= 'mini-site-routing.pho?page=1' </a>" ; 
}

else {
    echo "Mauvais couple identifiant/mot de passe.";
    echo "<a href= 'connexion.php' > connexion </a>";
}


?>


<?php
   function connect_to_database(){
    $servername = 'localhost';
    $username = 'root';
    $password= '';
    $madatabase = 'base-site-rooting';

try {
    $pdo = new PDO("mysql:host=$servername; dbname=$madatabase" , $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Connexion reussie';
return $pdo;}

catch (PDOException $e){echo "connexion failed: " . $e-> getMessage();}
}

$pdo=connect_to_database();
$users = $pdo->prepare("SELECT password FROM utilisateurs WHERE `login`=?");
$tab=array($_POST['login']);
$users->execute($tab);

if (isset($_POST['login']) && isset ($_POST ['password']) && $_POST ['password']== "2020") {
echo "login : " .$_POST['login'];
echo "<br>password : ".$_POST['password'];

session_start();
 if(!isset($_SESSION["password"])) {
 if(isset($_COOKIE["password"]))
 $_SESSION["password"]= $_COOKIE["password"];}
 if(!isset($_SESSION["img-path"])) {
 if(isset($_COOKIE["img-path"]))
 $_SESSION["img-path"]= $_COOKIE["img-path"]; }
header ('Location: mini-site-routing.php?page=1');
}

else {
    echo "Mauvais couple identifiant/mot de passe.";
    echo "<a href= 'connexion.php'> connexion  </a>";
}
?>