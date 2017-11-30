<?php
class DiscuterManager {
    protected $db;
    public function __construct($db) {
        $this->db = $db;
    }
    public function getAllDiscussions() {
        $listeDiscussions = Array();
        $sql = "SELECT DIS_ID_SALON, DIS_ID_USER, DIS_DATE_DEBUT, DIS_DATE_FIN FROM DISCUTER";
        $requete = $this->db->prepare($sql);
        $requete->execute();
        while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) {
        	$listeDiscussions[] = new Discuter($ligne);
        }
        return $listeDiscussions;
    }
    
    public function getDiscussionById($id_salon, $id_user, $date_debut) {
        $sql = "SELECT * FROM DISCUTER WHERE DIS_ID_SALON=:id_salon AND DIS_ID_USER=:id_user AND DIS_DATE_DEBUT=:date_debut";
        $requete = $this->db->prepare($sql);
        $requete->bindValue(':id_salon', $id_salon);
        $requete->bindValue(':id_user', $id_user);
        $requete->bindValue(':date_debut', $date_debut);
        $nbLignes = $requete->execute();
        if ($nbLignes == 1) {
            return new Discuter($requete->fetch(PDO::FETCH_ASSOC));
        }
        return null;
    }
    
    public function addDiscussion($discuter) {
        $sql = "INSERT INTO DISCUTER(DIS_ID_SALON, DIS_ID_USER, DIS_DATE_DEBUT, DIS_DATE_FIN) " . "VALUES (:id_salon, :id_user, :date_debut, :date_fin)";
        $requete = $this->db->prepare($sql);
        $requete->bindValue(":id_salon", $discuter->getId_Salon(), PDO::PARAM_INT);
        $requete->bindValue(":id_user", $discuter->getId_Utilsateur(), PDO::PARAM_INT);
        $requete->bindValue(":date_debut", $discuter->getDate_Debut(), PDO::PARAM_STR);
        $requete->bindValue(":date_fin", $discuter->getDate_Fin(), PDO::PARAM_STR);
        $resultat = $requete->execute();
    }

    public function modifierDiscussion($discussion){
        $req = $this->db->prepare('UPDATE DISCUTER SET DIS_DATE_FIN = :date_fin WHERE DIS_ID_SALON = :id_salon AND DIS_ID_USER = :id_user AND DIS_DATE_DEBUT = :date_debut');
        $req->bindValue(':date_fin', $discussion->getDate_Fin(), PDO::PARAM_STR);
        $req->bindValue(':id_salon', $discussion->getId_Salon(), PDO::PARAM_INT);
        $req->bindValue(':id_user', $discussion->getId_Utilsateur(), PDO::PARAM_INT);
        $req->bindValue(':date_debut', $discussion->getDate_Debut(), PDO::PARAM_STR);
        $retour = $req->execute();
        return $retour;
    }

    public function deleteDiscussionById($id_salon, $id_user, $date_debut){
    	$req = $this->db->prepare('DELETE FROM DISCUTER WHERE DIS_ID_SALON=:id_salon AND DIS_ID_USER=:id_user AND DIS_DATE_DEBUT=:date_debut');
        $req->bindValue(':id_salon', $id_salon);
        $req->bindValue(':id_user', $id_user);
        $req->bindValue(':date_debut', $date_debut);
        $retour = $req->execute();
        return $retour;
    }
}
?>