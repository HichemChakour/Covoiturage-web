<?php
require_once "trajet.class.php";

class trajetTable {
    // retourne un objet trajet correspondant à l'id
    public static function getTrajet($depart,$arrivee) {
        $em = dbconnection::getInstance()->getEntityManager();
        $trajetRepository = $em->getRepository('trajet');
        $trajet = $trajetRepository->findOneBy(array('depart' => $depart, 'arrivee' =>$arrivee));
        return $trajet;
    }
   
}
?>
