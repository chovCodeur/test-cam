<?php
class SalonManager {
    protected $db;
    public function __construct($db) {
        $this->db = $db;
    }
    public function getAllSalons() {
        $listeSalons = Array();
        $sql = "SELECT SAL_ID_SALON, SAL_MDP_SALON, SAL_ID_ADMIN FROM SALON";
        $requete = $this->db->prepare($sql);
        $requete->execute();
        while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) {
        	$listeSalons[] = new Salon($ligne);
        }
        return $listeSalons;
    }
    
    public function getSalonById($id, $mdp) {
        $securePass = hash('sha512',$mdp);
        ?><script> console.log("getSalonById");
                    console.log("<?php echo $id;?>");
                    console.log("<?php echo $securePass;?>");
                </script><?php
        $sql = "SELECT * FROM SALON WHERE SAL_ID_SALON=:id AND SAL_MDP_SALON=:mdp";
        $requete = $this->db->prepare($sql);
        
        $requete->bindValue(':id', $id);
        $requete->bindValue(':mdp', $securePass);
        $requete->execute();
        $nbLignes = $requete->rowCount();
        ?><script> console.log("count");
                    console.log("<?php echo $nbLignes;?>");
                </script><?php
        if ($nbLignes == 1) {
            return new Salon($requete->fetch(PDO::FETCH_ASSOC));
        } else {
        return null;
        }
    }
    
    public function addSalon($mdp,$idadmin) {
        $securePass = hash('sha512',$mdp);
        $sql = "INSERT INTO SALON(SAL_MDP_SALON, SAL_ID_ADMIN) " . "VALUES (:mdp, :id_admin)";
        $requete = $this->db->prepare($sql);
        $requete->bindValue(":mdp", $securePass, PDO::PARAM_STR);
        $requete->bindValue(":id_admin", $idadmin, PDO::PARAM_INT);
        $resultat = $requete->execute();
        return $this->db->lastInsertId();
    }

    public function modifierSalon($salon){
        $req = $this->db->prepare('UPDATE SALON SET SAL_MDP_SALON = :mdp, SAL_ID_ADMIN = :id_admin WHERE SAL_ID_SALON=:id');
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