<?php

class UserController extends Controller {


  public function index(){
    header('Location: .');
  }

  public function register() {

    if (isset($_SESSION["user"])) header('Location: .');

    $campus = [
      "Annecy",
      "Chambery"
    ];

    if($_SERVER['REQUEST_METHOD'] == "GET") {
      $this->render("register", ["campus"=>$campus]);
    } else {

      $params = [
        "nom" => "",
        "prenom" => "",
        "email" => "",
        "password" => "",
        "password_confirm" => "",
        "idcampus" => "",
      ];
      
      if(empty(array_diff_key($params, parameters())) 
      && parameters()["password"] == parameters()["password_confirm"]) {
        unset($params["password_confirm"]);

        $utilisateur = new Utilisateur();
        foreach ($params as $key => $value) {
          $utilisateur->$key = parameters()[$key];
        }
        $utilisateur->idrole = 1;
        $utilisateur->password = password_hash(parameters()["password"], PASSWORD_DEFAULT);
        $idutilisateur = $utilisateur->insert();
        
        $_SESSION["idutilisateur"] = $idutilisateur;
        $_SESSION["user"] = Utilisateur::findOne(["idutilisateur" => $idutilisateur]);
        header('Location: .');

      }else{
        $this->render("register", ["campus"=>$campus]);
      }
    } 

	}

  public function login() {

    if (isset($_SESSION["user"])) header('Location: .');

    if($_SERVER['REQUEST_METHOD'] == "GET") {
      $this->render("login");
    } else {

      $params = [
        "email" => "",
        "password" => "",
      ];
      
      if(empty(array_diff_key($params, parameters()))) {

        $utilisateur = Utilisateur::attempt(parameters()["email"], parameters()["password"]);
        if ($utilisateur) {
          $_SESSION["user"] = $utilisateur;
          header('Location: .');
        } else {
          $this->render("login", "error");
        }
      }
      else {
        $this->render("login");
      }
	  }
  }

  public function logout(){
    session_unset();
    header('Location: .');
  }

  public function profil(){
    if (!isset($_SESSION["user"])) header('Location: .?r=user/login');
    $this->render("profil");
  }


}
