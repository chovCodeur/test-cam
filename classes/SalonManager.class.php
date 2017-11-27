<?php
class SalonManager {
    protected $db;
    public function __construct($db) {
        $this->db = $db;
    }
    public function getAllSalons() {
        $listeSalons = Array();
        $sql = "SELECT SAL_ID_SALON, SAL_MDP_SALON, SAL_ID_AMDIN FROM SALON";
        $requete = $this->db->prepare($sql);
        $requete->execute();
        while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) {
        	$listeSalons[] = new Salon($ligne);
        }
        return $listeSalons;
    }
    
    public function getSalonById($id) {
        $sql = "SELECT * FROM SALON WHERE SAL_ID_SALON=:id";
        $requete = $this->db->prepare($sql);
        $requete->bindValue(':id', $id);
        $nbLignes = $requete->execute();
        if ($nbLignes == 1) {
            return new Salon($requete->fetch(PDO::FETCH_ASSOC));
        }
        return null;
    }
    
    public function addSalon($salon) {
        $sql = "INSERT INTO SALON(SAL_MDP_SALON, SAL_ID_AMDIN) " . "VALUES (:mdp, :id_admin)";
        $requete = $this->db->prepare($sql);
        $requete->bindValue(":mdp", $salon->getMdp_Salon(), PDO::PARAM_STR);
        $requete->bindValue(":id_admin", $salon->getId_Administrateur(), PDO::PARAM_INT);
        $resultat = $requete->execute();
    }

    public function modifierSalon($salon){
        $req = $this->db->prepare('UPDATE SALON SET SAL_MDP_SALON = :mdp, SAL_ID_AMDIN = :id_admin WHERE SAL_ID_SALON=:id');
        $req->bindValue(':mdp', $salon->getMdp_Salon(), PDO::PARAM_STR);
        $req->bindValue(':id_admin', $salon->getId_Administrateur(), PDO::PARAM_INT);
        $retour = $req->execute();
        return $retour;
    }

    public function deleteSalonById($id){
    	$req = $this->db->prepare('DELETE FROM SALON WHERE SAL_ID_SALON=:id');
        $req->bindValue(':id', $id);
        $retour = $req->execute();
        return $retour;
    }
}
?>