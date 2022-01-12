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


	public function getOffres() {
		$st = db()->prepare("SELECT * from offre WHERE idutilisateur = :idutilisateur");
		$st->bindValue(":idutilisateur", $this->idutilisateur);
		$st->execute();
		$offres = array();
		while($row = $st->fetch(PDO::FETCH_ASSOC)) {
			$offres[] = new Produit($row['idoffre']);
		}
		return $offres;
	}


	public function getDemandes() {
		$st = db()->prepare("SELECT * from demande WHERE idutilisateur = :idutilisateur");
		$st->bindValue(":idutilisateur", $this->idutilisateur);
		$st->execute();
		$demandes = array();
		while($row = $st->fetch(PDO::FETCH_ASSOC)) {
			$demandes[] = new Produit($row['iddemande']);
		}
		return $demandes;
	}

	public static function search($type, $search){

		$idutilisateur = unserialize($_SESSION["user"])->idutilisateur;

		$sql = "SELECT utilisateur.idutilisateur FROM utilisateur
		Join offre on offre.idutilisateur = utilisateur.idutilisateur
		Join produit on offre.idoffre = produit.idproduit
		Where utilisateur.idutilisateur IS NOT NULL and utilisateur.idutilisateur != $idutilisateur 
		and (utilisateur.nom LIKE '%$search%' or utilisateur.prenom LIKE '%$search%')";

		if($type != "0"){
			$sql .= " and type = $type";
		}

		$st = db()->prepare($sql);
		$st->execute();
		$res = array();

		while($row = $st->fetch(PDO::FETCH_ASSOC)) {
			$utilisateur = new Utilisateur($row['idutilisateur']);
			$demandes = Demande::find(["idutilisateur"=>$utilisateur->idutilisateur]);
			$offres = Offre::find(["idutilisateur"=>$utilisateur->idutilisateur]);
			$res[] = [$utilisateur, $demandes, $offres];
		}
		return $res;

	}


}

