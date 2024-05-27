<?php
require_once "voyage.class.php";

class voyageTable {
    public static function getVoyageBytrajet($trajet) {
        $em = dbconnection::getInstance()->getEntityManager();
        $voyageRepository = $em->getRepository('voyage');
        $voyages = $voyageRepository->findBy(array('trajet' => $trajet));
        return $voyages;
    }

    
    public static function getVoyageById($id) {
        $em = dbconnection::getInstance()->getEntityManager();
        $voyageRepository = $em->getRepository('voyage');
        $voyage = $voyageRepository->findOneBy(array('id' => $id));
        return $voyage;
    }
    //creer les  correspondances des voyages
    public static function getCorrespondance($depart,$arrivee,$passager) {  
        $em = dbconnection::getInstance()->getEntityManager()->getConnection() ;
        $query = $em->prepare("SELECT * FROM recherche_correspondances(?, ?, ?, 0, 0, '', '')");
    
        // Liaison des valeurs aux placeholders dans la requête
        $query->bindParam(1, $depart);
        $query->bindParam(2, $arrivee);
        $query->bindParam(3, $passager);

        $bool = $query->execute();
        if ($bool == false){
        return NULL;
        }
        return $query->fetchAll(); // retourne un tableau d'enregistrements (tableau de tableaux de valeurs)
    }
    //creer un voyage
    public static function creatVoyage($trajet,$heure,$nbPlace,$prix,$contrainte,$id) {  
        $em = dbconnection::getInstance()->getEntityManager()->getConnection() ;
        $query = $em->prepare("INSERT INTO jabaianb.voyage (conducteur,trajet,tarif,nbplace,heuredepart,contraintes) VALUES (?, ?, ?, ?, ?, ?);");
    
        // Liaison des valeurs aux placeholders dans la requête
        $query->bindParam(1, $id);
        $query->bindParam(2, $trajet);
        $query->bindParam(3, $prix);
        $query->bindParam(4, $nbPlace);
        $query->bindParam(5, $heure);
        $query->bindParam(6, $contrainte);

        $bool = $query->execute();
        return $bool;
    }
}
?>
