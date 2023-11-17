<?php
    if(isset($_POST)){
        //  admin=[
        //         email=>lorince_teby@gmail.com,
        //         pass= mars12
        //     ]


        if(isset($_POST['email']) && !empty($_POST['email'])
                && isset($_POST['mdp']) && !empty($_POST['mdp'])
        ){
            require_once('../Actions/config.php');
                $email=strip_tags($_POST['email']);
                $email=filter_var($email, FILTER_SANITIZE_EMAIL);
                $pass=strip_tags($_POST['mdp']);

                $sql='SELECT*FROM admins WHERE email=?';
                $checkIfUserExist=$dbb->prepare($sql);
                $checkIfUserExist->execute(array($email));
                
                if($checkIfUserExist->rowCount()>0){
                    
                    $recupAdminInfos=$checkIfUserExist->fetch();
                    $pass_hash=$recupAdminInfos['mdp'];
                    
                    if(password_verify($pass, $pass_hash)){
                        $_SESSION['auth']=true;
                        $_SESSION['id']=$recupAdminInfos['id'];
                        $_SESSION['email']=$recupAdminInfos['email'];


                        header('location: dashboard.php');
                    }else{
                        die('Erreur email/mot de passe incorrect');
                    }

                
                    
                }else{
                    die('Erreur email/mot de passe incorrect');
                }
               
                

        }else{
            echo('Veuillez completer tous les champs !');
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>login_admin</title>
</head>
<body>
<section class="form-container">

    <form method="post" enctype="multipart/form-data">
        <h3>Connexion</h3>
        <input type="email" required placeholder="tapez votre nom" class="box" name="email">
        <input type="password" required placeholder="tapez votre mot de passe" class="box" name="mdp">
      <input type="submit" value="Envoyez" class="btn" name="submit">
   </form>

</section>
</body>
</html>