<?php

class Proposition extends Model {

	protected $_idproposition;
	protected $_titre;
	protected $_description;
	protected $_type;
	protected $_dateemission;
	protected $_vue;

	public function __toString() {
		return get_class($this).": ".$this->titre;
	}

}

