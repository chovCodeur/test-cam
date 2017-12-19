<?php
session_start();
require_once("include/autoload.inc.php");
if(isset($_SESSION['id_user'])){
    $id=$_SESSION['id_user'];
    unset($_SESSION['id_user']);
 }
session_destroy();
$pdo=new Mypdo();
$utilisateurmanager = new UtilisateurManager($pdo);
$utilisateurmanager->deleteUtilisateurById($id);
header("location:/index.php");