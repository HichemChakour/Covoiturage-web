
var Jpassager;


$(document).ready(function(){
    //fonction qui permet de charger la page du formulaire
    $("#hicar").click(function(){
        $.ajax({
        
            url: "DispatcherAjax.php",
            type: "POST",
            data: {
                action: "formulaire"
                 
    
            },
            success: function(reponse){
                
    
              $('#page_maincontent').html(reponse);
              
              
            }
        });
    });
    //fonction qui permet de charger la page d'inscription
    $("#btnCo").click(function(){


          $.ajax({
              url: "DispatcherAjax.php",
              type: "POST",
              data: {
                  action: "Connexion",
                    
   
              },
              success: function(reponse){
  
                  $("#page_maincontent").html(reponse);
                  

  
                  $("#notif").text(newNotif);
                  setTimeout(function () {
               $  ("#notif").text("");
                  }, 3000);
              }
          });
      });
      
        //fonction qui permet de charger la page d'inscription
      $("#btnIn").click(function(){


        $.ajax({
            url: "DispatcherAjax.php",
            type: "POST",
            data: {
                action: "Inscription",
                  
 
            },
            success: function(reponse){

                $("#page_maincontent").html(reponse);
                

                $("#notif").text(newNotif);
                setTimeout(function () {
             $  ("#notif").text("");
                }, 3000);
            }
        });
    });   
});

//fonction qui permet de charger la page de connexion
function Connexion(){
    var JUserName = document.getElementById("UserName").value;
    var JPassWord = document.getElementById("PassWord").value;
    console.log(JUserName);
    console.log(JPassWord);
      $.ajax({
          url: "DispatcherAjax.php",
          type: "POST",
          data: {
              action: "Connexion",
                UserName: JUserName,
                PassWord: JPassWord

          },
          success: function(reponse){

            $('#bar').html(reponse);
            
              $("#notif").text(newNotif);
              if(newNotif == "Connexion réussie"){
                //fonction qui permet de charger la page du formulaire dans le cas ou la connexion est réussie
                $.ajax({
        
                    url: "DispatcherAjax.php",
                    type: "POST",
                    data: {
                        action: "formulaire"
                         
            
                    },
                    success: function(reponse){
                        console.log("test");
            
                      $('#page_maincontent').html(reponse);
                      
                    }
                });
              }
              setTimeout(function () {
           $  ("#notif").text("");
              }, 3000);
          }
      });
      
  }
    //fonction qui permet de charger la page d'inscription
   function Inscription(){
    var JNom = document.getElementById("Nom").value;
    var JPrenom = document.getElementById("Prenom").value;
    var JUserName = document.getElementById("UserName").value;
    var JPassWord = document.getElementById("PassWord").value;

    console.log(JUserName);
    console.log(JPassWord);
      $.ajax({
          url: "DispatcherAjax.php",
          type: "POST",
          data: {
              action: "Inscription",
                UserName: JUserName,
                PassWord: JPassWord,
                Nom: JNom,
                Prenom: JPrenom 

          },
          success: function(reponse){

            $('#bar').html(reponse);
            
              $("#notif").text(newNotif);
              if(newNotif == "Connexion réussie"){
                //fonction qui permet de charger la page du formulaire dans le cas ou l'Inscription est réussie
                
                $.ajax({
        
                    url: "DispatcherAjax.php",
                    type: "POST",
                    data: {
                        action: "formulaire"
                         
            
                    },
                    success: function(reponse){
                        console.log("test");
            
                      $('#page_maincontent').html(reponse);
                      
                    }
                });
              }
              setTimeout(function () {
           $  ("#notif").text("");
              }, 3000);
          }
      });

   }
   //fonction qui permet de charger la page de 
   function formulaire(){ 
    
    var Jdepart = document.getElementById("depart").value;
      var Jarrivee = document.getElementById("arrivee").value;
       Jpassager = document.getElementById("passager").value;
        $.ajax({
            url: "DispatcherAjax.php",
            type: "POST",
            data: {
                action: "getVoyage",
                depart: Jdepart,
                arrivee: Jarrivee,
                passager: Jpassager
            },
            success: function(reponse){

                $("#page_info").html(reponse);

                $("#notif").text(newNotif);
                if(newNotif == " Voici les voyages correspondant à votre recherche"){
                  audioPlayer.play();
                }  
                setTimeout(function () {
             $  ("#notif").text("");
                }, 3000);
            }
        });
      }

      //fonction qui permet de charger la page de
      function reserver(ids,identifiant){
        console.log(ids);
        console.log(identifiant);
        console.log(Jpassager);
        
        $.ajax({
            url: "DispatcherAjax.php",
            type: "POST",
            data: {
                action: "reserver",
                ids: ids,
                User: identifiant,
                passager: Jpassager  
            },
            success: function(){
                
                $("#notif").text(newNotif);
                
                //fonction qui permet de charger la page utilisateur dans le cas ou la réservation est réussie
                    $.ajax({
            
                        url: "DispatcherAjax.php",
                        type: "POST",
                        data: {
                            action: "getUtilisateur",
                            id: identifiant
                             
                
                        },
                        success: function(reponse){
                            console.log("test");
                
                          $('#page_info').html(reponse);
                          
                          
                        }
                    });
                    
                setTimeout(function () {
                $("#notif").text("");
                }, 3000);
            }
        });

      }
      //fonction qui permet de charger la page de l'utilisateur
      function info(identifiant){
        $.ajax({
            
            url: "DispatcherAjax.php",
            type: "POST",
            data: {
                action: "getUtilisateur",
                id: identifiant
                 
    
            },
            success: function(reponse){
                console.log("test");
    
              $('#page_info').html(reponse);
              
              
            }
        });
        
      }
      //fonction qui permet de charger la page pour ajouter un voyage
      function ajouter(){
        $.ajax({
            
            url: "DispatcherAjax.php",
            type: "POST",
            data: {
                action: "ajouter"
            },
            success: function(reponse){
                console.log("test");
    
              $('#page_maincontent').html(reponse);
              
              
            }
        });
        
      }
        //fonction qui permet de charger la page pour publier un voyage
      function publier(id){
        console.log(id);
        console.log(document.getElementById("depart").value);
        console.log(document.getElementById("arrivee").value);
        console.log(document.getElementById("heure").value);
        console.log(document.getElementById("prix").value);
        console.log(document.getElementById("nbplace").value);
        console.log(document.getElementById("contrainte").value);

        $.ajax({
            
            url: "DispatcherAjax.php",
            type: "POST",
            data: {
                action: "ajouter",
                id: id,
                depart: document.getElementById("depart").value,
                arrivee: document.getElementById("arrivee").value,
                heure: document.getElementById("heure").value,
                prix: document.getElementById("prix").value,
                nbplace: document.getElementById("nbplace").value,
                contrainte: document.getElementById("contrainte").value

            },
            success: function(reponse){
                
                
                $("#page_info").html(reponse);
    
              $("#notif").text(newNotif);
                setTimeout(function () {
                $("#notif").text("");
                }, 3000);
              
              
            }
        });
        
      }

      