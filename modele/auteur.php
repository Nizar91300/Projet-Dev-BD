<?php
Class Auteur
{
    public $idAuteur;
    public $libelleAuteur;

    //constructeur
    public function __construct($idAuteur, $libelleAuteur)
    {
        $this->idAuteur = $idAuteur;
        $this->libelleAuteur = $libelleAuteur;
    }

    //getters
    public function getIdAuteur()
    {
        return $this->idAuteur;
    }

    public function getLibelleAuteur()
    {
        return $this->libelleAuteur;
    }

    //setters eviter les injections sql en updatent les données sur la base


    public static function setIdAuteur($idAuteur){
        // requete préparé avec un tag

        $sql= "UPDATE auteur SET idAuteur =:idAut_tag WHERE idAuteur = :idAut_tag;";
        $reqPrep = Connexion::pdo()->prepare($sql);
        $valeurs = array
        ( 
            "idAut_tag" => $idAuteur
        );
        
        try{

            $reqPrep->execute($valeurs);
            $reqPrep->setFetchmode(PDO::FETCH_CLASS, 'Auteur');
            $v = $reqPrep->fetch();
            return $v;
            } 
        catch(PDPException $e)
            {
            echo $e->getMessage();
            }
    }

    public static function setLibelleAuteur($libelleAuteur){
        // requete préparé avec un tag

        $sql= "UPDATE auteur SET libelleAuteur =:libAut_tag WHERE idAuteur = :libAut_tag;";
        $reqPrep = Connexion::pdo()->prepare($sql);
        $valeurs = array
        ( 
            "libAut_tag" => $libelleAuteur
        );
        
        try{

            $reqPrep->execute($valeurs);
            $reqPrep->setFetchmode(PDO::FETCH_CLASS, 'Auteur');
            $v = $reqPrep->fetch();
            return $v;
            } 
        catch(PDPException $e)
            {
            echo $e->getMessage();
            }
    }

  

    //toString
    public function __toString()
    {
        return "idAuteur : " . $this->idAuteur . " libelleAuteur : " . $this->libelleAuteur;
    }

    //fonction statique
    public static function getAllAuteur()
    {
        $requete = "SELECT * FROM auteur";
        $resultat = Connexion::pdo()->query($requete);
        $resultat->setFetchMode(PDO::FETCH_CLASS, 'Auteur');
        $tableau = $resultat->fetchAll();
        return $tableau;
    }
}





?>