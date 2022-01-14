<?php

class Campus extends Model {

	protected $_idcampus;
    protected $_nom_campus;


	public function __toString() {
		return get_class($this).": ".$this->nom_campus;
	}


}


