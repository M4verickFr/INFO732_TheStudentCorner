<?php

class SiteController extends Controller {
	public function index() {
		if (isset($_SESSION["user"])) {
			if (isset(parameters()["search"])) {
				
				$type = isset(parameters()["type"]) && (parameters()["type"] == 1 || parameters()["type"] == 2) ? parameters()["type"] : "0";
				$search = parameters()["search"];

				$produits = Produit::search($type, $search);
				
				$utilisateurs = Utilisateur::search($type, $search);

				$res = array_merge($produits,$utilisateurs);
				
				$this->render("search",["search"=>$search, "type"=>$type, "res"=>$res]);
			}else{
				$res = Produit::lastOffers();

				$this->render("search",["search"=>"", "type"=>0, "res"=>$res]);

			}
		} else {
			$this->render("index");
		}
	}
}


