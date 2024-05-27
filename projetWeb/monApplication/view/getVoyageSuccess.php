<div class="w3-container">
    <?php 
    if($context->correspondance==null){
    $context->setNotif("Pas de voyage");}
    
    else{ ?>
        
    <h3>Liste des voyages <?php echo $context->depart; ?> - <?php echo $context->arrivee; ?></h3>
    
    <?php 
    //pour chaque correspondance on affiche les informations du voyage
    foreach ($context->correspondance as $correspo): ?>
        <div class="w3-card w3-margin  w3-container">
        <?php 
            $ids = explode('-', $correspo['v_id']);
            $prix=0;
            $distance=0;
            //pour chaque id on affiche les informations du voyage
            foreach ($ids as $id): 
                
                $id = trim($id);
                $id = intval($id);
                if ($id === '' || ($id === 0 && $id !== '0')) {
                    
                }else{
                
                $voyage = voyageTable::getVoyageById($id); 
                 echo $voyage->_toString(); 
                    $prix=$prix+$voyage->tarif;
                    $distance=$distance+$voyage->trajet->distance;
                 
                }
                endforeach;?>
                <h4><br>Distance trajet : <?php echo $distance; ?> km
                <br>Prix : <?php echo $prix; ?> €</h4>
                <?php if($context->getSessionAttribute("id")!=null){ ?>
                <p><button id="btnForm" class="w3-button w3-dark-grey" onclick='reserver(<?php echo json_encode($ids);?>, <?php echo json_encode($context->getSessionAttribute("id"));?>)'>Reserver</button></p>
                <?php } ?>

                
        </div>
    <?php endforeach;} ?>
</div>