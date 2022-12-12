<?php

class utilisateur{

    public $loginUti;
    public $emailUti;
    public $nomUti;
    public $prenomUti;
    public $pwdUti;
    public $exteStatut;
    public $exteSanction;

    //constructeur
    public function __construct($loginUti, $emailUti, $nomUti, $prenomUti, $pwdUti, $exteStatut, $exteSanction)
    {
        $this->loginUti = $loginUti;
        $this->emailUti = $emailUti;
        $this->nomUti = $nomUti;
        $this->prenomUti = $prenomUti;
        $this->pwdUti = $pwdUti;
        $this->exteStatut = $exteStatut;
        $this->exteSanction = $exteSanction;
    }

    //getters
    public function getLoginUti()
    {
        return $this->loginUti;
    }

    public function getEmailUti()
    {
        return $this->emailUti;
    }

    public function getNomUti()
    {
        return $this->nomUti;
    }

    public function getPrenomUti()
    {
        return $this->prenomUti;
    }

    public function getPwdUti()
    {
        return $this->pwdUti;
    }

    public function getExteStatut()
    {
        return $this->exteStatut;
    }

    public function getExteSanction()
    {
        return $this->exteSanction;
    }

    //setters 
    public static function setLoginUti($loginUti){
        // requete préparé avec un tag

        $sql= "UPDATE utilisateur SET loginUti =:loginUti_tag WHERE loginUti = :loginUti_tag;";
        $reqPrep = Connexion::pdo()->prepare($sql);
        $valeurs = array
        ( 
            "loginUti_tag" => $loginUti
        );
        
        try{

            $reqPrep->execute($valeurs);
            $reqPrep->setFetchmode(PDO::FETCH_CLASS, 'utilisateur');
            $v = $reqPrep->fetch();
            return $v;
            } 
        catch(PDPException $e)
            {
            echo $e->getMessage();
            }
    }

    public static function setEmailUti($emailUti){
        // requete préparé avec un tag

        $sql= "UPDATE utilisateur SET emailUti =:emailUti_tag WHERE loginUti = :emailUti_tag;";
        $reqPrep = Connexion::pdo()->prepare($sql);
        $valeurs = array
        ( 
            "emailUti_tag" => $emailUti
        );
        
        try{

            $reqPrep->execute($valeurs);
            $reqPrep->setFetchmode(PDO::FETCH_CLASS, 'utilisateur');
            $v = $reqPrep->fetch();
            return $v;
            } 
        catch(PDPException $e)
            {
            echo $e->getMessage();
            }
    }

    public static function setNomUti($nomUti){
        // requete préparé avec un tag

        $sql= "UPDATE utilisateur SET nomUti =:nomUti_tag WHERE loginUti = :nomUti_tag;";
        $reqPrep = Connexion::pdo()->prepare($sql);
        $valeurs = array
        ( 
            "nomUti_tag" => $nomUti
        );
        
        try{

            $reqPrep->execute($valeurs);
            $reqPrep->setFetchmode(PDO::FETCH_CLASS, 'utilisateur');
            $v = $reqPrep->fetch();
            return $v;
            } 
        catch(PDPException $e)
            {
            echo $e->getMessage();
            }
    }

    public static function setPrenomUti($prenomUti){
        // requete préparé avec un tag

        $sql= "UPDATE utilisateur SET prenomUti =:prenomUti_tag WHERE loginUti = :prenomUti_tag;";
        $reqPrep = Connexion::pdo()->prepare($sql);
        $valeurs = array
        ( 
            "prenomUti_tag" => $prenomUti
        );
        
        try{

            $reqPrep->execute($valeurs);
            $reqPrep->setFetchmode(PDO::FETCH_CLASS, 'utilisateur');
            $v = $reqPrep->fetch();
            return $v;
            } 
        catch(PDPException $e)
            {
            echo $e->getMessage();
            }
    }

