<?php
Class type
{
    public $idType;
    public $libelleType;

    //constructeur
    public function __construct($idType, $libelleType)
    {
        $this->idType = $idType;
        $this->libelleType = $libelleType;
    }

    //getters
    public function getIdType()
    {
        return $this->idType;
    }
    
    public function getLibelleType()
    {
        return $this->libelleType;
    }

    //setters

    public function setIdType($idType)
    {
        $sql= "UPDATE type SET idType = '$idType' WHERE idType = '$this->idType'";
       
        if ( Connexion::pdo()->query($sql) === TRUE) {
        echo "Enregistrement mis à jour avec succès";
        } else {
        echo "Erreur de mise à jour de l'enregistrement ";
        }
    }

    public function setLibelleType($libelleType)
    {
        $sql= "UPDATE type SET libelleType = '$libelleType' WHERE idType = '$this->idType'";
       
        if ( Connexion::pdo()->query($sql) === TRUE) {
        echo "Enregistrement mis à jour avec succès";
        } else {
        echo "Erreur de mise à jour de l'enregistrement ";
        }
    }

    //toString
    public function __toString()
    {
        return "idType : " . $this->idType . " libelleType : " . $this->libelleType;
    }

    //fonction statique
    public static function getAllType()
    {
        $requete = "SELECT * FROM type";
        $resultat = Connexion::pdo()->query($requete);
        $resultat->setFetchMode(PDO::FETCH_CLASS, 'type');
        $tableau = $resultat->fetchAll();
        return $tableau;
    }

    //fonction statique pour récupérer un type par son id
    public static function getTypeById($idType)
    {
        $requete = "SELECT * FROM type WHERE idType = $idType";
        $resultat = Connexion::pdo()->query($requete);
        $resultat->setFetchMode(PDO::FETCH_CLASS, 'type');
        $tableau = $resultat->fetchAll();
        return $tableau;
    }

    //fonction statique pour récupérer un type par son libelle
    public static function getTypeByLibelle($libelleType)
    {
        $requete = "SELECT * FROM type WHERE libelleType = $libelleType";
        $resultat = Connexion::pdo()->query($requete);
        $resultat->setFetchMode(PDO::FETCH_CLASS, 'type');
        $tableau = $resultat->fetchAll();
        return $tableau;
    }

}
?>