<?php
try {
    @session_start();
    $dbb=new PDO("mysql:host=localhost;dbname=blog_1",'root','');

} catch (PDOException $e) {
    die('Erreur:'.$e->getMessage());
}


?>