<?php

class Produit extends Model {

	protected $_idproduit;
	protected $_nom;
	protected $_description;
	protected $_type;
	
	public function __toString() {
		return get_class($this).": ".$this->nom;
	}

	public static function search($type, $search){
		$idutilisateur = unserialize($_SESSION["user"])->idutilisateur;

		$sql = "SELECT idutilisateur FROM produit LEFT JOIN offre ON produit.idproduit = offre.idoffre
				WHERE idutilisateur IS NOT NULL and idutilisateur != $idutilisateur 
				and (nom LIKE '%$search%' or description LIKE '%$search%')";

		if($type != "0"){
			$sql .= " and type = $type";
		}

		$st = db()->prepare($sql);
		$st->execute();
		$res = array();

		while($row = $st->fetch(PDO::FETCH_ASSOC)) {
			$utilisateur = new Utilisateur($row['idutilisateur']);
			$demandes = Demande::findDemandes($utilisateur->idutilisateur);
			$offres = Offre::findOffres($utilisateur->idutilisateur);
			$res[] = [$utilisateur, $demandes, $offres];
		}
		return $res;

	}


	public static function lastOffers(){
		$idutilisateur = unserialize($_SESSION["user"])->idutilisateur;
		$st = db()->prepare("
		SELECT idutilisateur FROM produit LEFT JOIN offre ON produit.idproduit = offre.idoffre	
		WHERE idutilisateur IS NOT NULL and idutilisateur != $idutilisateur ORDER BY produit.idproduit DESC LIMIT 25 ");
		$st->execute();
		$res = array();

		while($row = $st->fetch(PDO::FETCH_ASSOC)) {
			$utilisateur = new Utilisateur($row['idutilisateur']);
			$demandes = Demande::findDemandes($utilisateur->idutilisateur);
			$offres = Offre::findOffres($utilisateur->idutilisateur);
			$res[] = [$utilisateur, $demandes, $offres];
		}
		return $res;


	}
}


