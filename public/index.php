<?php

require_once('../vendor/autoload.php');
use App\Model\Tags;

echo " am so ahpppy tor un this code ";

// require_once('../model/TagCategories.php');


$tag = Tags::instanceWithNameDescriptionLogo("sceinece","this is my science","logo.php");


var_dump($tag);

