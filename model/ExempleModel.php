<?php

class ExempleModel extends Model {

	protected $_id;
	protected $_title;
	protected $_description;


	public function __toString() {
		return get_class($this).": ".$this->comment;
	}

	public function getExempleModel() {
		$sql = "sql request";

		$st = db()->prepare($sql);
		$st->bindValue(":value", $this->id);
		$st->execute();
		return $st->fetchAll();
	}
}


