<?php

class Avis extends Model {

	protected $_idavis;
	protected $_idredacteur;
	protected $_idutilisateurconcerne;
	protected $_note;
	protected $_titre;
	protected $_description;


	public function __toString() {
		return get_class($this);
	}

}


