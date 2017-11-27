<?php session_start();
require_once 'autoload.php';
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>SeeU</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
        <script src="js/jquery-3.2.1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style_pop-up.css">
        <script src="js/script_pop-up.js" type="text/javascript"></script> 


         <link rel="stylesheet" type="text/css" href="css/style_accueil_nonconnecte.css">

    </head>
    <body>
        <div id="page_accueil" class="">
        <div id="logo_accueil">
            <img src="images/logo3.png" height="200"/>
        </div>
        
        <div id="menu">
            <a><i class="fa fa-user-circle fa-3x" aria-hidden="true"></i></a>
            <?php if(!is_null($_SESSION['id_user'])){?>
                &nbsp;
                &nbsp;
                &nbsp;
                <a href="accueil_nonconnecte.html"><i class="fa fa-sign-out fa-3x" aria-hidden="true"></i></a>
            <?php } ?>
        </div>
        
        <?php 
        if(is_null($_SESSION['id_user'])){
        ?>
        <div id="partie_centrale">
            <table id="tableau_accueil">
                <tr>
                    <td>
                        <h2>NOTRE SITE</h2>
                    </td>
                    <td>
                        <h2>REJOIGNEZ</h2>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="p_info">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tincidunt ligula id justo dapibus, sed lobortis mauris egestas. Nunc elementum pharetra molestie. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac ullamcorper tortor. In imperdiet vel lectus ac elementum. Sed luctus molestie lacus non aliquet. Curabitur pulvinar felis in vestibulum tincidunt. Cras pellentesque convallis libero, nec malesuada leo tincidunt quis. Donec tempor ante ut accumsan imperdiet. Duis maximus augue id neque aliquet, sit amet viverra dui varius. Quisque auctor imperdiet mi, sed molestie neque dictum quis. Mauris nec fringilla mauris. Suspendisse potenti. Mauris ac sapien placerat, placerat arcu quis, gravida enim. Aliquam dapibus velit mollis, facilisis ligula vel, convallis dui.
                        </p>
                    </td>    
                    <td>
                        <form class="formulaire_accueil" action="chat.php" method="POST">
                            <label><b>ID : </b></label>
                            <input type="text" name="id-rejoindre"/>
                            <br/><br/>
                            <label><b>Mot de passe : </b></label>
                            <input type="password" name="password-rejoindre"/>
                            <br/><br/>
                            <input type="submit"/>
                        </form>
                    </td>
                </tr>      
            </table>
        </div>
        
        <?php 
        } else {
        ?>
        <div id="partie_centrale">
            <table id="tableau_accueil">
                <tr>
                    <td>
                        <h2>CREEZ</h2>
                    </td>
                    <td>
                        <h2>REJOIGNEZ</h2>
                    </td>
                </tr>
                <tr>
                    <td>
                        <form class="formulaire_accueil" action="chat.php" method="POST">
                                <label><b>ID : </b></label>
                                <input type="text" name="id-creer" value="1458"/>
                                <br/><br/>
                                <label><b>Mot de passe : </b></label>
                                <input type="password" name="password-creer"/>
                                <br/><br/>
                                <input type="submit"/>
                            </form>
                        </td>     
                    <td>
                        <form class="formulaire_accueil" action="chat.php" method="POST">
                            <label><b>ID : </b></label>
                            <input type="text" name="id-rejoindre"/>
                            <br/><br/>
                            <label><b>Mot de passe : </b></label>
                            <input type="password" name="password-rejoindre"/>
                            <br/><br/>
                            <input type="submit"/>
                        </form>
                    </td>
                </tr>      
            </table>
        </div>
        <?php } ?>
            
        </div>
        
        
        <div class="row pop-up big-popup">
            <div class="box small-6 large-centered">
                <a href="#" class="close-button">&#10006;</a>
                        <?php if(empty($_POST['username_co']) && empty($_POST['username_inscr'])) {
                        ?>
                        <div id="partie_centrale_popup">
                            <table id="tableau_popup">
                                    <tr>
                                    <td>
                                        <h2>NOUVEAU ?</h2>
                                    </td>
                                    <td>
                                        <h2>HABITUE ?</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div>
                                                <form action="" method="post">

                                                    <input type="text" name="username_inscr" placeholder="Pseudo" required="required"/></br>
                                                    <input type="email" name="email_inscr" placeholder="Adresse Mail" required="required"/></br>
                                                    <input type="password" name="password_inscr" placeholder="Mot de passe" required="required"/></br>
                                                    <input type="password" name="password2_inscr" placeholder="Vérification Mot de passe" required="required"/></br>
                                                    <button type="submit">S'inscrire</button>

                                                </form>
                                            </div>
                                    </td>    
                                    <td>

                                            <div>
                                                <form action="" method="post">

                                                    <input type="text" name="username_co" placeholder="Pseudo" required="required"/></br>
                                                    <input type="password" name="password_co" placeholder="Mot de passe" required="required"/></br>
                                                    <a href="#">Mot de passe oublié</a></br>
                                                    <button type="submit">Se connecter</button></br>

                                                </form>
                                            </div>
                                    </td>
                                </tr> 
                            </table>
                        </div>
            
            
                        <?php 
                        } else {
                            echo "1";
                           if(!empty($_POST['username_co']) && empty($_POST['username_inscr'])){
                               /*
                                $pdo=new Mypdo();
                                $utilisateurmanager = new UtilisateurManager($pdo);
                                
                                $utilisateur = $utilisateurmanager->getPersonneByLog(1);
                                var_dump($utilisateur);     
                                echo $utilisateur;*/
                                
                           } else {
                               if(empty($_POST['username_co']) && !empty($_POST['username_inscr'])){
                                  echo '#####'.$_POST['username_inscr'];
                               } else {
                                   
                               }
                           }
                           echo "2";
                           ?>
                           <div id="partie_centrale_popup">
                                <h2>Modifier votre profil</h2>
                                <form action="" method="post">
                                    <input type="text" name="username" placeholder="Pseudo" required="required"/></br>
                                    <input type="email" name="username" placeholder="Adresse Mail" required="required"/></br>
                                    <input type="password" name="password" placeholder="Mot de passe" required="required"/></br>
                                    <input type="password" name="password" placeholder="Vérification Mot de passe" required="required"/></br>
                                    <button type="submit">Modifier</button>
                                    <input type="button" value="Supprimer mon compte" />
                                </form>
                            </div><?php
                        }
                        
                        ?>
                </div>
        </div>
    </body>
</html>
