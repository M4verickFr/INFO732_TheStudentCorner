<?php

class Proposition extends Model {

	protected $_idproposition;
	protected $_expediteur;
	protected $_destinataire;
	protected $_titre;
	protected $_description;
	protected $_type;
	protected $_dateemission;
	protected $_vue;

	public function __construct($id=null){
		parent::__construct($id);
		$this->expediteur = new Utilisateur($this->expediteur);
		$this->destinataire = new Utilisateur($this->destinataire);
	}

	public function __toString() {
		return get_class($this).": ".$this->titre;
	}

}

