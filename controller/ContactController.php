<?php

class ContactController extends Controller {


  public function index(){
    if (!isset($_SESSION["user"])) header('Location: .');
    if (!isset(parameters()["to"])) header('Location: .');

    $user = unserialize($_SESSION["user"]);
    $proposes = Offre::find(["idutilisateur"=>$user->idutilisateur]);

    $to = new Utilisateur(parameters()["to"]);
    $demandes = Demande::find(["idutilisateur"=>$to->idutilisateur]);

    $this->render("index", ["user"=>$user,"to"=>$to,"demandes"=>$demandes,"proposes"=>$proposes]);
  }

  public function send(){
    if (!isset($_SESSION["user"])) header('Location: .');
    if (!isset(parameters()["to"])) header('Location: .');

    $params = [
      "title" => "",
      "desc" => "",
      "wants" => "",
      "gives" => "",
    ];

    if (!empty(array_diff_key($params, parameters()))) header('Location: ?r=contact&to='.parameters()["to"]);
      
    $proposition = new Proposition();

    $proposition->titre = parameters()["title"];
    $proposition->description = parameters()["desc"];
    $proposition->type = 0;
    $proposition->dateemission
    $proposition->vue


    var_dump(parameters());
    exit();
  }


}
