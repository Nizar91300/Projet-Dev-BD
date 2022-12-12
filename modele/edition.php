<?php
Class edition
{
    public $idEdition;
    public $libelleEdition;

    //constructeur
    public function __construct($idEdition, $libelleEdition)
    {
        $this->idEdition = $idEdition;
        $this->libelleEdition = $libelleEdition;
    }

    //getters
    public function getIdEdition()
    {
        return $this->idEdition;
    }
    
    public function getLibelleEdition()
    {
        return $this->libelleEdition;
    }

    //setters
    public static function setIdEdition($idEdition){
        // requete préparé avec un tag

        $sql= "UPDATE edition SET idEdition =:idEdi_tag WHERE idEdition = :idEdi_tag;";
        $reqPrep = Connexion::pdo()->prepare($sql);
        $valeurs = array
        ( 
            "idEdi_tag" => $idEdition
        );
        
        try{

            $reqPrep->execute($valeurs);
            $reqPrep->setFetchmode(PDO::FETCH_CLASS, 'edition');
            $v = $reqPrep->fetch();
            return $v;
            } 
        catch(PDPException $e)
            {
            echo $e->getMessage();
            }
    }
    
    public static function setLibelleEdition($libelleEdition){
        // requete préparé avec un tag

        $sql= "UPDATE edition SET libelleEdition =:libelleEdi_tag WHERE idEdition = :libelleEdi_tag;";
        $reqPrep = Connexion::pdo()->prepare($sql);
        $valeurs = array
        ( 
            "libelleEdi_tag" => $libelleEdition
        );
        
        try{

            $reqPrep->execute($valeurs);
            $reqPrep->setFetchmode(PDO::FETCH_CLASS, 'edition');
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
        return "idEdition : " . $this->idEdition . " libelleEdition : " . $this->libelleEdition;
    }

    //fonction statique
    public static function getAllEdition()
    {
        $requete = "SELECT * FROM edition";
        $resultat = Connexion::pdo()->query($requete);
        $resultat->setFetchMode(PDO::FETCH_CLASS, 'edition');
        $tableau = $resultat->fetchAll();
        return $tableau;
    }
}



?>