<?php

class PropositionsController extends Controller {
	public function index() {
		if (!isset($_SESSION["user"])) header('Location: .');

		$user = unserialize($_SESSION["user"]);

		$propositions = Proposition::find(["expediteur"=>$user->idutilisateur, "destinataire"=>$user->idutilisateur], "or");

		$this->render("index", ["propositions"=>$propositions]);
	}
}


