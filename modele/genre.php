<?php

Class genre
{
    public $idGenre;
    public $libelleGenre;

    //constructeur
    public function __construct($idGenre, $libelleGenre)
    {
        $this->idGenre = $idGenre;
        $this->libelleGenre = $libelleGenre;
    }

    //getters
    public function getIdGenre()
    {
        return $this->idGenre;
    }
    
    public function getLibelleGenre()
    {
        return $this->libelleGenre;
    }

    //setters

    public function setIdGenre($idGenre)
    {
        $sql= "UPDATE Genre SET idGenre = '$idGenre' WHERE idGenre = '$this->idGenre'";
       
        if ( Connexion::pdo()->query($sql) === TRUE) {
        echo "Enregistrement mis à jour avec succès";
        } else {
        echo "Erreur de mise à jour de l'enregistrement ";
        }
    }

    public function setLibelleGenre($libelleGenre)
    {
        $sql= "UPDATE Genre SET libelleGenre = '$libelleGenre' WHERE idGenre = '$this->idGenre'";
       
        if ( Connexion::pdo()->query($sql) === TRUE) {
        echo "Enregistrement mis à jour avec succès";
        } else {
        echo "Erreur de mise à jour de l'enregistrement ";
        }
    }




    //toString
    public function __toString()
    {
        return "idGenre : " . $this->idGenre . " libelleGenre : " . $this->libelleGenre;
    }

    //fonction statique
    public static function getAllGenre()
    {
        $requete = "SELECT * FROM genre";
        $resultat = Connexion::pdo()->query($requete);
        $resultat->setFetchMode(PDO::FETCH_CLASS, 'genre');
        $tableau = $resultat->fetchAll();
        return $tableau;
    }


}
?>