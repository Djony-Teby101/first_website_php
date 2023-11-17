<?php
session_start();
if(!$_SESSION['auth']){
    header('location: index.php');
}
$id=$_SESSION['id'];
?>

 <a href="add.user.php">ajouter un utilisateur</a><br>
 <a href="logout.php">deconnexion</a>