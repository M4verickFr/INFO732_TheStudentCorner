<?php

class TestController extends Controller {
    public function index() {

        $test = Utilisateur::attempt("nom", "password");

		$this->render("index", ["test"=>$test]);
	}
}
