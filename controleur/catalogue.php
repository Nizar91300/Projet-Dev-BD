<?php
$titre = "catalogue";

include("../vue/debut.php");

include("../vue/menu.html");

include("../vue/catalogue.php");
include("../config/connexion.php");


Connexion::connect();




include("../vue/fin.html");



?>