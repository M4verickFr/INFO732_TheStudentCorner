<?php

class Proposition extends Model {

	protected $_idbien;
	protected $_etat;
	protected $_typebien;

	public function __toString() {
		return get_class($this);
	}

}


