<!DOCTYPE html>

<html>
<head>
<title> mini-site-routing </title>
</head>

<body>

<nav>
<ul>
      <li> <a href="http://localhost/ISCC/ISCC-2020-J09/EX-01/mini-site-routing.php?page=1">Accueil</a></li>
      <li> <a href="http://localhost/ISCC/ISCC-2020-J09/EX-01/mini-site-routing.php?page=2">Page2</a></li>
      <li> <a href="http://localhost/ISCC/ISCC-2020-J09/EX-01/mini-site-routing.php?page=3">Page3</a></li> 
      <li> <a href="http://localhost:8888/ISCC-2020/ISCC-2020-J09/EX-01/connexion.php?page=connexion">Connexion</a></li> 
</ul>
</nav>

<?php 
if ($_COOKIE['cookie'])
{
    echo '<li> <a href="http://localhost:8888/ISCC-2020/ISCC-2020-J09/EX-01/mini-site-routing.php?page=admin">Admin</a>';
}  
?>

<form enctype= "multipart/form-data" action = "admin.php" method="post"> 
    <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
    <input name="userfile" type="file" accept="image/x-png,image/jpg,image/jpeg"/>
    <input name="description" type="text" placeholder="description" />
    <input name="titre" type="text" placeholder="Titre" />
    <input type="submit" value="Envoyer le fichier" />
</form>

<?php
if ($_GET ['page'] == '1')
{
    echo "<h1> Accueil ! </h1>";
}

if ($_GET ['page'] == '2')
{
    echo "<h1> Page 2 ! </h1>";
}

if ($_GET ['page'] == '3')
{
    echo "<h1> Page 3 ! </h1>";
}
?>

</body>

<footer>
<?php
session_start();
if(isset($_SESSION["id"]))
    {
        echo '<p>Login : ' .$_SESSION["id"]. '</p>';
    }
elseif(!isset($_COOKIE["id"]))
    {
        $_SESSION['id'] = $_POST['login'];
        $_SESSION['mdp'] = $_POST['password'];
    }
else
    {
        header('http://localhost:8888/ISCC-2020/ISCC-2020-J09/EX-01/connexion.php?page=connexion');
    }

?>
</footer>

</html>