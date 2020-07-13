form action ="admin.php" method ="post" enctype = "multipart/form-data">
<input type="file" accept ="image/png, image/jpeg, image/jpg" name ="fichier">
<input type="text" name ="titre">
<input type="text" name ="description">
<input type="submit" name="submit" >
</form>

<?php

$taille_maxi = 2097152;
$taille=($_FILES['fichier']['size']);
echo ($taille);
if($taille>$taille_maxi)
{
    echo "Fichier trop lourd.";
}
if ($_FILES['fichier']['name']);
$longueur=strlen($_FILES['fichier']['name']);
if ($longueur < 4); {
    echo "Le nom du fichier est trop court";
}
session_start();
$_SESSION ['description'] =$_POST ['description']; 
$_SESSION ['titre'] = $_POST['titre'];
echo "<p>" . $_SESSION ['description'] . "</p>";
echo "<p>" . $_SESSION ['titre'] . "</p>";



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
    $users = $pdo->query("SELECT*FROM utilisateurs WHERE login LIKE '%$login% '")->fetchAll();
    if (empty($users)){
    $pdo->query("INSERT INTO 'utilisateurs' ('id', 'login', 'password', 'img-path')
    VALUES (NULL, '$login', '$mdp', '$img')");
    }
    else {
        $pdo->query("UPDATE 'base-site-rooting'.'utilisateurs'
        SET password = $mdp, img-path = $img 
        WHERE login LIKE '%$login%'");
    }
?>