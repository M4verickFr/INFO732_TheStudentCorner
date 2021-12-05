<?php

class Service extends Model {

	protected $_idservice;
	protected $_qualification;
	protected $_noteprestation;
	protected $_typeservice;

	public function __toString() {
		return get_class($this);
	}

}


