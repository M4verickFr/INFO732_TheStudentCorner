<?php

class Produit extends Model {

	protected $_idproduit;
	protected $_nom;
	protected $_nom_categorie;
	protected $_description;
	protected $_type;
	protected $_idservice;
	protected $_idbien;

	public function __toString() {
		return get_class($this).": ".$this->nom;
	}

}


