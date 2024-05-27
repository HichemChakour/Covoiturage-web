
<div class="w3-display-container w3-content w3-hide-small" style="max-width:900px">
  <img class="w3-image" src="images/route.jpg" alt="London" width="900" height="700">
  <div class="w3-display-middle" style="width:65%">
  <div class="w3-card-4">
  <div class="w3-container w3-orange">
      <h2 class="w3-text-white">Voyagez avec nous</h2>
  </div>
    

    <!-- Tabs -->
    <div class="w3-container w3-white">
    <div class="w3-row-padding">
        <div class="w3-half">
        <p>
        <label for="depart">Depart :</label>
        <input  class="w3-input" type="text" id="depart" name="depart" required>
        </p>
        </div>
        <div class="w3-half">
        <p>
        <label for="arrivee">Arrivée :</label>
        <input  class="w3-input " type="text" id="arrivee" name="arrivee" required>
        </p>
        </div>
        <div class="w3-half">
        <p>
        <label for="arrivee">Passager :</label>
        <input  class="w3-input" type="number" id="passager" name="passager" required>
        </p>
        </div>
        
      </div>
      
      <p><button id="btnForm"  class="w3-round w3-button w3-orange w3-text-white w3-hover-red" onclick='formulaire()'>Rechercher</button></p>
    </div>
  </div>
</div>
</div>