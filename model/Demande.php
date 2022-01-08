<?php

class Demande extends Model {

	protected $_idutilisateur;
	protected $_iddemande;

	public function __toString() {
		return get_class($this);
	}

	public function insert(){
		$fields = ["idutilisateur", "iddemande"];
		$values = [$this->idutilisateur, $this->iddemande];

		try{		
			$request = db()->prepare("INSERT INTO " . strtolower(get_class($this)) . "(" . implode(',',$fields) .") VALUES (\"" . implode('","',$values) . "\")");
			$request->execute();

			return db()->lastInsertId();

		} catch(PDOException $e) {
  			echo $e->getMessage();
		}
	}

}

