<?php

class Salon {
    private $id_salon;
    private $mdp_salon;
    private $id_administrateur;
    
    public function __construct($values = array()) {
        if (!empty($values)) {
            $this->affecte($values);
        }
    }
    public function affecte($values) {
        foreach ($values as $nom => $valeur) {
            switch ($nom) {
                case 'id_salon' :
                    $this->setId($valeur);
                    break;
                case 'mdp_salon' :
                    $this->setMdp_Salon($valeur);
                    break;
                case 'id_administrateur' :
                    $this->setId_Administrateur($valeur);
                    break;
            }
        }
    }
    
    public function getId_Salon() {
        return $this->id_salon;
    }
    public function setId_Salon($id) {
        $this->id_salon = $id;
    }

    public function getMdp_Salon() {
        return $this->mdp_salon;
    }
    public function setMdp_Salon($mdp) {
        $this->mdp_salon = $mdp;
    }
    
    public function getId_Administrateur() {
        return $this->id_administrateur;
    }
    public function setId_Administrateur($id) {
        $this->id_administrateur = $id;
    }
}
?>