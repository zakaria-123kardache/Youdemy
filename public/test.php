<?php

require_once('../vendor/autoload.php');

use App\Model\Tags;
use App\Model\Cours;
use App\Model\Categorie;
use App\Model\Enseignant;
 

echo " am so ahpppy tor un this code ";
echo"<br>";
echo " am so ahpppy tor un this code ";

// require_once('../model/TagCategories.php');

echo"<br>";
echo"<br>";

$tag = Tags::instanceWithNameDescriptionLogo("sceinece","this is my science","logo.php");


var_dump($tag);

echo"<br>";
echo"<br>";

$categorie = new Categorie();
$enseignant = new Enseignant();

$categorie-> getName("deutschsprache");
$enseignant->getFirstName("zakraia");
$enseignant->getLastName("kardasch");

$cour = new cours();
$cour->getId(0);
$cour->getName("OOP");
$cour->getDescription("learnn oop mit mir");
$cour->getPhoto("oop.png");
$cour->getContenu("oop ist eine bester");
$cour->getTags(["php","js","java",12]);
$cour->getCategorie($categorie);
$cour->getEnseignant($enseignant);

echo $cour->__toString();

// var_dump($cour);









