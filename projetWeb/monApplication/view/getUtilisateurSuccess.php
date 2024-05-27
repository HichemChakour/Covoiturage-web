<div class="w3-row-padding w3-container">
    
<div class="w3-card w3-container w3-margin">
    <?php 
echo '<h3><b>Information:</b></h3>';
echo $context->utilisateur->_toString();
?>
</div>
<div class="w3-card  w3-container  w3-margin">
<?php
$context->reservations=reservationTable::getReservationByUtilisateur($context->utilisateur->id);
if($context->reservations!=null){
echo '<h3><b>Liste des réservations :</b></h3>';

foreach ($context->reservations as $reservation): ?>
    
        <?php echo $reservation->_toString(); ?>
    
<?php endforeach;} ?>
</div>
</div>