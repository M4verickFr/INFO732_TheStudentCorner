<?php

class Offre extends Model {

	protected $_idutilisateur;
	protected $_idoffre;
	protected $_produit;

	public function __construct($id=null){
		parent::__construct($id);
		$this->produit = new Produit($this->idoffre);
	}

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


