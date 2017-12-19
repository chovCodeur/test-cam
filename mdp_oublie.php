<?php session_start();
require 'PHPMailer/PHPMailerAutoload.php';
require("classe/UtilisateurManager.class.php");
require("classe/Utilisateur.class.php");
require("classe/Mypdo.class.php");

$pdo=new Mypdo();
$utilisateurmanager = new UtilisateurManager($pdo);

?>

<!DOCTYPE html>
<!--
d: & cd Users\Kevin\Documents\Heroku\test-integration-cam
git add . & git commit -m "kk" & git push heroku master
é

To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>SeeU</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
        <script src="js/jquery-3.2.1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
         <link rel="stylesheet" type="text/css" href="css/style_accueil_nonconnecte.css">

    </head>
    <body>
        <div id="page_accueil" class="">
        <div id="logo_accueil">
            <img src="images/logo3.png" height="200"/>
        </div>
            
        <div id="partie_centrale">
            <?php if (!isset($_POST['email_oublie'])) { ?>
            
            <form class="centrer" action="" method="POST">
                <label for="email_oublie">Adresse Email</label>
                <input type="email" name="email_oublie" id="email_oublie"/>
                <input type="submit" value="Valider"/> 
            </form>
            <?php } else {
                $utilisateur=$utilisateurmanager->getUserByEmail($_POST['email_oublie']);
                if($utilisateur==null){
                    ?>
                            <script>
                                alert("L\'adresse email que vous avez saisi ne correspond à aucun compte.");
                                window.location = window.location.href; 
                            </script>
                    <?php
                } else {
                    $password="";
                    // Initialisation des caract�res utilisables
                    $characters = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
                    for($i=0;$i<10;$i++)
                    {
                        $password .= ($i%2) ? strtoupper($characters[array_rand($characters)]) : $characters[array_rand($characters)];
                    }
                    
                    $utilisateur->setMdp_Utilisateur($password);
                    $retour=$utilisateurmanager->modifierUtilisateur($utilisateur);
                    if($retour){
                    
                        $corpsmessage = "Bonjour,<br/>Vous avez demandé un changement de mot de passe sur le site SeeU : <br/> "
                                . "<a href='https://test-integration-cam.herokuapp.com/'>https://test-integration-cam.herokuapp.com/</a><br/><br/>  "
                                . "Nom d\'utilisateur : ".$utilisateur->getPseudo_Utilisateur()." <br/> Nouveau mot de passe : ".$password." <br/><br/>"
                                . "Nous vous conseillons vivement de changer à nouveau le mot de passe lors de votre prochaine connexion sur le site !"
                                . "<br/><br/> Cordialement.";

                        $mail = new PHPMailer;
			$mail->setLanguage('fr', 'PHPMailer-master/language/');                          // Passing `true` enables exceptions
                        try {
                            //Server settings                              // Enable verbose debug output
                            $mail->isSMTP();    
                            $mail->CharSet = 'UTF-8';
                            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                            $mail->SMTPAuth = true;                               // Enable SMTP authentication
                            $mail->Username = 'veggie.crush.masi@gmail.com';                 // SMTP username
                            $mail->Password = 'mdp_enclair';                           // SMTP password
                            //mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                            $mail->Port = 465;                                    // TCP port to connect to

                            //Recipients
                            $mail->setFrom('veggie.crush.masi@gmail.com', 'SeeU Website');
                            $mail->addAddress($utilisateur->getMail_Utilisateur(), $utilisateur->getPseudo_Utilisateur());     // Add a recipient
                            //Content
                            $mail->isHTML(true);                                  // Set email format to HTML
                            $mail->Subject = '[SeeU] Mot de passe oublié';
                            $mail->Body    = $corpsmessage;

                            if($mail->send()){
                            ?>
                            <script>
                                alert("Un nouveau mot de passe vous a été envoyé par mail !");
                                window.location = "index.php";
                            </script>
                            <?php
                            } else {
                                ?>
                                <script>
                                    alert("Echec dans l\'envoie du nouveau mot de passe. Veuillez re-essayer dans quelques instants !");
                                    window.location = window.location.href; 
                                </script>
                                
                                <?php
                            }
                        } catch (Exception $e) {
                            ?>
                            <script>
                                alert("Echec dans l\'envoie du nouveau mot de passe. Veuillez re-essayer dans quelques instants !");
                                window.location = window.location.href; 
                            </script>
                            <?php
                        }
                    }else {
                        ?>
                        <script>
                            alert("Echec dans l\'envoie du nouveau mot de passe. Veuillez re-essayer dans quelques instants !");
                            window.location = window.location.href; 
                        </script>
                        <?php
                    }
                    
                }
                
            }
            ?>
        </div>
        

        </div>
       
    </body>
    
</html>