    public static function setPwdUti($pwdUti){
        // requete préparé avec un tag

        $sql= "UPDATE utilisateur SET pwdUti =:pwdUti_tag WHERE loginUti = :pwdUti_tag;";
        $reqPrep = Connexion::pdo()->prepare($sql);
        $valeurs = array
        ( 
            "pwdUti_tag" => $pwdUti
        );
        
        try{

            $reqPrep->execute($valeurs);
            $reqPrep->setFetchmode(PDO::FETCH_CLASS, 'utilisateur');
            $v = $reqPrep->fetch();
            return $v;
            } 
        catch(PDPException $e)
            {
            echo $e->getMessage();
            }
    }

    public static function setExteStatut($exteStatut){
        // requete préparé avec un tag

        $sql= "UPDATE utilisateur SET exteStatut =:exteStatut_tag WHERE loginUti = :exteStatut_tag;";
        $reqPrep = Connexion::pdo()->prepare($sql);
        $valeurs = array
        ( 
            "exteStatut_tag" => $exteStatut
        );
        
        try{

            $reqPrep->execute($valeurs);
            $reqPrep->setFetchmode(PDO::FETCH_CLASS, 'utilisateur');
            $v = $reqPrep->fetch();
            return $v;
            } 
        catch(PDPException $e)
            {
            echo $e->getMessage();
            }
    }

    public static function setExteSanction($exteSanction){
        // requete préparé avec un tag

        $sql= "UPDATE utilisateur SET exteSanction =:exteSanction_tag WHERE loginUti = :exteSanction_tag;";
        $reqPrep = Connexion::pdo()->prepare($sql);
        $valeurs = array
        ( 
            "exteSanction_tag" => $exteSanction
        );
        
        try{

            $reqPrep->execute($valeurs);
            $reqPrep->setFetchmode(PDO::FETCH_CLASS, 'utilisateur');
            $v = $reqPrep->fetch();
            return $v;
            } 
        catch(PDPException $e)
            {
            echo $e->getMessage();
            }
    }

    public static function setExteStatut($exteStatut){
        // requete préparé avec un tag

        $sql= "UPDATE utilisateur SET exteStatut =:exteStatut_tag WHERE loginUti = :exteStatut_tag;";
        $reqPrep = Connexion::pdo()->prepare($sql);
        $valeurs = array
        ( 
            "exteStatut_tag" => $exteStatut
        );
        
        try{

            $reqPrep->execute($valeurs);
            $reqPrep->setFetchmode(PDO::FETCH_CLASS, 'utilisateur');
            $v = $reqPrep->fetch();
            return $v;
            } 
        catch(PDPException $e)
            {
            echo $e->getMessage();
            }
    }




    

    //fonction de connexion
    public function connexion($loginUti, $pwdUti)
    {
        $sql = "SELECT * FROM utilisateur WHERE loginUti = '$loginUti' AND pwdUti = '$pwdUti'";
        $result = Connexion::pdo()->query($sql);
        $row = $result->fetch();
        if ($row) {
            $this->loginUti = $row['loginUti'];
            $this->emailUti = $row['emailUti'];
            $this->nomUti = $row['nomUti'];
            $this->prenomUti = $row['prenomUti'];
            $this->pwdUti = $row['pwdUti'];
            $this->exteStatut = $row['exteStatut'];
            $this->exteSanction = $row['exteSanction'];
            return true;
        } else {
            return false;
        }
    }

    //fonction d'inscription
    public function inscription($loginUti, $emailUti, $nomUti, $prenomUti, $pwdUti, $exteStatut, $exteSanction)
    {
        $sql = "INSERT INTO utilisateur (loginUti, emailUti, nomUti, prenomUti, pwdUti, exteStatut, exteSanction) VALUES ('$loginUti', '$emailUti', '$nomUti', '$prenomUti', '$pwdUti', '$exteStatut', '$exteSanction')";
        if (Connexion::pdo()->query($sql) === TRUE) {
            echo "Enregistrement ajouté avec succès";
        } else {
            echo "Erreur d'ajout de l'enregistrement ";
        }
    }

    //fonction de suppression
    public function suppression($loginUti)
    {
        $sql = "DELETE FROM utilisateur WHERE loginUti = '$loginUti'";
        if (Connexion::pdo()->query($sql) === TRUE) {
            echo "Enregistrement supprimé avec succès";
        } else {
            echo "Erreur de suppression de l'enregistrement ";
        }
    }

    //fonction de modification
        

}




?>