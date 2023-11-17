<?php
require('config.php');

if(isset($_POST['validate'])){
    if(!empty($_POST['name']) AND !empty($_POST['email'])
    AND !empty($_POST['pass'])){

        // recuperation des valeurs
        $name=strip_tags($_POST['name']);

        $email=strip_tags($_POST['email']);
        $email=filter_var($email,FILTER_SANITIZE_EMAIL);

        $pass=strip_tags($_POST['pass']);

        //verifier si l'utilisateur existe en DB.
        $sql='SELECT * FROM users where name=?';
        $checkIfUserExist=$dbb->prepare($sql);
        $checkIfUserExist->execute(array($name));

        if($checkIfUserExist->rowCount()==0){
            $pass_hash=password_hash($pass, PASSWORD_DEFAULT);

            $sql='INSERT INTO users(name, email, pass) VALUES(?, ?, ?)';
            $insertUser=$dbb->prepare($sql);
            $insertUser->execute(array($name,$email,$pass_hash));

            $selectUser=$dbb->prepare('SELECT*FROM users WHERE name=?');
            $selectUser->execute(array($name));
            $userinfos=$selectUser->fetch();

            $_SESSION['auth']=[
                $_SESSION['id']=$userinfos['id'],
                $_SESSION['name']=$userinfos['name'],
                $_SESSION['email']=$userinfos['email']
            ];
            header('location: index.php');
            




        }else{
            $errormsg="utilisateur existe déja !";
            echo($errormsg);
        }
 
    }else{
        echo("Veuillez remplir les champs...");
    }
}

?>