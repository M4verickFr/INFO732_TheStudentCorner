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
		$st = db()->prepare("
		SELECT idproduit, idutilisateur FROM produit LEFT JOIN offre ON produit.idproduit = offre.idoffre	
		WHERE type=$type and idutilisateur IS NOT NULL and idutilisateur != $idutilisateur 
		and (nom LIKE '%$search%' or description LIKE '%$search%')");
		$st->execute();
		$res = array();

		while($row = $st->fetch(PDO::FETCH_ASSOC)) {
			$produit = new Produit($row['idproduit']);
			$utilisateur = new Utilisateur($row['idutilisateur']);
			$res[] = [$produit, $utilisateur];
		}
		return $res;

	}


	public static function lastOffers(){

		$idutilisateur = unserialize($_SESSION["user"])->idutilisateur;
		$st = db()->prepare("
		SELECT idproduit, idutilisateur FROM produit LEFT JOIN offre ON produit.idproduit = offre.idoffre	
		WHERE idutilisateur IS NOT NULL and idutilisateur != $idutilisateur ORDER BY produit.idproduit DESC LIMIT 25 ");
		$st->execute();
		$res = array();

		while($row = $st->fetch(PDO::FETCH_ASSOC)) {
			$produit = new Produit($row['idproduit']);
			$utilisateur = new Utilisateur($row['idutilisateur']);
			$res[] = [$produit, $utilisateur];
		}
		return $res;


	}
}


