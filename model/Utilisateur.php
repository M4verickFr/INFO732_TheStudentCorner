<?php

class Utilisateur extends Model {

	protected $_idutilisateur;
	protected $_nom;
	protected $_prenom;
	protected $_email;
	protected $_password;
	protected $_datenaissance;
	protected $_idrole;
	protected $_dateinscription;
	protected $_idcampus;
	protected $_connecte;
	protected $_deleted;


	public function __toString() {
		return get_class($this).": ".$this->nom;
	}

	public function updatePassword($user) {
		if (!(isset(parameters()["old_psw"]) 
			&& isset(parameters()["new_psw"])
			&& isset(parameters()["cfm_psw"])
			&& parameters()["new_psw"] === parameters()["cfm_psw"]
			&& password_verify(parameters()["old_psw"], $user->password)
		)) return false;

		$user->password = password_hash(parameters()["new_psw"], PASSWORD_DEFAULT);
        $user->update();
		return true;
	}

	public static function attempt($email, $password) {
		$st = db()->prepare("select idutilisateur, nom, prenom, idrole, password, deleted from utilisateur where email=:email");
		$st->bindValue(":email", $email);
		$st->execute();
		if ($st->rowCount() == 1) {
			while($row = $st->fetch(PDO::FETCH_ASSOC)) {
				if (!$row['deleted'] && password_verify($password, $row['password'])) {
					$internaluser["idutilisateur"] = $row["idutilisateur"];
					$internaluser["idrole"] = $row["idrole"];
					$internaluser["nom"] = $row["nom"];
					$internaluser["prenom"] = $row["prenom"];
					$internaluser["email"] = $email;
					return $internaluser;
				}
			}
		}
		return false;
	}


	public static function getOffre($idutilisateur) {
		$st = db()->prepare("SELECT * from listeoffres, produit WHERE listeoffres.idutilisateur = :idutilisateur AND listeoffres.idoffre = produit.idproduit ");
		$st->bindValue(":idutilisateur", $idutilisateur);
		$st->execute();
		$list = array();
		while($row = $st->fetch(PDO::FETCH_ASSOC)) {
            $list[] = $row;
        }
        return $list;
	}

	public function getDemandes($idutilisateur) {
		$st = db()->prepare("SELECT * from listedemandes, produit WHERE listedemandes.:idutilisateur = 1 AND listedemandes.iddemande = produit.idproduit ");
		$st->bindValue(":idutilisateur", $idutilisateur);
		$st->execute();
		$list = array();
        while($row = $st->fetch(PDO::FETCH_ASSOC)) {
            $list[] = $row;
        }
        return $list;
	}
}

