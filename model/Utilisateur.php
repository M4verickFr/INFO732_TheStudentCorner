<?php

class Utilisateur extends Model {

	protected $_idutilisateur;
	protected $_nom;
	protected $_prenom;
	protected $_email;
	protected $_password;
	protected $_idrole;
	protected $_dateinscription;
	protected $_idcampus;
	protected $_connecte;
	protected $_deleted;

	public function __toString() {
		return get_class($this).": ".$this->nom;
	}

	public static function attempt($email, $password) {
		$st = db()->prepare("select idutilisateur, password, deleted from utilisateur where email=:email");
		$st->bindValue(":email", $email);
		$st->execute();
		if ($st->rowCount() == 1) {
			while($row = $st->fetch(PDO::FETCH_ASSOC)) {
				if (!$row['deleted'] && password_verify($password, $row['password'])) {
					return new Utilisateur($row['idutilisateur']);
				}
			}
		}
		return false;
	}


	public function getOffre($idutilisateur) {
		$st = db()->prepare("SELECT * from listeoffres, produit WHERE listeoffres.:idutilisateur = 1 AND listeoffres.idoffre = produit.idproduit ");
		$st->bindValue(":idutilisateur", $idutilisateur);
		$st->execute();
		return $st;
	}

	public function getDemandes($idutilisateur) {
		$st = db()->prepare("SELECT * from listedemandes, produit WHERE listedemandes.:idutilisateur = 1 AND listedemandes.iddemande = produit.idproduit ");
		$st->bindValue(":idutilisateur", $idutilisateur);
		$st->execute();
		return $st;
	}
}

