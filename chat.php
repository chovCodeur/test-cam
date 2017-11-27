<?php
/*
// Inutile d'expliquer la présence du session_start().


// { Début - Première partie
if(!empty($_POST) OR !empty($_FILES))
{
    $_SESSION['sauvegarde'] = $_POST ;
    $_SESSION['sauvegardeFILES'] = $_FILES ;
    
    $fichierActuel = $_SERVER['PHP_SELF'] ;
    if(!empty($_SERVER['QUERY_STRING']))
    {
        $fichierActuel .= '?' . $_SERVER['QUERY_STRING'] ;
    }
    
    header('Location: ' . $fichierActuel);
    exit;
}
// } Fin - Première partie

// { Début - Seconde partie
if(isset($_SESSION['sauvegarde']))
{
    $_POST = $_SESSION['sauvegarde'] ;
    $_FILES = $_SESSION['sauvegardeFILES'] ;
    
    unset($_SESSION['sauvegarde'], $_SESSION['sauvegardeFILES']);
}
// } Fin - Seconde partie
*/
?>


<!DOCTYPE html>
<html>
    <head>
        <title>SeeU</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> 
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style_chat_nonconnecte.css" />
        <link rel="stylesheet" href="css/style_pop-up.css" />
        <link rel="icon" type="image/png" href="images/favicon.png" />  
        <script src="js/jquery-3.2.1.js"></script>
        <script src="js/script_pop-up.js" type="text/javascript"></script> 
        <?php 
        if(!(is_null($_POST['id-creer']))){
            // on arrive depuis le form creer
            ?>
            <script>
                var type_conv = "creer";
                var id_salon=<?php echo $_POST['id-creer'];?>;
            </script>
            
        <?php   
        } else {
            if(!(is_null($_POST['id-rejoindre']))){
            //on arrive depuis le form rejoindre
            ?>
            <script>
                var type_conv = "rejoindre";
                var id_salon=<?php echo $_POST['id-rejoindre'];?>;
            </script>
            <?php
            } else {
				?><script>
				var type_conv = "rejoindre";
                var url = location.href;
				console.log(url);
				var res = url.split('#');
				var id_salon=res[1];
				</script><?php
            }
        }
    
    
        ?>      
        <script>
            if(!location.hash.replace('#', '').length) {
				
                location.href = location.href.split('#')[0] + '#' + id_salon;
                location.reload();
            }
        </script>

        <title>Intégration</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

       <!-- <script>
       // document.createElement('article');
        </script>-->

        <!-- scripts used for broadcasting -->
        
        <script type="text/javascript" src="js/socket.io.js"></script>
        <script type="text/javascript" src="js/RTCMultiConnection.js"></script>  
    </head>
    <body>
    
    
        
        <aside id="aside">
            <img id="logo" alt="logo" src="images/logo3.png"/>
            <div id="salon" class='bouton-cache'>Salon n°1234</div>
            <div id="participants">Participants</div>
            <ul id="listeParticipants">
                <li>Claude</li>
                <li>Luc</li>
                <li>
                    <span id="admin">Geneviève</span>
                </li>
                <li>Capucine</li>
                <li id="user">Francis</li>
            </ul>
            
            <div class="type-1">
                <a href="" class="bouton bouton-1">
                  <span class="txt">Au revoir</span>
                  <span class="round"><i class="fa fa-chevron-right"></i></span>
                </a>
            </div>
            
            <br/>
            <div id="volumeGeneral">
                <p id="texteVolumeGeneral">Volume général</p>
                <input type="range" min="0" max="100" value="50" oninput="document.getElementById('AfficheRange').textContent=value" />
                <span id="AfficheRange">50</span>
            </div>
            
        </aside>
        <section id="section" class="experiment">
            <input type="hidden" id="conference-name" value="<?php echo $_POST['id-creer']; ?>">                    
            <button type="hidden" id="setup-new-conference" class="setup"></button>

            <table style="width: 100%;" id="rooms-list"></table>

            <!--local/remote videos container--> 
            <div id="videos-container"></div>
            <!--<div class="row">
                <div class="col-md-4 camera">
                    <img alt="camera 1" src="images/avatar.png">
                    <div class="volume">
                        <input type="range" min="0" max="100" value="50"/>
                    </div>
                </div>
                <div class="col-md-4 camera">
                    <img alt="camera 1" src="images/avatar.png">
                    <div class="volume">
                        <input type="range" min="0" max="100" value="50"/>
                    </div>
                </div>
                <div class="col-md-4 camera">
                    <img alt="camera 1" src="images/avatar.png">
                    <div class="volume">
                        <input type="range" min="0" max="100" value="50"/>
                    </div>
                </div>
                <div class="w-100"></div>
                <div class="col-md-6 camera">
                    <img alt="camera 1" src="images/avatar.png">
                    <div class="volume">
                        <input type="range" min="0" max="100" value="50"/>
                    </div>
                </div>
                <div class="col-md-6 camera">
                    <img alt="camera 1" src="images/avatar.png">
                    <div class="volume">
                        <input type="range" min="0" max="100" value="50"/>
                    </div>
                </div>
            </div>-->
        <script type="text/javascript" src="js/connexion_serveur.js"></script>

        <script>
            $(document).ready(function(){
                document.getElementById("setup-new-conference").style.visibility = "hidden";
                if(type_conv=="creer"){
                    if(document.getElementById("setup-new-conference")) {
                        document.getElementById("setup-new-conference").click();
                        var elem = document.querySelector('#setup-new-conference');
                        console.log(elem);
                        elem.parentNode.removeChild(elem);                
                    }
                }
            });
        </script>
       
        </article>
        
        <div class="row pop-up little-popup" id='popup-promotion'>
            <div class="box small-6 large-centered">
                <a href="#" class="close-button">&#10006;</a>
                <div id="partie_centrale_popup">
                    <h2>FELICITATIONS !</h2>
                    <p>
                        Vous avez été nommé Administrateur du Salon 0485 par XX-XXXXXXXXX.
                    </p>
                    <form action="" method="post">
                        <button type="submit">C'est noté</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>