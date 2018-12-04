<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once './service/EtudiantService.php';
        $es = new EtudiantService();
        //création d'un étudiant
        $es->create(new Etudiant(0, "RAMI", "Kamal", "Casa", "homme"));
        //Affichage de la liste des étudiants
        foreach($es->findAll() as $v){
            echo $v->getNom().' <br>';
        }
        //Supprimer l'étudiant dont id = 1
        $es->delete($es->findById(2));
        ?>
    </body>
</html>
