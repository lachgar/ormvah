<?php

chdir("..");
include_once 'service/EtudiantService.php';
extract($_GET);

$es = new EtudiantService();
$es->create(new Etudiant(0, $nom, $prenom, $ville, $sexe));

header('Content-type: application/json');
echo json_encode($es->findAllApi());