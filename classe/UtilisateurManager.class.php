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
        $requete->execute();
        $nbLignes = $requete->rowCount();
        
        if ($nbLignes == 1) {
            return new Utilisateur($requete->fetch(PDO::FETCH_ASSOC));
        }
        return null;
    }
    
    public function verifyUtilisateurByPseudo($psd) {
        $sql = "SELECT * FROM UTILISATEUR WHERE USR_PSEUDO_USER=:psd";
        $requete = $this->db->prepare($sql);
        $requete->bindValue(':psd', $psd);
        $requete->execute();
        $nbLignes = $requete->rowCount();
        if ($nbLignes >= 1) {
            return 1;
        }
        return 0;
    }
    
    public function verifyUtilisateurByEmail($mail) {
        $sql = "SELECT * FROM UTILISATEUR WHERE USR_MAIL_USER=:mail";
        $requete = $this->db->prepare($sql);
        $requete->bindValue(':mail', $mail);
        $requete->execute();
        $nbLignes = $requete->rowCount();
        if ($nbLignes >= 1) {
            return 1;
        }
        return 0;
    }
    
    public function addUtilisateur($pseudo, $email, $mdp) {
        ?><script> console.log("addUtilisateur");
        console.log("<?php echo $pseudo;?>");
        console.log("<?php echo $email;?>");
        console.log("<?php echo $mdp;?>");
        </script><?php
        $sql = "INSERT INTO UTILISATEUR(USR_MAIL_USER, USR_MDP_USER, USR_PSEUDO_USER) " . "VALUES (:mail, :mdp, :pseudo)";
        $requete = $this->db->prepare($sql);
        $requete->bindValue(":mail", $email, PDO::PARAM_STR);
        $securePass = hash('sha512',$mdp);
        $requete->bindValue(":mdp", $securePass, PDO::PARAM_STR);
        $requete->bindValue(":pseudo",$pseudo, PDO::PARAM_STR);
        $requete->execute();
        return $this->db->lastInsertId();
    }

    public function modifierUtilisateur($utilisateur){
        
        $mdp=$utilisateur->getMdp_Utilisateur();
        if($mdp!=null){
            ?>
        <script>
            console.log("-------modifierUtilisateur-MDP-----------");
        </script>
        <?php 
            $req = $this->db->prepare('UPDATE UTILISATEUR SET USR_MAIL_USER = :mail, USR_PSEUDO_USER = :pseudo, USR_MDP_USER=:mdp WHERE USR_ID_USER=:id');
            $req->bindValue(':id', $utilisateur->getId_Utilisateur(), PDO::PARAM_STR);
            $req->bindValue(':mail', $utilisateur->getMail_Utilisateur(), PDO::PARAM_STR);
            $req->bindValue(':pseudo', $utilisateur->getPseudo_Utilisateur(), PDO::PARAM_STR);
            $securePass = hash('sha512',$utilisateur->getMdp_Utilisateur());
            $req->bindValue(':mdp', $securePass, PDO::PARAM_STR);
            $retour = $req->execute();
        } else {
            ?>
        <script>
            console.log("-------modifierUtilisateur-PASMDP-----------");
        </script>
        <?php 
            $req = $this->db->prepare('UPDATE UTILISATEUR SET USR_MAIL_USER = :mail, USR_PSEUDO_USER = :pseudo WHERE USR_ID_USER=:id');
            $req->bindValue(':id', $utilisateur->getId_Utilisateur(), PDO::PARAM_STR);
            $req->bindValue(':mail', $utilisateur->getMail_Utilisateur(), PDO::PARAM_STR);
            $req->bindValue(':pseudo', $utilisateur->getPseudo_Utilisateur(), PDO::PARAM_STR);
            $retour = $req->execute();
        }
        return $retour;
    }

    public function deleteUtilisateurById($id){
    	$req = $this->db->prepare('DELETE FROM UTILISATEUR WHERE USR_ID_USER=:id');
        $req->bindValue(':id', $id, PDO::PARAM_STR);
        $retour = $req->execute();
        return $retour;
    }

    public function getUserByUsernameAndPassword($user, $password) {
        $password_hash=hash('sha512',$password);
        /*?> <script>console.log("<?php echo $password_hash;?>");</script><?php*/
        $sql = "SELECT USR_ID_USER, USR_MAIL_USER, USR_MDP_USER, USR_PSEUDO_USER FROM UTILISATEUR WHERE USR_PSEUDO_USER=:user AND USR_MDP_USER=:password";
        $requete = $this->db->prepare($sql);
        $requete->bindValue(':user', $user);
        $requete->bindValue(':password', $password_hash);
        $requete->execute();
        $nbLignes = $requete->rowCount();

        if ($nbLignes == 1) {
            return new Utilisateur($requete->fetch(PDO::FETCH_ASSOC));
        }
        return null;
    }
    
    public function getUserByEmail($mail) {
        $sql = "SELECT * FROM UTILISATEUR WHERE USR_MAIL_USER=:mail";
        $requete = $this->db->prepare($sql);
        $requete->bindValue(':mail', $mail);
        $requete->execute();
        $nbLignes = $requete->rowCount();

        if ($nbLignes == 1) {
            return new Utilisateur($requete->fetch(PDO::FETCH_ASSOC));
        }
        return null;
    }

    /*public function isPasswordCorrect($username, $password) {
        $securePass = password_hash($password, PASSWORD_DEFAULT);
        $sql = "SELECT USR_MDP_USER FROM UTILISATEUR WHERE USR_PSEUDO_USER=:user";
        $requete = $this->db->prepare($sql);
        $requete->bindValue(':user', $username);
        $requete->execute();
        $nbLignes = $requete->rowCount();

        if ($nbLignes == 1) {
            $passBD = $requete->fetch(PDO::FETCH_ASSOC);
            if($passBD["USR_MDP_USER"] == $securePass) {
                return true;
            }
        }
        return false;
    }*/
}
