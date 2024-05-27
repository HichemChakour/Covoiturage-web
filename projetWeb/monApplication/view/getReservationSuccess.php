<?php 
foreach ($context->reservations as $reservation){
    echo $reservation->_toString() ,'<br>';
}
?>