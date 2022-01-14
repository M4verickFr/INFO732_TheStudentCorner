<?php

class Role extends Model {

	protected $_idrole;
	protected $_nom_role;

	public function __toString() {
		return get_class($this).": ".$this->nom_role;
	}

}


