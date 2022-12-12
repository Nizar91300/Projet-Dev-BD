<?php
class statut{

    //atributs
    public $idStatut;
    public $libelleStatut;
    public $prixAbo;
    public $nbMaxEmprunts;
    public $dureeEmprunts;

    //constructeur
    public function __construct($idStatut, $libelleStatut, $prixAbo, $nbMaxEmprunts, $dureeEmprunts)
    {
        $this->idStatut = $idStatut;
        $this->libelleStatut = $libelleStatut;
        $this->prixAbo = $prixAbo;
        $this->nbMaxEmprunts = $nbMaxEmprunts;
        $this->dureeEmprunts = $dureeEmprunts;
    }

    //getters
    public function getIdStatut()
    {
        return $this->idStatut;
    }
    
    public function getLibelleStatut()
    {
        return $this->libelleStatut;
    }

    public function getPrixAbo()
    {
        return $this->prixAbo;
    }

    public function getNbMaxEmprunts()
    {
        return $this->nbMaxEmprunts;
    }

    public function getDureeEmprunts()
    {
        return $this->dureeEmprunts;
    }

    //setters

    public function setIdStatut($idStatut)
    {
        $sql= "UPDATE statut SET idStatut = '$idStatut' WHERE idStatut = '$this->idStatut'";

        if ( Connexion::pdo()->query($sql) === TRUE) {
        echo "Enregistrement mis à jour avec succès";
        } else {
        echo "Erreur de mise à jour de l'enregistrement ";
        }

    }

    public function setLibelleStatut($libelleStatut)
    {
        $sql= "UPDATE statut SET libelleStatut = '$libelleStatut' WHERE idStatut = '$this->idStatut'";

        if ( Connexion::pdo()->query($sql) === TRUE) {
        echo "Enregistrement mis à jour avec succès";
        } else {
        echo "Erreur de mise à jour de l'enregistrement ";
        }
    }

    public function setPrixAbo($prixAbo)
    {
        $sql= "UPDATE statut SET prixAbo = '$prixAbo' WHERE idStatut = '$this->idStatut'";

        if ( Connexion::pdo()->query($sql) === TRUE) {
        echo "Enregistrement mis à jour avec succès";
        } else {
        echo "Erreur de mise à jour de l'enregistrement ";
        }
    }

    public function setNbMaxEmprunts($nbMaxEmprunts)
    {
        $sql= "UPDATE statut SET nbMaxEmprunts = '$nbMaxEmprunts' WHERE idStatut = '$this->idStatut'";

        if ( Connexion::pdo()->query($sql) === TRUE) {
        echo "Enregistrement mis à jour avec succès";
        } else {
        echo "Erreur de mise à jour de l'enregistrement ";
        }
    }

    public function setDureeEmprunts($dureeEmprunts)
    {
        $sql= "UPDATE statut SET dureeEmprunts = '$dureeEmprunts' WHERE idStatut = '$this->idStatut'";

        if ( Connexion::pdo()->query($sql) === TRUE) {
        echo "Enregistrement mis à jour avec succès";
        } else {
        echo "Erreur de mise à jour de l'enregistrement ";
        }
    }

    //fonctions
    public static function getAllStatuts()
    {
        $sql = "SELECT * FROM statut";
        $result = Connexion::pdo()->query($sql);
        $statuts = $result->fetchAll(PDO::FETCH_CLASS, "statut");
        return $statuts;
    }

    public static function getStatutById($idStatut)
    {
        $sql = "SELECT * FROM statut WHERE idStatut = '$idStatut'";
        $result = Connexion::pdo()->query($sql);
        $statut = $result->fetchAll(PDO::FETCH_CLASS, "statut");
        return $statut;
    }

    public static function getStatutByLibelle($libelleStatut)
    {
        $sql = "SELECT * FROM statut WHERE libelleStatut = '$libelleStatut'";
        $result = Connexion::pdo()->query($sql);
        $statut = $result->fetchAll(PDO::FETCH_CLASS, "statut");
        return $statut;
    }

    //fonction d'ajout
    public static function addStatut($libelleStatut, $prixAbo, $nbMaxEmprunts, $dureeEmprunts)
    {
        $sql = "INSERT INTO statut (libelleStatut, prixAbo, nbMaxEmprunts, dureeEmprunts) VALUES ('$libelleStatut', '$prixAbo', '$nbMaxEmprunts', '$dureeEmprunts')";

        if (Connexion::pdo()->query($sql) === TRUE) {
        echo "Enregistrement ajouté avec succès";
        } else {
        echo "Erreur d'ajout de l'enregistrement ";
        }
    }

    //fonction de suppression
    public static function deleteStatut($idStatut)
    {
        $sql = "DELETE FROM statut WHERE idStatut = '$idStatut'";

        if (Connexion::pdo()->query($sql) === TRUE) {
        echo "Enregistrement supprimé avec succès";
        } else {
        echo "Erreur de suppression de l'enregistrement ";
        }
    }


    









}


?>