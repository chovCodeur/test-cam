<?php

class Utilisateur {
    private $id_utilisateur;
    private $mail_utilisateur;
    private $mdp_utilisateur;
    private $pseudo_utilisateur;
    
    public function __construct($values = array()) {
        if (!empty($values)) {
            $this->affecte($values);
        }
    }
    public function affecte($values) {
        foreach ($values as $nom => $valeur) {
            switch ($nom) {
                case 'id_activite' :
                    $this->setId($valeur);
                    break;
                
            }
        }
    }
    
    public function getId_Utilisateur() {
        return $this->id_utilisateur;
    }
    public function setId_Utilisateur($id) {
        $this->id_utilisateur = $id;
    }

    public function getMail_Utilisateur() {
        return $this->mail_utilisateur;
    }
    public function setMail_Utilisateur($mail) {
        $this->mail_utilisateur = $mail;
    }
    
    public function getMdp_Utilisateur() {
        return $this->mdp_utilisateur;
    }
    public function setMdp_Utilisateur($mdp) {
        $this->mdp_utilisateur = $mdp;
    }

    public function getPseudo_Utilisateur() {
        return $this->pseudo_utilisateur;
    }
    public function setPseudo_Utilisateur($pseudo) {
        $this->pseudo_utilisateur = $pseudo;
    }
    
}
?>