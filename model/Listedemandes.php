<?php

class Listedemande extends Model {

	protected $_idutilisateur;
	protected $_iddemande;

	public function __toString() {
		return get_class($this);
	}

}


