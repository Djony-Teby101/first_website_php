<?php
require('config.php');

// Costumer =>2
$sql="SELECT * FROM `costumer` WHERE id=2";
$recupCostumer=$dbb->prepare($sql);
$recupCostumer->execute();

$Costumers_1=$recupCostumer->fetch(pdo::FETCH_ASSOC);

$username_1=$Costumers_1['name'];
$description_1=$Costumers_1['description'];
$image_1=$Costumers_1['image'];

// Costumer => 3
$sql="SELECT * FROM `costumer` WHERE id=3";
$recupCostumer=$dbb->prepare($sql);
$recupCostumer->execute();

$Costumers_2=$recupCostumer->fetch(pdo::FETCH_ASSOC);

$username_2=$Costumers_2['name'];
$description_2=$Costumers_2['description'];
$image_2=$Costumers_2['image'];

// Costumer => 4
$sql="SELECT * FROM `costumer` WHERE id=5";
$recupCostumer=$dbb->prepare($sql);
$recupCostumer->execute();

$Costumers_3=$recupCostumer->fetch(pdo::FETCH_ASSOC);

$username_3=$Costumers_3['name'];
$description_3=$Costumers_3['description'];
$image_3=$Costumers_3['image'];













?>