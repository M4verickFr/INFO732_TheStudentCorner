<?php

class TestController extends Controller {
    public function index() {

        $test = Utilisateur::getOffre(1);

		$this->render("index", ["test"=>$test]);
	}
}
