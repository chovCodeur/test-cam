id_salon
ad_ip
date
id_us
<?php

class Bannir {
    private $id_salon;
    private $adresse_ip_bannir;
    private $date_bannir;
    private $id_utilisateur;
    
    public function __construct($values = array()) {
        if (!empty($values)) {
            $this->affecte($values);
        }
    }
    public function affecte($values) {
        foreach ($values as $nom => $valeur) {
            switch ($nom) {
                case 'BAN_ID_SALON' :
                    $this->setId_Salon($valeur);
                    break;
                case 'BAN_ADRESSE_IP_BAN' :
                    $this->setAdresse_Ip_Bannir($valeur);
                    break;
                case 'BAN_DATE_BAN' :
                    $this->setDate_Bannir($valeur);
                    break;
                case 'BAN_ID_USER' :
                    $this->setId_utilisateur($valeur);
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

    public function getAdresse_Ip_Bannir() {
        return $this->adresse_ip_bannir;
    }
    public function setAdresse_Ip_Bannir($adresse) {
        $this->adresse_ip_bannir = $adresse;
    }

    public function getDate_Bannir() {
        return $this->date_bannir;
    }
    public function setDate_Bannir($date) {
        $this->date_bannir = $date;
    }

    public function getId_Utilsateur() {
        return $this->id_utilisateur;
    }
    public function setId_utilisateur($id) {
        $this->id_utilisateur = $id;
    }
}