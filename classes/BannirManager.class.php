<?php
class BannirManager {
    protected $db;
    public function __construct($db) {
        $this->db = $db;
    }
    public function getAllBannissements() {
        $listeDBannissements = Array();
        $sql = "SELECT BAN_ID_SALON, BAN_ADRESSE_IP_USER, BAN_DATE_BAN, BAN_ID_USER FROM BANNIR";
        $requete = $this->db->prepare($sql);
        $requete->execute();
        while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) {
        	$listeDBannissements[] = new Bannir($ligne);
        }
        return $listeDBannissements;
    }
    
    public function getBanissementById($id_salon, $adresse_ip) {
        $sql = "SELECT * FROM BANNIR WHERE BAN_ID_SALON=:id_salon AND BAN_ADRESSE_IP_USER=:adresse_ip";
        $requete = $this->db->prepare($sql);
        $requete->bindValue(':id_salon', $id_salon);
        $requete->bindValue(':adresse_ip', $adresse_ip);
        $nbLignes = $requete->execute();
        if ($nbLignes == 1) {
            return new Bannir($requete->fetch(PDO::FETCH_ASSOC));
        }
        return null;
    }
    
    public function addDBannissement($bannissement) {
        $sql = "INSERT INTO BANNIR(BAN_ID_SALON, BAN_ADRESSE_IP_USER, BAN_DATE_BAN, BAN_ID_USER) " . "VALUES (:id_salon, :adresse_ip, :date_ban, :id_user)";
        $requete = $this->db->prepare($sql);
        $requete->bindValue(":id_salon", $bannissement->getId_Salon(), PDO::PARAM_INT);
        $requete->bindValue(":adresse_ip", $bannissement->getAdresse_Ip_Bannir(), PDO::PARAM_STR);
        $requete->bindValue(":date_ban", $bannissement->getDate_Bannir(), PDO::PARAM_STR);
        $requete->bindValue(":id_user", $bannissement->getId_Utilsateur(), PDO::PARAM_INT);
        $resultat = $requete->execute();
    }

    public function deleteBannissementById($id_salon, $adresse_ip){
    	$req = $this->db->prepare('DELETE FROM BANNIR WHERE BAN_ID_SALON=:id_salon AND BAN_ADRESSE_IP_USER=:adresse_ip');
        $req->bindValue(':id_salon', $id_salon);
        $req->bindValue(':adresse_ip', $adresse_ip);
        $retour = $req->execute();
        return $retour;
    }
}
?>