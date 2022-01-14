<?php

class Demande extends Model {

	protected $_idutilisateur;
	protected $_iddemande;
	protected $_produit;

	public function __construct($idutilisateur=null, $iddemande=null) {
		$class = get_class($this);
		$table = strtolower($class);
		if ($idutilisateur != null || $iddemande != null) {
			$st = db()->prepare("select * from $table where idutilisateur=:idutilisateur and iddemande=:iddemande");
			$st->bindValue(":idutilisateur", $idutilisateur);
			$st->bindValue(":iddemande", $iddemande);
			$st->execute();
			if ($st->rowCount() != 1) {
				throw new Exception("Not in table: ".$table." id: ".$id );
			} else {
				$row = $st->fetch(PDO::FETCH_ASSOC);
				$classes = glob('model/*');
				$classes_update = array();
				foreach($classes as &$value) {
					$value = substr($value,6);
					$value = substr($value,0,-4);
					$classes_update[strtolower($value)] = $value;
				}
				foreach($row as $field => $value) {
					if (substr($field, 0,2) == "id" && $field != "id".$table) {
						$linkedField = substr($field, 2);
						$linkedClass = $classes_update[$linkedField];
						$this->$field = new $linkedClass($value);
					} else {
						$this->$field = $value;
					}
				}
			}
			$this->produit = new Produit($this->iddemande);
		}
	}


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

	public static function findDemandes($idutilisateur){
		$class = get_called_class();
        $table = strtolower(get_called_class());

		$sql = "select * from demande where idutilisateur=:idutilisateur";
		$st = db()->prepare($sql);
		$st->bindValue(":idutilisateur", $idutilisateur, PDO::PARAM_INT);
        $st->execute();
        $list = array();
        while($row = $st->fetch(PDO::FETCH_ASSOC)) {
            $list[] = new $class($row["idutilisateur"], $row["iddemande"]);
        }

        return $list;
	}
}


