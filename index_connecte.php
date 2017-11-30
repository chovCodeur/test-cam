<!DOCTYPE html>
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
        </div>
        
        
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

        </div>
        
        
        <div class="row pop-up big-popup">
            <div class="box small-6 large-centered">
                <a href="#" class="close-button">&#10006;</a>
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

                                            <input type="text" name="username" placeholder="Pseudo" required="required"/></br>
                                            <input type="email" name="username" placeholder="Adresse Mail" required="required"/></br>
                                            <input type="password" name="password" placeholder="Mot de passe" required="required"/></br>
                                            <input type="password" name="password" placeholder="Vérification Mot de passe" required="required"/></br>
                                            <button type="submit">S'inscrire</button>

                                        </form>
                                    </div>
                            </td>    
                            <td>
                                
                                    <div>
                                        <form action="" method="post">
                                            <input type="text" name="username" placeholder="Pseudo" required="required"/></br>
                                            <input type="password" name="password" placeholder="Mot de passe" required="required"/></br>
                                            <a href="#">Mot de passe oublié</a></br>
                                            <button type="submit">Se connecter</button></br>

                                        </form>
                                    </div>
                            </td>
                        </tr>      
                    </table>
                </div>
            
            </div>
        </div>
    </body>
    <script type="text/javascript" src="js/connexion_serveur.js"></script>
</html>
