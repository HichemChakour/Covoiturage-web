
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
  <head>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
       <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
       <audio id="audioPlayer" src="images/tu-tu-tu-du-max-verstappen.mp3"></audio>
    <title>
     HICAR
    </title>
   
  </head>

  <body class="w3-light-grey">

 
    <div id="notif" class=" w3-green"></div>
    <div class="w3-bar w3-white w3-border-bottom w3-xlarge">
    <a id="hicar"><h3 class="w3-bar-item w3-button  w3-text-red w3-hover-red"><b><i class="w3-margin-right ">HICAR</i></b></h3></a>
    <div id='bar'>
    
    <?php
    //si la session exit on affiche les boutons deconnexion et ajouter un trajet sinon on affiche les boutons connexion et inscription 
     if($context->getSessionAttribute('UserName')): ?>

      <a onclick="info(<?php echo $context->getSessionAttribute('id') ?>)"class="w3-bar-item w3-button w3-right w3-hover-red w3-text-grey"><h3><img src="<?php if($context->getSessionAttribute('avatar')!=null){echo $context->getSessionAttribute('avatar');}else{echo"images/avatar.png";}?>"width="50" height="50"></h3></a>
      <a href="https://pedago.univ-avignon.fr/~uapv2202051/squelette_L3/monApplication.php?action=Deconnexion" id="btnDeCo" class="w3-bar-item w3-button w3-right w3-hover-red w3-text-grey"><h3><i class="fa fa-search">Déconnexion</i></h3></a>
      <a  onclick="ajouter()" id="btnAjt" class="w3-bar-item w3-button w3-right w3-hover-red w3-text-grey"><h3><i>Publier un trajet</i></h3></a>
      <?php else : ?>
  <a  id="btnCo" class="w3-bar-item w3-button w3-right w3-hover-red w3-text-grey"><h3><i>Connexion</i></h3></a>
  <a  id="btnIn" class="w3-bar-item w3-button w3-right w3-hover-red w3-text-grey"><h3><i>Inscription</i></h3></a>
  
  <?php endif; ?>
  </div>
</div>

   

    <div id="page">
      <?php if($context->error): ?>
      	<div id="flash_error" class="error">
        	<?php echo " $context->error !!!!!" ?>
      	</div>
      <?php endif; ?>
      <div class="w3-row-padding">
      <div id="page_maincontent" class="w3-half">	
      	<?php 
          include($template_view);
          ?>
          </div>
           <div id="page_info" class="w3-half"></div>
           
      </div>
            
      
    </div>
      

  </body>

</html>
<script src="js/MinAjax.js"></script>

