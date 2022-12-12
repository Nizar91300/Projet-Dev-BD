<?php
$titre = "les Voitures";

include("vue/debut.php");

include("vue/menu.php");

require_once("modele/voiture.php");
require_once("config/connexion.php");


Connexion::connect();

$tab_v = Voiture::get_AllVoiture();

include("vue/utilisateur/lesVoitures.php");

include("vue/fin");



?>