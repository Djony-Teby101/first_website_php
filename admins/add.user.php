<?php

if(isset($_POST['submit'])){
    if(!empty($_POST['name'])
      AND !empty($_POST['description']) AND !empty($_FILES['image'])
        AND !isset($_FILES['name']['error']) ){


        require_once('../Actions/config.php');

        $allowed=[
            "jpg"=>"image/jpeg",
            "jpeg"=>"image/jpeg",
            "png"=>"image/png"
        ];

        $name=strip_tags($_POST['name']);
        $description=strip_tags($_POST['description']);

        $filename=strip_tags($_FILES['image']['name']);
       

        $filetype=strip_tags($_FILES['image']['type']);
        $filesize=strip_tags($_FILES['image']['size']);
        $folder='uploads/'.$filename;
        $file_tmp_name=strip_tags($_FILES['image']['tmp_name']);

       $sql="SELECT * FROM costumer WHERE name=?";
       $checkUserExist=$dbb->prepare($sql);
       $checkUserExist->execute([$name]);

       if(!$checkUserExist-> rowCount() >0){
            $extension=strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            if(! array_key_exists($extension, $allowed) ||  !in_array($filetype, $allowed)) {
                echo("Format de fichier Incorrect");
            }

            if($filesize> 2000000){
                echo("Fichier trop volimineux");
            }

            $sql="INSERT INTO costumer (name, description,image) VALUES(?, ?, ?)";
            $InsertCostumers=$dbb->prepare($sql);
            $InsertCostumers->execute(array($name, $description, $filename));

           
            if(!move_uploaded_file($file_tmp_name, $folder)){
                echo('Erreur lors de l enregistrement du fichier ');
            }
            header('location: dashboard.php');

       }else{
        echo("l'utilisateur existe deja en base de donnée.");
       }
        

}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Ajouter un Utilisateur.</title>
</head>
<body>
<section class="form-container">

<form action="" method="post" enctype="multipart/form-data">
      <h3>formulaire</h3>
      <input type="text" required placeholder="tapez votre nom" class="box" name="name" require>
      <input type="file" name="image" required class="box" accept="image/jpg, image/png, image/jpeg">
      <textarea name="description" id="" cols="30" rows="10" class="box" required></textarea>
      <input type="submit" value="Envoyez" class="btn" name="submit">
   </form>
</section>
</body>
</html>