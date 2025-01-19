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
// use app\core\Database;



echo " am so ahpppy tor un this code ";
echo"<br>";
echo " am so ahpppy tor un this code ";
echo " am so ahpppy tor un this code ";

// require_once('../model/TagCategories.php');

echo"<br>";
echo"<br>";

// $tag = Tags::instanceWithNameDescriptionLogo("sceinece","this is my science","logo.php");


// var_dump($tag);

// echo"<br>";
// echo"<br>";

// $categorie = new Categorie();
// $enseignant = new Enseignant();

// $categorie-> getName("deutschsprache");
// $enseignant->getFirstName("zakraia");
// $enseignant->getLastName("kardasch");

// $cour = new cours();
// $cour->getId(0);
// $cour->getName("OOP");
// $cour->getDescription("learnn oop mit mir");
// $cour->getPhoto("oop.png");
// $cour->getContenu("oop ist eine bester");
// $cour->getTags(["php","js","java",12]);
// $cour->getCategorie($categorie);
// $cour->getEnseignant($enseignant);

// echo $cour->__toString();

// // var_dump($cour);
echo"<br>";
echo"<br>";

echo"=================================================================";
echo"=================================================================";

// $role = Role::instanceWithNameAndDescriptionAndLogo('ssss','role sss','logo.pgn');
// $role1 = Role::instanceWithNameAndDescriptionAndLogo('kkkkk','role sss','logo.pgn');

// try {
//     $saverole = $role->create($role);
//     echo " role created secs".$saverole->getId() ;
// } catch (Exception $e ){
//     echo " falied".$e->getMessage();
// }

// try {
//     $saverole = $role1->create($role1);
//     echo " role created secs".$saverole->getId() ;
// } catch (Exception $e ){
//     echo " falied".$e->getMessage();
// }

// $rolelist = $role->findAll();
// foreach($rolelist as $r ){
//     echo "role id : {$r->getId()}, role id : {$r->getRoleName()}, role id : {$r->getDescription()}";
// }


// echo"<br>";
// echo"<br>";

// echo"=================================================================";
// echo"=================================================================";

// try {
//     $role = $role-> findById(86);
//     if ($role instanceof Role){
//         $role->setRoleName('update admin');
//         $role->setDescription('update des');
//         $role->setLogo('updateLogo');

//         $updateRole = $role->update($role);

//         echo "role update ";
//         echo "ID ".$updateRole->getId();
//         echo "Is ".$updateRole->getRoleName();
//         echo "ID ".$updateRole->getDescription();
//         echo "ID ".$updateRole->getLogo();
        

//     }
// }catch (Exception $e) {
//     echo "Failed to update role: " . $e->getMessage() . PHP_EOL;
// }


// // try {
// //     $roledalete = 1;
// //     $deleterows = $role-> delete($roledalete);


// //     if( $deleterows > 0){
// //         echo "roleid delete ";
// //     }else {
// //         echo "roleid non  non delete "; 
// //     }

// // }catch (Exception $e) {
// //     echo "Failed to delete role: " . $e->getMessage() ;
// // }




// if (isset($saverole) && $saverole instanceof Role) {
//     $savedRoleId = $saverole->getId();
//     $saverole = $role->findById($savedRoleId);

//     $user = Utilisateur::instance(
//         'kardache',
//         'zakaria',
//         'kardache@mail.ma',
//         'kardachepassword',
//         'kardachepassword',
//         'kardache.png',
//         $saverole
//     );

//     try {
//         $saveduser = $user->create($user);
//         echo "User created successfully. ID: " . $saveduser->getId();
//     } catch (Exception $e) {
//         echo "Failed to create user: " . $e->getMessage();
//     }
// } else {
//     echo "Role creation failed " ;
// }


// try {
//     $user = Utilisateur::findById(1);  

//     if ($user instanceof Utilisateur) {
//         $user->setFirstname('up date');
//         $user->setLastname('up date');
//         $user->setEmail('up date');
//         $user->setPassword('up date');
//         $user->setPhoto('up date');

//         $updatedUser = $user->update($user);  
//         echo "Updated user with ID: " . $updatedUser->getId() ;
//     }
// } catch (Exception $e) {
//     echo "Failed to update user: " . $e->getMessage();
// }






// $user = new Utilisateur ();
// $user = Utilisateur::instance('zakaria','zakaria','zakaria','zakaria','zakaria','zakaria',$role);
// $user->setRole($role);
// $user->create($user);
// var_dump($user);

// $user->instance(); 



// $user1 = new Utilisateur();
// $user1->getFirstname('frau');
// $user1->getLastname('Melda');
// $user1->getPhoto('photo.png');
// $user1->getRole($role);

// // echo $user1->__toString() ;

// echo"<br>";
// echo"<br>";
// echo"=================================================================";
// echo"=================================================================";



// $enseignant = new Enseignant();
// $enseignant->getFirstname('Herr');
// $enseignant->getLastname('Schneider');
// $enseignant->getPhoto('photo.png');
// $enseignant->setRole($role);
// $enseignant->create($enseignant);

// var_dump($enseignant) ;
// die();

// echo"<br>";
// echo"<br>";
// echo"=================================================================";
// echo"=================================================================";



// $etudiant1 = new Etudiant();
// $etudiant1->setFirstname("herr");
// $etudiant1->setLastname("muller");
// $etudiant1->setPhoto('photo.png');
// $etudiant1->setRole($role);

// echo $etudiant1->__toString(); 
// var_dump($etudiant1);

// echo"<br>";
// echo"<br>";
// echo"=================================================================";
// echo"=================================================================";


// $object = new Utilisateur();
// $object->create("zaki","kardache","zakaria ");
// var_dump($object);

// $register = SignUpForm::instanceWithAllArgs("dfg","dfg","dfg","dfg","dfg");

// var_dump($register);


// Database::getInstance();
// Database::getConnection();

// echo $test;
// var_dump($test);
// private int $id;
// private string $role_name="";
// private string $role_description = "";
// private string $logo = "";




// echo"<br>";
// echo"<br>";

// echo"=================================================================";
// echo"=================================================================";

// $categorie = new Categorie() ; 
// $categoriee = new Categorie ;
// // $categoriee->setName('physic'); 
// // $categoriee->setDescription('physic'); 

// // $creadedcategorie = $categoriee->create($categoriee);
// // echo " created" .$creadedcategorie->getId();
// // var_dump($categoriee);

// $categoriee->setId(8);

// $enseignant = new Enseignant();
// $enseignant->setId(1);

// $cour1 = new Cours();
// $cour1->setName('CRUD');
// $cour1->setDescription('CRUD.');
// $cour1->setContenu('CRUD');
// $cour1->setPhoto('CRUD.ppg');
// $cour1->setCategorie($categoriee);
// // $cour->setEnseignant($enseignant);

// $createdcours = $cour1->create($cour1);


// echo " created" .$createdcours->getId();


