<?php
Class ouvrage
{
    public $isbnOuvr;
    public $titreOuvr;
    public $languageOuvr;
    public $datePublicationOuvr;
    public $nbPageOuvr;
    public $descriptionOuvr;
    public $exteGenre;
    public $exteType;
    public $exteEdition;


    //constructor
    public function __construct($isbnOuvr, $titreOuvr, $languageOuvr, $datePublicationOuvr, $nbPageOuvr, $descriptionOuvr, $exteGenre, $exteType, $exteEdition)
    {
        $this->isbnOuvr = $isbnOuvr;
        $this->titreOuvr = $titreOuvr;
        $this->languageOuvr = $languageOuvr;
        $this->datePublicationOuvr = $datePublicationOuvr;
        $this->nbPageOuvr = $nbPageOuvr;
        $this->descriptionOuvr = $descriptionOuvr;
        $this->exteGenre = $exteGenre;
        $this->exteType = $exteType;
        $this->exteEdition = $exteEdition;
    }

    //getters
    public function getIsbnOuvr()
    {
        return $this->isbnOuvr;
    }
    public function getTitreOuvr()
    {
        return $this->titreOuvr;
    }
    public function getLanguageOuvr()
    {
        return $this->languageOuvr;
    }
    public function getDatePublicationOuvr()
    {
        return $this->datePublicationOuvr;
    }
    public function getNbPageOuvr()
    {
        return $this->nbPageOuvr;
    }
    public function getDescriptionOuvr()
    {
        return $this->descriptionOuvr;
    }
    public function getExteGenre()
    {
        return $this->exteGenre;
    }
    public function getExteType()
    {
        return $this->exteType;
    }
    public function getExteEdition()
    {
        return $this->exteEdition;
    }

    //setters
    public function setIsbnOuvr($isbnOuvr)
    {
        $sql= "UPDATE ouvrage SET isbnOuvr = '$isbnOuvr' WHERE isbnOuvr = '$this->isbnOuvr'";
       
        if ( Connexion::pdo()->query($sql) === TRUE) {
        echo "Enregistrement mis à jour avec succès";
        } else {
        echo "Erreur de mise à jour de l'enregistrement ";
        }
    }

    public function setTitreOuvr($titreOuvr)
    {
        $sql= "UPDATE ouvrage SET titreOuvr = '$titreOuvr' WHERE isbnOuvr = '$this->isbnOuvr'";
       
        if ( Connexion::pdo()->query($sql) === TRUE) {
        echo "Enregistrement mis à jour avec succès";
        } else {
        echo "Erreur de mise à jour de l'enregistrement ";
        }
    }

    public function setLanguageOuvr($languageOuvr)
    {
        $sql= "UPDATE ouvrage SET languageOuvr = '$languageOuvr' WHERE isbnOuvr = '$this->isbnOuvr'";
       
        if ( Connexion::pdo()->query($sql) === TRUE) {
        echo "Enregistrement mis à jour avec succès";
        } else {
        echo "Erreur de mise à jour de l'enregistrement ";
        }
    }

    public function setDatePublicationOuvr($datePublicationOuvr)
    {
        $sql= "UPDATE ouvrage SET datePublicationOuvr = '$datePublicationOuvr' WHERE isbnOuvr = '$this->isbnOuvr'";
       
        if ( Connexion::pdo()->query($sql) === TRUE) {
        echo "Enregistrement mis à jour avec succès";
        } else {
        echo "Erreur de mise à jour de l'enregistrement ";
        }
    }

    public function setNbPageOuvr($nbPageOuvr)
    {
        $sql= "UPDATE ouvrage SET nbPageOuvr = 'nbPage' WHERE isbnOuvr = '$this->isbnOuvr'";
       
        if ( Connexion::pdo()->query($sql) === TRUE) {
        echo "Enregistrement mis à jour avec succès";
        } else {
        echo "Erreur de mise à jour de l'enregistrement ";
        }
    }

    public function setDescriptionOuvr($descriptionOuvr)
    {
        $sql= "UPDATE ouvrage SET descriptionOuvr = '$descriptionOuvr' WHERE isbnOuvr = '$this->isbnOuvr'";
       
        if ( Connexion::pdo()->query($sql) === TRUE) {
        echo "Enregistrement mis à jour avec succès";
        } else {
        echo "Erreur de mise à jour de l'enregistrement ";
        }
    }

    public function setExteGenre($exteGenre)
    {
        $sql= "UPDATE ouvrage SET exteGenre = '$exteGenre' WHERE isbnOuvr = '$this->isbnOuvr'";
       
        if ( Connexion::pdo()->query($sql) === TRUE) {
        echo "Enregistrement mis à jour avec succès";
        } else {
        echo "Erreur de mise à jour de l'enregistrement ";
        }
    }

    public function setExteType($exteType)
    {
        $sql= "UPDATE ouvrage SET exteType WHERE isbnOuvr = '$this->isbnOuvr'";
       
        if ( Connexion::pdo()->query($sql) === TRUE) {
        echo "Enregistrement mis à jour avec succès";
        } else {
        echo "Erreur de mise à jour de l'enregistrement ";
        }
    }

    public function setExteEdition($exteEdition)
    {
        $sql= "UPDATE ouvrage SET exteEdition WHERE isbnOuvr = '$this->isbnOuvr'";
       
        if ( Connexion::pdo()->query($sql) === TRUE) {
        echo "Enregistrement mis à jour avec succès";
        } else {
        echo "Erreur de mise à jour de l'enregistrement ";
        }
    }

    //fonction d'ajout d'un ouvrage
    public function addOuvrage()
    {
        $sql = "INSERT INTO ouvrage (isbnOuvr, titreOuvr, languageOuvr, datePublicationOuvr, nbPageOuvr, descriptionOuvr, exteGenre, exteType, exteEdition) 
        VALUES ('$this->isbnOuvr', '$this->titreOuvr', '$this->languageOuvr', '$this->datePublicationOuvr', '$this->nbPageOuvr', '$this->descriptionOuvr', '$this->exteGenre', '$this->exteType', '$this->exteEdition')";
        if (Connexion::pdo()->query($sql) === TRUE) {
            echo "Enregistrement ajouté avec succès";
        } else {
            echo "Erreur d'ajout de l'enregistrement ";
        }
    }

    //fonction de suppression d'un ouvrage
    public function deleteOuvrage()
    {
        $sql = "DELETE FROM ouvrage WHERE isbnOuvr = '$this->isbnOuvr'";
        if (Connexion::pdo()->query($sql) === TRUE) {
            echo "Enregistrement supprimé avec succès";
        } else {
            echo "Erreur de suppression de l'enregistrement ";
        }
    }

    //fonction de recherche d'un ouvrage
    public function searchOuvrage()
    {
        $sql = "SELECT * FROM ouvrage WHERE isbnOuvr = '$this->isbnOuvr'";
        $result = Connexion::pdo()->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "isbnOuvr: " . $row["isbnOuvr"]. " - titreOuvr: " . $row["titreOuvr"]. " - languageOuvr: " . $row["languageOuvr"]. " - datePublicationOuvr: " . $row["datePublicationOuvr"]. " - nbPageOuvr: " . $row["nbPageOuvr"]. " - descriptionOuvr: " . $row["descriptionOuvr"]. " - exteGenre: " . $row["exteGenre"]. " - exteType: " . $row["exteType"]. " - exteEdition: " . $row["exteEdition"]. "<br>";
            }
        } else {
            echo "0 results";
        }
    }

    //fonction de recherche d'un ouvrage
    public function searchOuvrageByTitle()
    {
        $sql = "SELECT * FROM ouvrage WHERE titreOuvr = '$this->titreOuvr'";
        $result = Connexion::pdo()->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "isbnOuvr: " . $row["isbnOuvr"]. " - titreOuvr: " . $row["titreOuvr"]. " - languageOuvr: " . $row["languageOuvr"]. " - datePublicationOuvr: " . $row["datePublicationOuvr"]. " - nbPageOuvr: " . $row["nbPageOuvr"]. " - descriptionOuvr: " . $row["descriptionOuvr"]. " - exteGenre: " . $row["exteGenre"]. " - exteType: " . $row["exteType"]. " - exteEdition: " . $row["exteEdition"]. "<br>";
            }
        } else {
            echo "0 results";
        }
    }

    //fonction de recherche d'un ouvrage
    public function searchOuvrageByGenre()
    {
        $sql = "SELECT * FROM ouvrage INNER JOIN genre on ouvrage.genre = genre.idGenre WHERE genre.libelleGenre = '$this->genre'";
        $result = Connexion::pdo()->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "isbnOuvr: " . $row["isbnOuvr"]. " - titreOuvr: " . $row["titreOuvr"]. " - languageOuvr: " . $row["languageOuvr"]. " - datePublicationOuvr: " . $row["datePublicationOuvr"]. " - nbPageOuvr: " . $row["nbPageOuvr"]. " - descriptionOuvr: " . $row["descriptionOuvr"]. " - exteGenre: " . $row["exteGenre"]. " - exteType: " . $row["exteType"]. " - exteEdition: " . $row["exteEdition"]. "<br>";
            }
        } else {
            echo "0 results";
        }
    }

    //fonction de recherche d'un ouvrage
    public function searchOuvrageByType()
    {
        $sql = "SELECT * FROM ouvrage INNER JOIN type on ouvrage.extetype = type.idType WHERE type.libelleType = '$this->type'";
        $result = Connexion::pdo()->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "isbnOuvr: " . $row["isbnOuvr"]. " - titreOuvr: " . $row["titreOuvr"]. " - languageOuvr: " . $row["languageOuvr"]. " - datePublicationOuvr: " . $row["datePublicationOuvr"]. " - nbPageOuvr: " . $row["nbPageOuvr"]. " - descriptionOuvr: " . $row["descriptionOuvr"]. " - exteGenre: " . $row["exteGenre"]. " - exteType: " . $row["exteType"]. " - exteEdition: " . $row["exteEdition"]. "<br>";
            }
        } else {
            echo "0 results";
        }
    }

    //fonction de recherche d'un ouvrage
    public function searchOuvrageByEdition()
    {
        $sql = "SELECT * FROM ouvrage INNER JOIN edition on ouvrage.exteEdition = edition.idEdition WHERE edition.libelleEdition = '$this->edition'";
        $result = Connexion::pdo()->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "isbnOuvr: " . $row["isbnOuvr"]. " - titreOuvr: " . $row["titreOuvr"]. " - languageOuvr: " . $row["languageOuvr"]. " - datePublicationOuvr: " . $row["datePublicationOuvr"]. " - nbPageOuvr: " . $row["nbPageOuvr"]. " - descriptionOuvr: " . $row["descriptionOuvr"]. " - exteGenre: " . $row["exteGenre"]. " - exteType: " . $row["exteType"]. " - exteEdition: " . $row["exteEdition"]. "<br>";
            }
        } else {
            echo "0 results";
        }
    }


    //fonction de recherche d'un ouvrage
    public function searchOuvrageByEditor()
    {
        $sql = "SELECT * FROM ouvrage WHERE exteEditeur = '$this->exteEditeur'";
        $result = Connexion::pdo()->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "isbnOuvr: " . $row["isbnOuvr"]. " - titreOuvr: " . $row["titreOuvr"]. " - languageOuvr: " . $row["languageOuvr"]. " - datePublicationOuvr: " . $row["datePublicationOuvr"]. " - nbPageOuvr: " . $row["nbPageOuvr"]. " - descriptionOuvr: " . $row["descriptionOuvr"]. " - exteGenre: " . $row["exteGenre"]. " - exteType: " . $row["exteType"]. " - exteEdition: " . $row["exteEdition"]. "<br>";
            }
        } else {
            echo "0 results";
        }
    }

    //fonction de recherche d'un ouvrage en fonction de l'auteur ou du titre ou du genre ou du type ou de l'edition ou de l'editeur
    public function searchOuvrageByAuteurOrTitreOrGenreOrTypeOrEditionOrEditor()
    {
        $sql = "SELECT * FROM ouvrage INNER JOIN genre on ouvrage.genre = genre.idGenre INNER JOIN type on ouvrage.extetype = type.idType INNER JOIN edition on ouvrage.exteEdition = edition.idEdition WHERE ouvrage.titreOuvr = '$this->titreOuvr' OR ouvrage.exteAuteur = '$this->exteAuteur' OR genre.libelleGenre = '$this->genre' OR type.libelleType = '$this->type' OR edition.libelleEdition = '$this->edition' OR ouvrage.exteEditeur = '$this->exteEditeur'";
        $result = Connexion::pdo()->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "isbnOuvr: " . $row["isbnOuvr"]. " - titreOuvr: " . $row["titreOuvr"]. " - languageOuvr: " . $row["languageOuvr"]. " - datePublicationOuvr: " . $row["datePublicationOuvr"]. " - nbPageOuvr: " . $row["nbPageOuvr"]. " - descriptionOuvr: " . $row["descriptionOuvr"]. " - exteGenre: " . $row["exteGenre"]. " - exteType: " . $row["exteType"]. " - exteEdition: " . $row["exteEdition"]. "<br>";
            }
        } else {
            echo "0 results";
        }
    }
    

   
    //fonction statique de recherche d'un ouvrage
    public static function searchOuvrageGeneral($titreOuvr, $exteAuteur, $genre, $type, $edition, $exteEditeur)
    {
        $sql = "SELECT * FROM ouvrage INNER JOIN genre on ouvrage.genre = genre.idGenre INNER JOIN type on ouvrage.extetype = type.idType INNER JOIN edition on ouvrage.exteEdition = edition.idEdition WHERE ouvrage.titreOuvr = '$titreOuvr' OR ouvrage.exteAuteur = '$exteAuteur' OR genre.libelleGenre = '$genre' OR type.libelleType = '$type' OR edition.libelleEdition = '$edition' OR ouvrage.exteEditeur = '$exteEditeur'";
        $result = Connexion::pdo()->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "isbnOuvr: " . $row["isbnOuvr"]. " - titreOuvr: " . $row["titreOuvr"]. " - languageOuvr: " . $row["languageOuvr"]. " - datePublicationOuvr: " . $row["datePublicationOuvr"]. " - nbPageOuvr: " . $row["nbPageOuvr"]. " - descriptionOuvr: " . $row["descriptionOuvr"]. " - exteGenre: " . $row["exteGenre"]. " - exteType: " . $row["exteType"]. " - exteEdition: " . $row["exteEdition"]. "<br>";
            }
        } else {
            echo "0 results";
        }
    }
    
    //fonction satic recuperer tous les ouvrages dans un array
    public static function getAllOuvrages()
    {
        $sql = "SELECT * FROM ouvrage";
        $result = Connexion::pdo()->query($sql);
        $ouvrages = [];
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $ouvrages[] = $row;
            }
        } else {
            echo "0 results";
        }
        return $ouvrages;
    }

    //fonction afficher livre en html // css sans bootstrap 
    public static function displayOuvrage($ouvrages)
    {
        foreach ($ouvrages as $ouvrage) {
            echo '<div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title>'.$ouvrage['titreOuvr'].'</h5>
                <p class="card-text>'.$ouvrage['descriptionOuvr'].'</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>';
        }
    } 




}


?>