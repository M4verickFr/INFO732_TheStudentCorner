<?php

class Offre extends Model {

	protected $_idutilisateur;
	protected $_idoffre;

	public function __toString() {
		return get_class($this);
	}

	public function insert(){
		$fields = ["idutilisateur", "idoffre"];
		$values = [$this->idutilisateur, $this->idoffre];

		try{		
			$request = db()->prepare("INSERT INTO " . strtolower(get_class($this)) . "(" . implode(',',$fields) .") VALUES (\"" . implode('","',$values) . "\")");
			$request->execute();

			return db()->lastInsertId();

		} catch(PDOException $e) {
  			echo $e->getMessage();
		}
	}

}


