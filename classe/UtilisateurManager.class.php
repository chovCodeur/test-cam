<?php
class UtilisateurManager {
    protected $db;
    public function __construct($db) {
        $this->db = $db;
    }
    public function getAllUtilisateurs() {
        $listeUtilisateurs = Array();
        $sql = "SELECT USR_ID_USER, USR_MAIL_USER, USR_MDP_USER, USR_PSEUDO_USER FROM UTILISATEUR";
        $requete = $this->db->prepare($sql);
        $requete->execute();
        while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) {
        	$listeUtilisateurs[] = new Utilisateur($ligne);
        }
        return $listeUtilisateurs;
    }
    
    public function getUtilisateurById($id) {
        $sql = "SELECT * FROM UTILISATEUR WHERE USR_ID_USER=:id";
        $requete = $this->db->prepare($sql);
        $requete->bindValue(':id', $id);
        $nbLignes = $requete->execute();
        if ($nbLignes == 1) {
            return new Utilisateur($requete->fetch(PDO::FETCH_ASSOC));
        }
        return null;
    }
    
    public function addUtilisateur($utilisateur) {
        $sql = "INSERT INTO UTILISATEUR(USR_MAIL_USER, USR_MDP_USER, USR_PSEUDO_USER) " . "VALUES (:mail, :mdp, :pseudo)";
        $requete = $this->db->prepare($sql);
        $requete->bindValue(":mail", $utilisateur->getMail_Utilisateur(), PDO::PARAM_STR);
        $requete->bindValue(":mdp", $utilisateur->getMdp_Utilisateur(), PDO::PARAM_STR);
        $requete->bindValue(":pseudo", $utilisateur->getPseudo_Utilisateur(), PDO::PARAM_STR);
        $resultat = $requete->execute();
    }

    public function modifierUtilisateur($utilisateur){
        $req = $this->db->prepare('UPDATE UTILISATEUR SET USR_MAIL_USER = :mail, USR_MDP_USER = :mdp, USR_PSEUDO_USER = :pseudo WHERE USR_ID_USER=:id');
        $req->bindValue(':mail', $utilisateur->getMail_Utilisateur(), PDO::PARAM_STR);
        $req->bindValue(':mdp', $utilisateur->getMdp_Utilisateur(), PDO::PARAM_STR);
        $req->bindValue(':pseudo', $usr->getPseudo_Utilisateur(), PDO::PARAM_STR);
        $retour = $req->execute();
        return $retour;
    }

    public function deleteUtilisateurById($id){
    	$req = $this->db->prepare('DELETE FROM UTILISATEUR WHERE USR_ID_USER=:id');
        $req->bindValue(':id', $id);
        $retour = $req->execute();
        return $retour;
    }

    public function getUserByUsernameAndPassword($user, $password) {
    	$sql = "SELECT * FROM UTILISATEUR WHERE USR_PSEUDO_USER=:user AND USR_MDP_USER=:password";
        $requete = $this->db->prepare($sql);
        $requete->bindValue(':user', $user);
        $requete->bindValue(':password', $password);
        $nbLignes = $requete->execute();
        if ($nbLignes == 1) {
            return new Utilisateur($requete->fetch(PDO::FETCH_ASSOC));
        }
        return null;
    }
}
?>