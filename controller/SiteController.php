<?php

class SiteController extends Controller {
	public function index() {
		if (isset($_SESSION["user"])) {
			if (isset($parameters["search"])) {
			
				$type = parameters()["type"];
				$search = parameters()["search"];

				$produits = Produit::search($type, $search);
				$utilisateurs = Utilisateur::search($type, $search);
				
				$res = array_merge($produits,$utilisateurs);
				
				$this->render("search",["res"=>$res]);
			}else{
				$this->render("search",["res"=>Produit::lastOffers()]);

			}
		} else {
			$this->render("index");
		}
	}
}


