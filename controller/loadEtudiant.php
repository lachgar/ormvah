<?php

extract($_GET);

chdir("..");
include_once 'service/EtudiantService.php';
$es = new EtudiantService();


header('Content-type: application/json');
echo json_encode($es->findAllByNomApi($nom));

