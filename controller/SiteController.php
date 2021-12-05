<?php

class SiteController extends Controller {
	public function index() {
		if (isset($_SESSION["user"])) {
			$this->render("search");
		} else {
			$this->render("index");
		}
	}
}


