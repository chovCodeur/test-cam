<?php session_start();
require_once("include/autoload.inc.php");

$pdo=new Mypdo();
$utilisateurmanager = new UtilisateurManager($pdo);
$salonmanager = new SalonManager($pdo);

if(isset($_SESSION['idsalon'])){
    $salon=$_SESSION['idsalon'];
    unset($_SESSION['idsalon']);
    header("LOCATION: chat.php#".$salon);
}
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
        <link rel="stylesheet" type="text/css" href="css/style_pop-up.css">
        <script src="js/script_pop-up.js" type="text/javascript"></script> 
        <script>
        function modification_profil() { 
            var bt_mod = document.getElementById("modifier_account");
            var mod = document.getElementById("mod_hidden");
            bt_mod.disabled=false;
            mod.value="1";
        }
        
        function modification_mdp() { 
            var mod_passwd = document.getElementById("mod_password1");
            var mod_passwd2 = document.getElementsByName("mod_password2");
            var mod = document.getElementById("mod_hidden");
            var bt_mod = document.getElementById("modifier_account");
            var valeur = mod_passwd.value;
            if(valeur.length>1){
                mod_passwd2.required = true;
                bt_mod.disabled=false;
                mod.value="1";
            } else {
                mod_passwd2.required = false;
            }
            
        }

         

        </script>
        
         <script type="text/javascript">
            function verify_mdp(element1, element2)
             {
              var passed=false
               if (element1.value=='')
               {
                alert("Veuillez entrer votre mot de passe dans le premier champ!")
                element1.focus()
               }
               else if (element2.value=='')
               {
                alert("Veuillez confirmer votre mot de passe dans le second champ!")
                element2.focus()
               }
               else if (element1.value!=element2.value)
               {
                alert("Les deux mots de passe ne sont pas identiques")
                element1.select()
               }
               else
               passed=true
               return passed
             }
             
             function verify_mdp_modif(element1, element2)
             {
              var passed=false
               if (element1.value!='')
               {
                    if (element2.value=='')
                   {
                    alert("Veuillez confirmer votre mot de passe dans le second champ!")
                    element2.focus()
                   }
                   else if (element1.value!=element2.value)
                   {
                    alert("Les deux mots de passe ne sont pas identiques")
                    element1.select()
                   }
                   else
                   passed=true
                   return passed
               }
               else 
               {
                   passed=true
                   return passed
               }
             }
        </script> 
        
        

         <link rel="stylesheet" type="text/css" href="css/style_accueil_nonconnecte.css">

    </head>
    <body>
        <div id="page_accueil" class="">
        <div id="logo_accueil">
            <img src="images/logo3.png" height="200"/>
        </div>
        
        
        <div id="menu">
            <a><i class="fa fa-user-circle fa-3x" aria-hidden="true"></i></a>
            <?php if (isset($_SESSION['id_user'])){
                    if(!is_null($_SESSION['id_user'])){?>
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        <a href="logout.php"><i class="fa fa-sign-out fa-3x" aria-hidden="true"></i></a>
            <?php } } ?>
        </div>
        
        <?php 
        if(!isset($_SESSION['id_user'])){
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
                        <form class="formulaire_accueil" action="" method="POST">
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
                        <form class="formulaire_accueil" action="" method="POST">
                                <input type="text" name="id-creer" value="0" hidden/>
                                <br/><br/>
                                <label><b>Mot de passe : </b></label>
                                <input type="password" name="password-creer"/>
                                <br/><br/>
                                <input type="submit"/>
                            </form>
                        </td>     
                    <td>
                        <form class="formulaire_accueil" action="" method="POST">
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
                <a href="" class="close-button">&#10006;</a>
                <?php if(!isset($_SESSION['id_user'])){?>
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
                                                <form action="" method="post" onSubmit="return verify_mdp(this.password_inscr, this.password2_inscr)">

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
                                                    <a href="mdp_oublie.php">Mot de passe oublié</a></br>
                                                    <button type="submit">Se connecter</button></br>

                                                </form>
                                            </div>
                                    </td>
                                </tr> 
                            </table>
                        </div>

                        
            
            
                        <?php
                       
                           if(!empty($_POST['username_co']) && empty($_POST['username_inscr'])){
                               ?> <script>console.log("connexion");</script> <?php
                                
                                $utilisateur = $utilisateurmanager->getUserByUsernameAndPassword($_POST['username_co'],$_POST['password_co']);
                                if(!is_null($utilisateur)) { 
                                   $_SESSION['id_user']=$utilisateur->getId_Utilisateur();
                                   ?>
                                        <script> console.log("<?php echo $_SESSION['id_user'];?>");</script><?php
                                } else {
                                    ?>
                                        <script> alert("Mot de passe ou pseudo incorrect.");</script><?php
                                }
                           } else {
                               if(empty($_POST['username_co']) && !empty($_POST['username_inscr'])){
                                    if($_POST['password_inscr']==$_POST['password2_inscr']){
                                        if($utilisateurmanager->verifyUtilisateurByEmail($_POST['email_inscr'])==0){
                                            if($utilisateurmanager->verifyUtilisateurByPseudo($_POST['username_inscr'])==0){
                                                $_SESSION['id_user']=$utilisateurmanager->addUtilisateur($_POST['username_inscr'], $_POST['email_inscr'], $_POST['password_inscr']);
                                                ?><script> console.log("<?php echo $_SESSION['id_user'];?>");</script><?php
                                            } else {
                                                ?>
                                                <script>
                                                    alert("Ce pseudo est déja utilisé !");
                                                </script>
                                                <?php 
                                            }
                                        } else {
                                            ?>
                                            <script>
                                                alert("Cette addresse email est déja utilisée !");
                                            </script>
                                            <?php 
                                        }
                                        
                                        
                                    } else {
                                        $_SESSION['mdppasbon']=true;
                                       
                                    }
                               }
                           }
                           if(isset($_SESSION['id_user'])){
                           ?>      
                            <script>window.location = window.location.href; </script>
                           <?php
                           }
                        }
                else {
                    $user=$utilisateurmanager->getUtilisateurById($_SESSION['id_user']);
                    $_SESSION['$user_modification']=$user;
                    ?>
                        <div id="partie_centrale_popup">
                             <h2>Modifier votre profil</h2>
                             
                             <form action="" method="post" onSubmit="return verify_mdp_modif(this.mod_password1, this.mod_password2)">
                                 <input type="text" name="mod_username" placeholder="Pseudo" onchange="modification_profil()" value="<?php echo $user->getPseudo_Utilisateur();?>"/></br>
                                 <input type="email" name="mod_email" placeholder="Adresse Mail" onchange="modification_profil()" value="<?php echo $user->getMail_Utilisateur();?>"/></br>
                                 <input type="password" name="mod_password1" id="mod_password1" onchange="modification_mdp()" placeholder="Changer le Mot de passe"/></br>
                                 <input type="password" name="mod_password2" placeholder="V�rification Mot de passe"/></br>
                                 <input type="text" name="mod_hidden" id="mod_hidden" hidden value=""/></br>
                                 <button type="submit" id="modifier_account" disabled="disabled">Modifier</button>
                                 <input type="button" value="Supprimer mon compte" onclick ="window.location.href='delete_account.php'"/>
                                 
                             </form>
                         </div><?php
                            
                    }
                    
                     
                        
                        ?>
                </div>
        </div>
       
    </body>
    
</html>
 <?php
        if(isset($_SESSION['mdppasbon'])){
            if($_SESSION['mdppasbon']){
                ?> <script>alert("Les mots de passe doivent �tre identiques !") </script><?php
                unset($_SESSION['mdppasbon']);
            }
        }
        
        if(isset($_POST['mod_hidden'])){
            if($_POST['mod_hidden']=="1"){
                $usermod = new Utilisateur(array('USR_ID_USER'=>$_SESSION['id_user'], 'USR_MAIL_USER'=>$_POST['mod_email'], 'USR_PSEUDO_USER'=>$_POST['mod_username'], 'USR_MDP_USER'=>$_POST['mod_password1']));
                $modif_ok=1;
                if($_SESSION['$user_modification']->getMail_Utilisateur()!=$usermod->getMail_Utilisateur()){
                    if($utilisateurmanager->verifyUtilisateurByEmail($usermod->getMail_Utilisateur())){
                        $modif_ok=0;
                        ?>
                        <script>
                            alert("Cette adresse email est déja utilisée  !");
                        </script>
                        <?php 
                    }
                } 
                   
                if($_SESSION['$user_modification']->getPseudo_Utilisateur()!=$usermod->getPseudo_Utilisateur()){
                    if($utilisateurmanager->verifyUtilisateurByPseudo($usermod->getPseudo_Utilisateur())){
                        $modif_ok=0;
                        ?>
                        <script>
                            alert("Ce pseudo est déja utilisé !");
                        </script>
                        <?php 
                    }
                }   
                if($modif_ok){
                    
                    ?>
                    <script>
                        console.log("-------$usermod-----------");
                        console.log("<?php echo $_SESSION['id_user'];?>");
                        console.log("<?php echo $_POST['mod_email'];?>");
                        console.log("<?php echo $_POST['mod_username'];?>");
                        console.log("<?php echo $usermod->getId_Utilisateur();?>");
                        console.log("<?php echo $usermod->getMail_Utilisateur();?>");
                        console.log("<?php echo $usermod->getPseudo_Utilisateur();?>");
                    </script>
                    <?php 
                    $utilisateurmanager->modifierUtilisateur($usermod);
                    ?>
                    <script>
                        window.location = window.location.href;
                    </script>
                    <?php 
                }
  
            }
        }
        
        if(isset($_POST['id-creer']) || isset($_POST['id-rejoindre'])){
            if(isset($_POST['id-creer'])){
                $_SESSION['id-creer']=$_POST['id-creer'];
                ?>
                <script>
                    console.log("creer");
                    console.log("<?php echo $_POST['password-creer'];?>");
                    console.log("<?php echo $_SESSION['id_user'];?>");
                </script>
                <?php
                $_SESSION['idsalon']=$salonmanager->addSalon($_POST['password-creer'], $_SESSION['id_user']);
                ?>
                <script>
                    console.log("<?php echo $_SESSION['idsalon'];?>");
                    window.location = window.location.href;
                </script>
                <?php     
                
            } else {
                ?><script> console.log("rejoindre");
                    console.log("<?php echo $_POST['id-rejoindre'];?>");
                    console.log("<?php echo $_POST['password-rejoindre'];?>");
                </script><?php
                
                $_SESSION['id-rejoindre']=$_POST['id-rejoindre'];
                $salon=$salonmanager->getSalonById($_POST['id-rejoindre'], $_POST['password-rejoindre']);
                ?>
                <script>
                    console.log("<?php var_dump($salon);?>");
                </script>
                <?php
                if($salon!=NULL){
                $_SESSION['idsalon']=$salon->getId_Salon();
                ?>
                <script>
                    window.location = window.location.href;
                </script>
                <?php  
                } else {
                    ?>
                <script>
                    alert("Ce salon n'existe pas ou le mot de passe est erroné !");
                </script>
                <?php 
                }
            }          
        }
   