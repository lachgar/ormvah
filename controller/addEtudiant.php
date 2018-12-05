<?php

chdir("..");
include_once 'service/EtudiantService.php';
extract($_GET);
$es = new EtudiantService();


if($op == 'add'){
    $es->create(new Etudiant(0, $nom, $prenom, $ville, $sexe));
}else {
    $e = $es->findById($id);
    $e->setId($id);
    $e->setNom($nom);
    $e->setPrenom($prenom);
    $e->setVille($ville);
    $e->setSexe($sexe);
    
    $es->update($e);
}
header('Content-type: application/json');
echo json_encode($es->findAllApi());