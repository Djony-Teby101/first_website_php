<?php
require('config.php');

if(isset($_POST['submit'])){
    if(!empty($_POST['name']) AND !empty($_POST['pass'])){
      $name=strip_tags($_POST['name']);
      $pass=strip_tags($_POST['pass']);

      $sql="SELECT* FROM users WHERE name=?";
      $checkUserExist=$dbb->prepare($sql);
      $checkUserExist->execute(array($name));

      if($checkUserExist->rowCount()>0){
        $infosUser=$checkUserExist->fetch();
        $pass_hash=$infosUser['pass'];
        if(password_verify($pass, $pass_hash)){
            
            $_SESSION['auth']=[
                $_SESSION['id']=$infosUser['id'],
                $_SESSION['name']=$infosUser['name']
            ];
            header('location: index.php');
        }else{
            $errormsg="password et ou nom incorrect";
        }
      }else{
        $errormsg="password et ou nom incorrect";
    }
        

    }else{
        $errormsg="Veuillez remplir tous les champs";
    }

}
?>