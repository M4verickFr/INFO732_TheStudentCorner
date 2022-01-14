<?php

class UserController extends Controller implements IObservable {

  public function __construct() {
    parent::__construct();

    $this->attach( new Mailer() );

  }

  public function attach( $observer )
  {
      $this->observers []= $observer;
  }

  public function index(){
    header('Location: .');
  }

  public function register() {

    if (isset($_SESSION["user"])) header('Location: .');

    $campus = Campus::find();

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
        $utilisateur = new Utilisateur($idutilisateur);
        $_SESSION["user"] = serialize($utilisateur);

        foreach( $this->observers as $o ) $o->onUserAdded($this, $utilisateur);

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
          $_SESSION["user"] = serialize($utilisateur);
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
    $user = unserialize($_SESSION["user"]);

    $params = [
      "action" => "",
      "to" => "",
      "type" => "",
      "nom" => "",
      "desc" => "",
    ];

    if (empty(array_diff_key($params, parameters())) && parameters()["action"] == "addProduct") {
      $produit = new Produit();
      $produit->nom = parameters()["nom"];
      $produit->description = parameters()["desc"];
      $produit->type = parameters()["type"];
      $idproduit = $produit->insert();

      if (parameters()["to"] == "demandes") {
        $demande = new Demande();
        $demande->idutilisateur = $user->idutilisateur;
        $demande->iddemande = $idproduit;
        $demande->insert();
      } else {
        $offre = new Offre();
        $offre->idutilisateur = $user->idutilisateur;
        $offre->idoffre = $idproduit;
        $offre->insert();
      }

      header('Location: .?r=user/profil');
    }


    $offres = $user->getOffres();
    $demandes = $user->getDemandes();

    $this->render("profil", ["user"=>$user,"offres"=>$offres,"demandes"=>$demandes]);
  }
  
  public function delete(){
    if (!isset($_SESSION["user"])) header('Location: .?r=user/login');
    $idutilisateur = unserialize($_SESSION["user"])->idutilisateur;
    
    if (isset(parameters()["idproduit"])) {
      $produit = new Produit(parameters()["idproduit"]);

      $demandes = Demande::find(["iddemande" => parameters()["idproduit"]]);
      $offres = Offre::find(["idoffre" => parameters()["idproduit"]]);

      if (isset($demandes[0]) && $demandes[0]->idutilisateur->idutilisateur == $idutilisateur) {
        $demandes[0]->delete();
      }

      if (isset($offres[0]) && $offres[0]->idutilisateur->idutilisateur == $idutilisateur) {
        $offres[0]->delete();
      }
      if ($produit) {
        $produit->delete();
        echo "success";
      } else {
        echo "error";
        header( 'HTTP/1.1 418' );
      }
      exit();
    }
  }


}
