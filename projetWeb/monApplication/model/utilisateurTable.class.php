<?php
// Inclusion de la classe utilisateur
require_once "utilisateur.class.php";

class utilisateurTable {
	

  public static function getUserByLoginAndPass($login,$pass){
  	$em = dbconnection::getInstance()->getEntityManager() ;
	$userRepository = $em->getRepository('utilisateur');
	$user = $userRepository->findOneBy(array('identifiant' => $login, 'pass' =>/* sha1*/($pass)));	
	
	
	return $user; 
	}
	//retourne un utilisateur en fonction de son id
	public static function getUserById($id)
	{
	$em = dbconnection::getInstance()->getEntityManager() ;
	$userRepository = $em->getRepository('utilisateur');
	$user = $userRepository->findOneBy(array('id' => $id));	
	return $user;
	}
	//creer un utilisateur
	public static function creatUser($UserName,$PassWord,$Nom,$Prenom) {  
        $em = dbconnection::getInstance()->getEntityManager()->getConnection() ;
		// Préparation de la requête pour inserer un utilisateur
        $query = $em->prepare("INSERT INTO jabaianb.utilisateur (identifiant, pass, nom, prenom) VALUES (?, ?, ?, ?);");
    
        // Liaison des valeurs aux placeholders dans la requête
        $query->bindParam(1, $UserName);
        $query->bindParam(2, $PassWord);	
		$query->bindParam(3, $Nom);
		$query->bindParam(4, $Prenom);

        $bool = $query->execute();
    
		return $bool;
		
       
    }

  
}


?>
