<?php


// Modifier la dbname (votre login), login et mot de passe

$db = new PDO("mysql:host=localhost;dbname=info732","maverick","shadow");
$db->exec("SET NAMES 'utf8';");


function db() { global $db; return $db; }



