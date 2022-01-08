<?php

class Produit extends Model {

	protected $_idproduit;
	protected $_nom;
	protected $_description;
	protected $_type;

	public function __toString() {
		return get_class($this).": ".$this->nom;
	}

}


