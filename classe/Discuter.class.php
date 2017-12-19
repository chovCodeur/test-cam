<?php

class Discuter {
    private $id_salon;
    private $id_utilisateur;
    private $date_debut;
    private $date_fin;
    
    public function __construct($values = array()) {
        if (!empty($values)) {
            $this->affecte($values);
        }
    }
    public function affecte($values) {
        foreach ($values as $nom => $valeur) {
            switch ($nom) {
                case 'DIS_ID_SALON' :
                    $this->setId_Salon($valeur);
                    break;
                case 'DIS_ID_USER' :
                    $this->setId_utilisateur($valeur);
                    break;
                case 'DIS_DATE_DEBUT' :
                    $this->setDate_Debut($valeur);
                    break;
                case 'DIS_DATE_FIN' :
                    $this->setDate_Fin($valeur);
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

    public function getId_Utilsateur() {
        return $this->id_utilisateur;
    }
    public function setId_utilisateur($id) {
        $this->id_utilisateur = $id;
    }

    public function getDate_Debut() {
        return $this->date_debut;
    }
    public function setDate_Debut($date) {
        $this->date_debut = $date;
    }

    public function getDate_Fin() {
        return $this->date_fin;
    }
    public function setDate_Fin($date) {
        $this->date_fin = $date;
    }
}
?>