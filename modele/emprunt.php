<?php

Class emprunt
{
    public $idEmp;
    public $dateEmprunt;
    public $dateRetour;
    public $exteExemp; //exteEmp est un objet de la classe exemplaire
    public $exteUti; //exteUti est un objet de la classe utilisateur

    //constructeur
    public function __construct($idEmp, $dateEmprunt, $dateRetour, $exteExemp, $exteUti)
    {
        $this->idEmp = $idEmp;
        $this->dateEmprunt = $dateEmprunt;
        $this->dateRetour = $dateRetour;
        $this->exteExemp = $exteExemp;
        $this->exteUti = $exteUti;
    }

    //getters
    public function getIdEmp()
    {
        return $this->idEmp;
    }

    public function getDateEmprunt()
    {
        return $this->dateEmprunt;
    }

    public function getDateRetour()
    {
        return $this->dateRetour;
    }

    public function getExteExemp()
    {
        return $this->exteExemp;
    }

    public function getExteUti()
    {
        return $this->exteUti;
    }

    //setters
    public static function setIdEmp($idEmp){
        // requete préparé avec un tag

        $sql= "UPDATE emprunt SET idEmp =:idEmp_tag WHERE idEmp = :idEmp_tag;";
        $reqPrep = Connexion::pdo()->prepare($sql);
        $valeurs = array
        ( 
            "idEmp_tag" => $idEmp
        );
        
        try{

            $reqPrep->execute($valeurs);
            $reqPrep->setFetchmode(PDO::FETCH_CLASS, 'emprunt');
            $v = $reqPrep->fetch();
            return $v;
            } 
        catch(PDPException $e)
            {
            echo $e->getMessage();
            }
    }

    public static function setDateEmprunt($dateEmprunt){
        // requete préparé avec un tag

        $sql= "UPDATE emprunt SET dateEmprunt =:dateEmp_tag WHERE idEmp = :dateEmp_tag;";
        $reqPrep = Connexion::pdo()->prepare($sql);
        $valeurs = array
        ( 
            "dateEmp_tag" => $dateEmprunt
        );
        
        try{

            $reqPrep->execute($valeurs);
            $reqPrep->setFetchmode(PDO::FETCH_CLASS, 'emprunt');
            $v = $reqPrep->fetch();
            return $v;
            } 
        catch(PDPException $e)
            {
            echo $e->getMessage();
            }
    }

    public static function setDateRetour($dateRetour){
        // requete préparé avec un tag

        $sql= "UPDATE emprunt SET dateRetour =:dateRet_tag WHERE idEmp = :dateRet_tag;";
        $reqPrep = Connexion::pdo()->prepare($sql);
        $valeurs = array
        ( 
            "dateRet_tag" => $dateRetour
        );
        
        try{

            $reqPrep->execute($valeurs);
            $reqPrep->setFetchmode(PDO::FETCH_CLASS, 'emprunt');
            $v = $reqPrep->fetch();
            return $v;
            } 
        catch(PDPException $e)
            {
            echo $e->getMessage();
            }
    }

    public static function setExteExemp($exteExemp){
        // requete préparé avec un tag

        $sql= "UPDATE emprunt SET exteExemp =:exteExemp_tag WHERE idEmp = :exteExemp_tag;";
        $reqPrep = Connexion::pdo()->prepare($sql);
        $valeurs = array
        ( 
            "exteExemp_tag" => $exteExemp
        );
        
        try{

            $reqPrep->execute($valeurs);
            $reqPrep->setFetchmode(PDO::FETCH_CLASS, 'emprunt');
            $v = $reqPrep->fetch();
            return $v;
            } 
        catch(PDPException $e)
            {
            echo $e->getMessage();
            }
    }

    public static function setExteUti($exteUti){
        // requete préparé avec un tag

        $sql= "UPDATE emprunt SET exteUti =:exteUti_tag WHERE idEmp = :exteUti_tag;";
        $reqPrep = Connexion::pdo()->prepare($sql);
        $valeurs = array
        ( 
            "exteUti_tag" => $exteUti
        );
        
        try{

            $reqPrep->execute($valeurs);
            $reqPrep->setFetchmode(PDO::FETCH_CLASS, 'emprunt');
            $v = $reqPrep->fetch();
            return $v;
            } 
        catch(PDPException $e)
            {
            echo $e->getMessage();
            }
    }

    //fonction d'ajout d'un emprunt dans la base de données
    public static function addEmprunt($dateEmprunt, $dateRetour, $exteExemp, $exteUti)
    {
        $sql = "INSERT INTO emprunt (dateEmprunt, dateRetour, exteExemp, exteUti) VALUES (:dateEmp_tag, :dateRet_tag, :exteExemp_tag, :exteUti_tag);";
        $reqPrep = Connexion::pdo()->prepare($sql);
        $valeurs = array
        ( 
            "dateEmp_tag" => $dateEmprunt,
            "dateRet_tag" => $dateRetour,
            "exteExemp_tag" => $exteExemp,
            "exteUti_tag" => $exteUti
        );
        
        try{

            $reqPrep->execute($valeurs);
            $reqPrep->setFetchmode(PDO::FETCH_CLASS, 'emprunt');
            $v = $reqPrep->fetch();
            return $v;
            } 
        catch(PDPException $e)
            {
            echo $e->getMessage();
            }
    }

    //méthodes
    public function afficher()
    {
        echo "idEmp : ".$this->idEmp."<br>";
        echo "dateEmprunt : ".$this->dateEmprunt."<br>";
        echo "dateRetour : ".$this->dateRetour."<br>";
        echo "exteExemp : ".$this->exteExemp."<br>";
        echo "exteUti : ".$this->exteUti."<br>";
    }

    
    public function ajouter()
    {
        $sql = "INSERT INTO emprunt (idEmp, dateEmprunt, dateRetour, exteExemp, exteUti) VALUES ('$this->idEmp', '$this->dateEmprunt', '$this->dateRetour', '$this->exteExemp', '$this->exteUti')";

        if ( Connexion::pdo()->query($sql) === TRUE) {
        echo "Enregistrement ajouté avec succès";
        } else {
        echo "Erreur d'ajout de l'enregistrement ";
        }
    }

    public function supprimer()
    {
        $sql = "DELETE FROM emprunt WHERE idEmp = '$this->idEmp'";

        if (Connexion::pdo()->query($sql) === TRUE) {
        echo "Enregistrement supprimé avec succès";
        } else {
        echo "Erreur de suppression de l'enregistrement ";
        }
    }

    public static function liste()
    {
        $sql = "SELECT * FROM emprunt";
        $result = Connexion::pdo()->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "idEmp: " . $row["idEmp"]. " - dateEmprunt: " . $row["dateEmprunt"]. " - dateRetour: " . $row["dateRetour"]. " - exteExemp: " . $row["exteExemp"]. " - exteUti: " . $row["exteUti"]. "<br>";
        }
        } else {
        echo "0 results";
        }
    }

    public static function listeEmprunt($idUti)
    {
        $sql = "SELECT * FROM emprunt WHERE exteUti = '$idUti'";
        $result = Connexion::pdo()->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "idEmp: " . $row["idEmp"]. " - dateEmprunt: " . $row["dateEmprunt"]. " - dateRetour: " . $row["dateRetour"]. " - exteExemp: " . $row["exteExemp"]. " - exteUti: " . $row["exteUti"]. "<br>";
        }
        } else {
        echo "0 results";
        }
    }

    public static function listeEmpruntExemp($idExemp)
    {
        $sql = "SELECT * FROM emprunt WHERE exteExemp = '$idExemp'";
        $result = Connexion::pdo()->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "idEmp: " . $row["idEmp"]. " - dateEmprunt: " . $row["dateEmprunt"]. " - dateRetour: " . $row["dateRetour"]. " - exteExemp: " . $row["exteExemp"]. " - exteUti: " . $row["exteUti"]. "<br>";
        }
        } else {
        echo "0 results";
        }
    }

    public static function listeEmpruntExempRetour($idExemp)
    {
        $sql = "SELECT * FROM emprunt WHERE exteExemp = '$idExemp' AND dateRetour IS NULL";
        $result = Connexion::pdo()->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "idEmp: " . $row["idEmp"]. " - dateEmprunt: " . $row["dateEmprunt"]. " - dateRetour: " . $row["dateRetour"]. " - exteExemp: " . $row["exteExemp"]. " - exteUti: " . $row["exteUti"]. "<br>";
        }
        } else {
        echo "0 results";
        }
    }
    
}



?>