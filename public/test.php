<?php

require_once('../vendor/autoload.php');

use App\core\Database;
use App\Model\Tags;
use App\Model\Cours;
use App\Model\Categorie;
use App\Model\Enseignant;
use App\Model\Etudiant;
use App\Model\Role;
use App\Model\Utilisateur;
use App\http\SignUpForm;
// use app\core\Database;



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
echo"<br>";
echo"<br>";

echo"=================================================================";
echo"=================================================================";

$role = Role::instance('admin','role admin','logo.pgn');

$user1 = new Utilisateur();
$user1->getFirstname('frau');
$user1->getLastname('Melda');
$user1->getPhoto('photo.png');
$user1->getRole($role);

echo $user1->__toString() ;

echo"<br>";
echo"<br>";
echo"=================================================================";
echo"=================================================================";



$enseignant = new enseignant();
$enseignant->getFirstname('Herr');
$enseignant->getLastname('Schneider');
$enseignant->getPhoto('photo.png');
$enseignant->getRole($role);

echo $enseignant->__toString();

echo"<br>";
echo"<br>";
echo"=================================================================";
echo"=================================================================";



$etudiant1 = new Etudiant();
$etudiant1->setFirstname("herr");
$etudiant1->setLastname("muller");
$etudiant1->setPhoto('photo.png');
$etudiant1->setRole($role);

echo $etudiant1->__toString(); 
// var_dump($etudiant1);

echo"<br>";
echo"<br>";
echo"=================================================================";
echo"=================================================================";




$register = SignUpForm::instanceWithAllArgs("dfg","dfg","dfg","dfg","dfg");

var_dump($register);


Database::getInstance();
// Database::getConnection();

// echo $test;
// var_dump($test);

