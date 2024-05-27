<?php
// si les post sont bien initialisés on crée un voyage
if (isset($_POST['depart']) && isset($_POST['arrivee']) && isset($_POST['heure']) && isset($_POST['nbplace']) && isset($_POST['prix'])  && isset($_POST['id'])){

    $context->id=$_POST['id'];
    $context->depart=$_POST['depart'];
    $context->arrivee=$_POST['arrivee'];
    $context->heure=$_POST['heure'];
    $context->nbplace=$_POST['nbplace'];
    $context->prix=$_POST['prix'];
    $context->contrainte=$_POST['contrainte'];
    $context->trajet=trajetTable::getTrajet($context->depart,$context->arrivee);
    
    if($context->trajet==null){

        $context->setNotif("Trajet inexistant");
    }
    else if($context->heure<24 && $context->heure>=0 && $context->nbplace>0 && $context->prix>0 && $context->prix<10 && $context->id!=null){

        $context->prix=$context->prix*$context->trajet->distance;
        $context->prix=(int) str_replace(",", "", $context->prix);
       

       
        $context->voyage=voyageTable::creatVoyage($context->trajet->id,$context->heure,$context->nbplace,$context->prix,$context->contrainte,$context->id);
        $context->setNotif("Voyage créé");

    }else{

      $context->setNotif("Erreur dans les données");
    }
    //sinon on affiche le formulaire
}else{
   

?>

<div class="w3-display-container w3-content w3-hide-small" style="max-width:900px">
  <img class="w3-image" src="images/route.jpg" alt="London" width="900" height="700">
  <div class="w3-display-middle" style="width:65%">
  <div class="w3-card-4">
    <div class="w3-container w3-orange">
      <h2 class="w3-text-white">publiez votre voyage</h2>
    </div>
 
    <div class="w3-container w3-white">
    <div class="w3-row-padding">
        <div class="w3-half">
        <p>
        <label>Depart</label>
        <input class="w3-input" type="text" id="depart"></p>
        </div>

        <div class="w3-half">
        <p>   
        <label>Arrivée</label>  
        <input class="w3-input" type="text" id="arrivee"></p>
        </div>
        
        <div class="w3-half">
        <label>Heure de depart</label>  
        <input class="w3-input" type="number" id="heure" min="0" max="23"></p>
        </div>
        
        <div class="w3-half">
        <label>Nombre de voyageur</label>  
        <input class="w3-input" type="number" id="nbplace" min="1" max="10" ></p>
        </div>
        
        <div class="w3-half">
        <label>Tarif par KM</label>  
        <input class="w3-input" type="number" id="prix" min="1" max="10"></p>
        contraintes
        </div>
        <p>
        <textarea class="w3-input" id="contrainte" rows="4" cols="100"  maxlength="500"></textarea>
        
        </p>
       

        
        </div>
        <p><button class="w3-round w3-button w3-orange w3-text-white w3-hover-red" onclick="publier(<?php echo json_encode($context->getSessionAttribute('id'));?>)">Publier</button></p>
        </div>
    
  </div>
    </div>
  </div>

<?php } ?>