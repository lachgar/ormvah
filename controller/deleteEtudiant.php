<?php
extract($_GET);

chdir("..");
include_once 'service/EtudiantService.php';
$es = new EtudiantService();
$es->delete($es->findById($id));

header('Content-type: application/json');
echo json_encode($es->findAllApi());