<?php
Class exemplaire
{
    public $idExemp;
    public $empruntableExemp;
    public $positionExemp;
    public $etatExemp;
    public $exteOuvr; // exteOuvr est un objet de la classe Ouvrage = isbnOuvr
    public $exteStatutExemp; // exteStatutExemp est un objet de la classe Statut = idStatut

    //constructeur
    public function __construct($idExemp, $empruntableExemp, $positionExemp, $etatExemp, $exteOuvr, $exteStatutExemp)
    {
        $this->idExemp = $idExemp;
        $this->empruntableExemp = $empruntableExemp;
        $this->positionExemp = $positionExemp;
        $this->etatExemp = $etatExemp;
        $this->exteOuvr = $exteOuvr;
        $this->exteStatutExemp = $exteStatutExemp;
    }

    //getters
    public function getIdExemp()
    {
        return $this->idExemp;
    }

    public function getEmpruntableExemp()
    {
        return $this->empruntableExemp;
    }

    public function getPositionExemp()
    {
        return $this->positionExemp;
    }

    public function getEtatExemp()
    {
        return $this->etatExemp;
    }

    public function getExteOuvr()
    {
        return $this->exteOuvr;
    }

    public function getExteStatutExemp()
    {
        return $this->exteStatutExemp;
    }

    //setters
    public function setIdExemp($idExemp)
    {
        $sql= "UPDATE exemplaire SET idExemp = '$idExemp' WHERE idExemp = '$this->idExemp'";
       
        if ( Connexion::pdo()->query($sql) === TRUE) {
        echo "Enregistrement mis à jour avec succès";
        } else {
        echo "Erreur de mise à jour de l'enregistrement ";
        }
    }

    public function setEmpruntableExemp($empruntableExemp)
    {
        $sql= "UPDATE exemplaire SET empruntableExemp = '$empruntableExemp' WHERE idExemp = '$this->idExemp'";
       
        if ( Connexion::pdo()->query($sql) === TRUE) {
        echo "Enregistrement mis à jour avec succès";
        } else {
        echo "Erreur de mise à jour de l'enregistrement ";
        }
    }

    public function setPositionExemp($positionExemp)
    {
        $sql= "UPDATE exemplaire SET positionExemp = '$positionExemp' WHERE idExemp = '$this->idExemp'";
       
        if ( Connexion::pdo()->query($sql) === TRUE) {
        echo "Enregistrement mis à jour avec succès";
        } else {
        echo "Erreur de mise à jour de l'enregistrement ";
        }
    }

    public function setEtatExemp($etatExemp)
    {
        $sql= "UPDATE exemplaire SET etatExemp = '$etatExemp' WHERE idExemp = '$this->idExemp'";
       
        if ( Connexion::pdo()->query($sql) === TRUE) {
        echo "Enregistrement mis à jour avec succès";
        } else {
        echo "Erreur de mise à jour de l'enregistrement ";
        }
    }

    public function setExteOuvr($exteOuvr)
    {
        $sql= "UPDATE exemplaire SET exteOuvr = '$exteOuvr' WHERE idExemp = '$this->idExemp'";
       
        if ( Connexion::pdo()->query($sql) === TRUE) {
        echo "Enregistrement mis à jour avec succès";
        } else {
        echo "Erreur de mise à jour de l'enregistrement ";
        }
    }

    public function setExteStatutExemp($exteStatutExemp)
    {
        $sql= "UPDATE exemplaire SET exteStatutExemp = '$exteStatutExemp' WHERE idExemp = '$this->idExemp'";
       
        if ( Connexion::pdo()->query($sql) === TRUE) {
        echo "Enregistrement mis à jour avec succès";
        } else {
        echo "Erreur de mise à jour de l'enregistrement ";
        }
    }

    //fonction d'ajout d'un exemplaire
    public function addExemplaire($idExemp, $empruntableExemp, $positionExemp, $etatExemp, $exteOuvr, $exteStatutExemp)
    {
        $sql = "INSERT INTO exemplaire (idExemp, empruntableExemp, positionExemp, etatExemp, exteOuvr, exteStatutExemp) VALUES ('$idExemp', '$empruntableExemp', '$positionExemp', '$etatExemp', '$exteOuvr', '$exteStatutExemp')";
        if ( Connexion::pdo()->query($sql) === TRUE) {
        echo "Enregistrement ajouté avec succès";
        } else {
        echo "Erreur d'ajout de l'enregistrement ";
        }
    }

    //fonction de suppression d'un exemplaire
    public function deleteExemplaire($idExemp)
    {
        $sql = "DELETE FROM exemplaire WHERE idExemp = '$idExemp'";
        if ( Connexion::pdo()->query($sql) === TRUE) {
        echo "Enregistrement supprimé avec succès";
        } else {
        echo "Erreur de suppression de l'enregistrement ";
        }
    }

    //fonction de recherche d'un exemplaire
    public function searchExemplaire($idExemp)
    {
        $sql = "SELECT * FROM exemplaire WHERE idExemp = '$idExemp'";
        $result = Connexion::pdo()->query($sql);
        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "idExemp: " . $row["idExemp"]. " - empruntableExemp: " . $row["empruntableExemp"]. " - positionExemp: " . $row["positionExemp"]. " - etatExemp: " . $row["etatExemp"]. " - exteOuvr: " . $row["exteOuvr"]. " - exteStatutExemp: " . $row["exteStatutExemp"]. "<br>";
        }
        } else {
        echo "0 results";
        }
    }

    //toString
    public function __toString()
    {
        return "idExemp: " . $this->idExemp . " - empruntableExemp: " . $this->empruntableExemp . " - positionExemp: " . $this->positionExemp . " - etatExemp: " . $this->etatExemp . " - exteOuvr: " . $this->exteOuvr . " - exteStatutExemp: " . $this->exteStatutExemp;
    }

    //fonction statique recuperant tous les exemplaires dans un tableau
    public static function getAllExemplaire()
    {
        $sql = "SELECT * FROM exemplaire";
        $result = Connexion::pdo()->query($sql);
        $exemplaires = array();
        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $exemplaires[] = new Exemplaire($row["idExemp"], $row["empruntableExemp"], $row["positionExemp"], $row["etatExemp"], $row["exteOuvr"], $row["exteStatutExemp"]);
        }
        } else {
        echo "0 results";
        }
        return $exemplaires;
    }
    


    






}

?>