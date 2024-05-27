<?php
//si les post sont bien initialisés on crée une reservation pour chaque voyage selectionné
if(isset($_POST['ids']) && isset($_POST['User']) && isset($_POST['passager'])){
  
    $context->ids=$_POST['ids'];
    $context->User=$_POST['User'];
    $context->passager=$_POST['passager'];
    foreach ($context->ids as $id): 
        $id = trim($id);
        $id = intval($id);
        if ($id === '' || ($id === 0 && $id !== '0')) {
            
        }else{
            $context->reserv=reservationTable::creatReservation($id,$context->User,$context->passager);
           
                $context->setNotif("Reservation effectuée");
        }   
    endforeach;

}