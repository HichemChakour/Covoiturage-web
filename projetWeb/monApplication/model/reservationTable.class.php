<?php
require_once "reservation.class.php";

class reservationTable {
    public static function getReservationByVoyage($voyage) {
        $em = dbconnection::getInstance()->getEntityManager();
        $reservationRepository = $em->getRepository('reservation');
        $reservation = $reservationRepository->findBy(array('voyage' => $voyage));
        return $reservation;
    }
    // Ajoutez d'autres méthodes pour la gestion des trajets si nécessaire.
    public static function getReservationByUtilisateur($utilisateur) {
        $em = dbconnection::getInstance()->getEntityManager();
        $reservationRepository = $em->getRepository('reservation');
        $reservation = $reservationRepository->findBy(array('voyageur' => $utilisateur));
        return $reservation;
    }

    //creer une reservation
    public static function creatReservation($voyage,$voyageur,$nbPlace) {  
        $em = dbconnection::getInstance()->getEntityManager()->getConnection() ;
        // Préparation de la requête pour inserer une reservation
        $query = $em->prepare("INSERT INTO jabaianb.reservation (voyage, voyageur) VALUES (?, ?);");
    
       
        $query->bindParam(1, $voyage);
        $query->bindParam(2, $voyageur);
        $bool1 = $query->execute();

        // Préparation de la requête pour mettre à jour le nombre de place
        $query = $em->prepare("UPDATE  jabaianb.voyage SET nbPlace= nbPlace - ? WHERE id = ?;");
    
        
        $query->bindParam(1, $nbPlace);
        $query->bindParam(2, $voyage);
        $bool2 = $query->execute();
        if($bool1 && $bool2){
            $bool = true;
        }else{
            $bool = false;
        }

    
		return $bool;
        }
}
?>
