<?php
$titre = "les Utilisateurs";

include("vue/debut.php");

include("vue/menu.php");

require_once("../modele/auteur.php");
require_once("config/connexion.php");


Connexion::connect();

$tab_u = User::get_AllUser();

include("../vue/a);

include("vue/fin");



?>