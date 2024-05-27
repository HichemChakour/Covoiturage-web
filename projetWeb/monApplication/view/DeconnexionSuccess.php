<?php
//page deconnexion qui detruit la ssession si on appuis sur le bouton deconnexion dans le menu
session_destroy(); 
$context->redirect("monApplication.php?action=formulaire");
?>