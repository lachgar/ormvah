<?php
extract($_GET);

chdir("..");
include_once 'service/EtudiantService.php';


$es = new EtudiantService();
$e = $es->findByIdApi($id);

header('Content-type: application/json');
echo json_encode($e);
