<?php
//si les post sont bien initialisés on crée une reservation pour chaque voyage selectionné
if (isset($_POST['UserName']) && isset($_POST['PassWord']) && isset($_POST['Nom']) && isset($_POST['Prenom'])){
    $context->UserName=$_POST['UserName'];
    $context->PassWord=$_POST['PassWord'];
    $context->Nom=$_POST['Nom'];
    $context->Prenom=$_POST['Prenom'];
    $context->insert=utilisateurTable::creatUser($context->UserName,$context->PassWord,$context->Nom,$context->Prenom);
    if($context->insert==false){
        $context->setNotif("impossibe d'inscrire l'utilisateur");
    }else{
    $context->utilisateur=utilisateurTable::getUserByLoginAndPass($context->UserName,$context->PassWord);
    if($context->utilisateur==null){
        $context->setNotif("Utilisateur inconnu");
    }else{
      //si les post sont bien initialisés on crée une reservation pour chaque voyage selectionné
        if($context->utilisateur->pass==$context->PassWord){
            $context->setNotif("Connexion réussie");
            $_SESSION['UserName'] = $context->utilisateur->identifiant;
            $_SESSION['PassWord'] = $context->utilisateur->pass;
            $_SESSION['id'] = $context->utilisateur->id;
            $_SESSION['nom'] = $context->utilisateur->nom;
            $_SESSION['prenom'] = $context->utilisateur->prenom;
            $_SESSION['avatar'] = $context->utilisateur->avatar;
            
           
            

        }
    } 
    //si la session est bien initialisée on affiche les boutons deconnexion et publier un trajet sinon on affiche les boutons connexion et inscription
    if($context->getSessionAttribute('UserName')): ?>

      <a onclick="info(<?php echo $context->getSessionAttribute('id') ?>)"class="w3-bar-item w3-button w3-right w3-hover-red w3-text-grey"><h3><img src="<?php if($context->getSessionAttribute('avatar')!=null){echo $context->getSessionAttribute('avatar');}else{echo"images/avatar.png";}?>"width="50" height="50"></h3></a>
      <a href="https://pedago.univ-avignon.fr/~uapv2202051/squelette_L3/monApplication.php?action=Deconnexion" id="btnDeCo" class="w3-bar-item w3-button w3-right w3-hover-red w3-text-grey"><h3><i class="fa fa-search">Déconnexion</i></h3></a>
      <a  onclick="ajouter()" id="btnAjt" class="w3-bar-item w3-button w3-right w3-hover-red w3-text-grey"><h3><i>Publier un trajet</i></h3></a>
      <?php else : ?>
        <a  id="btnCo" class="w3-bar-item w3-button w3-right w3-hover-red w3-text-grey"><h3><i>Connexion</i></h3></a>
      <a  id="btnIn" class="w3-bar-item w3-button w3-right w3-hover-red w3-text-grey"><h3><i>Inscription</i></h3></a>
     
    <?php endif; 
    }
    //sinon on affiche le formulaire d'inscription
}else{
   

?>

<div class="w3-display-container w3-content w3-hide-small" style="max-width:900px">
  <img class="w3-image" src="images/route.jpg" alt="London" width="900" height="700">
  <div class="w3-display-middle" style="width:65%">
  <div class="w3-card-4">
  <div class="w3-container w3-orange">
      <h2 class="w3-text-white">Inscrivez vous</h2>
  </div>

    <!-- Tabs -->
    <div class="w3-container w3-white">
    <div class="w3-row-padding">
            <div class="w3-half">
            <p>
            <label for="Nom">Nom :</label>
            <input  class="w3-input " type="text" id="Nom" name="Nom" required>
            </p>
            </div>

            <div class="w3-half">
            <p>
            <label for="Prenom">Prenom :</label>
            <input  class="w3-input " type="text" id="Prenom" name="Prenom" required>
            </p>
            </div>
            
            <div class="w3-half">
            <p>
            <label for="UserName">UserName :</label>
            <input  class="w3-input " type="text" id="UserName" name="UserName" required>
            </p>
            </div>
            
            <div class="w3-half">
            <p>
            <label for="PassWord">PassWord :</label>
            <input  class="w3-input " type="password" id="PassWord" name="PassWord" required>
            </p>
            </div>
      </div>
      <p><button  id="btnInsciption" class="w3-round w3-button w3-orange w3-text-white w3-hover-red" onclick="Inscription()" >Inscription</button></p>
    </div>
  </div>
</div>

<?php } ?>