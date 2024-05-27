<?php

class mainController
{

	public static function helloWorld($request,$context)
	{
		$context->mavariable="hello world";
		$context->setNotif("Notif: vous etes sur helloWorld ");
		return context::SUCCESS;
	}

	public static function index($request,$context){
		$context->setNotif("Notif: vous etes sur index ");
		return context::SUCCESS;
	}

	public static function superTest($request,$context){
		$context->variable1=$request['param1'];
		$context->variable2=$request['param2'];
		$context->setNotif("Notif: vous etes sur supertext");
		return context::SUCCESS;
	}

	//https://pedago.univ-avignon.fr/~uapv2202051/squelette_L3/monApplication.php?action=getTrajet&depart=Angers&arrivee=Amiens
	public static function getTrajet($request,$context){
		$context->setNotif("Notif: Voici les trajets correspondant à votre recherche");
		$context->depart=$request["depart"];
		$context->arrivee=$request["arrivee"];
		$context->trajet=trajetTable::getTrajet($context->depart,$context->arrivee);
		return context::SUCCESS;
	}

	//https://pedago.univ-avignon.fr/~uapv2202051/squelette_L3/monApplication.php?action=getVoyage&trajet=355
	public static function getVoyage($request,$context){
		$context->setNotif(" Voici les voyages correspondant à votre recherche");
		/*if (isset($request["trajet"])){
			$context->trajet=$request["trajet"];
		}*/
		if (isset($request["depart"]) && isset($request["arrivee"]) && isset($request["passager"])){
			if($request["passager"]!=null){
				$context->depart=$request["depart"];
				$context->arrivee=$request["arrivee"];
				$context->passager=$request["passager"];
				$context->correspondance=voyageTable::getCorrespondance($context->depart,$context->arrivee,$context->passager);
			}
		}else if (isset($request["depart"]) && isset($request["arrivee"])){
			$context->depart=$request["depart"];
			$context->arrivee=$request["arrivee"];
			$context->trajet=trajetTable::getTrajet($context->depart,$context->arrivee);
			$context->voyages=voyageTable::getVoyageBytrajet($context->trajet);
		}
		
		
		return context::SUCCESS;
	}

	//https://pedago.univ-avignon.fr/~uapv2202051/squelette_L3/monApplication.php?action=getReservation&voyage=1
	public static function getReservation($request,$context){
		$context->voyage=$request["voyage"];
		$context->reservations=reservationTable::getReservationByVoyage($context->voyage);
		return context::SUCCESS;
	}

	//https://pedago.univ-avignon.fr/~uapv2202051/squelette_L3/monApplication.php?action=getUtilisateur&id=1
	public static function getUtilisateur($request,$context){
		$context->id=$request["id"];
		$context->utilisateur=utilisateurTable::getUserById($context->id);
		return context::SUCCESS;
	}

	public static function formulaire($request,$context){
		return context::SUCCESS;
	}

	public static function Connexion($request,$context){
		return context::SUCCESS;
	}

	public static function Deconnexion($request,$context){
		return context::SUCCESS;
	}

	public static function Inscription($request,$context){
		return context::SUCCESS;
	}

	public static function reserver($request,$context){
		return context::SUCCESS;
	}

	public static function ajouter($request,$context){
		return context::SUCCESS;
	}

	
}
