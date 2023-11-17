<?php
require('Actions/signin.php');
require('Actions/login_logic.php')
?>
<!DOCTYPE html>
<html lang="en"> 
  <head> 
    <meta charset="UTF-8" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous" ></script> 
    <link rel="stylesheet" href="style.css" /> 
    <title>Connexion/ Enregistrement</title> 
  </head> 

  <body>
    <div class="container"> 
      <div class="forms-container"> 
       <div class="signin-signup"> 

         <form action="#"  method="post" class="sign-in-form"> 
           <h2 class="title">Se connecter</h2> 
           <div class="input-field"> 
             <i class="fas fa-user"></i> 
             <input type="text" name="name" placeholder="Username"  required/> 
           </div> 
           <div class="input-field"> 
             <i class="fas fa-lock"></i> 
             <input type="password" name="pass"   placeholder="Password"  required/> 
           </div> 
           <input type="submit" name="submit" class="btn solid" />   

           <?php
          if(isset($_POST['submit'])){
            if(!isset($_SESSION['auth'])){
                echo'<div class="input-field"> 
                      <i class="fas fa-lock"></i> 
                      <input style="color: red ; type="text" value="'.$errormsg.'"/> 
                    </div> ';
            }
          }
          ?>
           
          </form> 
          

          <form action="" class="sign-up-form" method="post"> 
            <h2 class="title">Enregistrement</h2> 
            <div class="input-field"> 
              <i class="fas fa-user"></i> 
              <input type="text" name="name" placeholder="Nom" required/> 
            </div> 
            <div class="input-field"> 
              <i class="fas fa-envelope"></i> 
              <input type="email" name="email" placeholder="Email" required/> 
            </div> 
            <div class="input-field"> 
              <i class="fas fa-lock"></i> 
              <input type="password" name="pass" placeholder="Password" required/> 
            </div> 
            <input type="submit" name="validate" class="btn" /> 
        </form> 
      </div> 
    </div> 
    
    <div class="panels-container"> 
      <div class="panel left-panel"> 
        <div class="content"> 
          <h3>Crée un compte !</h3> 
          <p> 
             Vous voulez creer un compte.
             Et rester connecter.
          </p> 
          <button class="btn transparent" id="sign-up-btn"> S'inscrire
          </button> 
        </div> 
      </div> 
      <div class="panel right-panel"> 
      <div class="content"> 
        <h3>Déja inscris ?</h3> 
        <p> 
           Vous avez déja un compte.
           connectez vous directement.
        </p> 
        <button class="btn transparent" id="sign-in-btn">Se connecter
        </button> 
      </div> 
    </div> 
  </div> 
</div> 

<script src="app.js"></script> 

</body>
</html>