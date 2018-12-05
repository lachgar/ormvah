<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Gestion des étudiants</title>
        <script src="script/etudiant.js" type="text/javascript"></script>
        <script src="script/horloge.js" type="text/javascript"></script>
        <script src="script/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="script/jqueryScript.js" type="text/javascript"></script>

        <link href="style/css.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include 'template/header.php'; ?>
        <?php include 'template/menu.php'; ?>
        <div style="margin-left:20%;padding:1px 16px;height:1000px;">
            <fieldset>
                <legend>Ajouter Etudiant</legend>
                <form onsubmit="return false;">
                    <table border="0" id="customers">

                        <tr>
                            <td>Nom :</td>
                            <td><input id="nom" type="text" name="nom" value="" /></td>
                        </tr>
                        <tr>
                            <td>Prenom : </td>
                            <td><input id="prenom" type="text" name="prenom" value="" /></td>
                        </tr>
                        <tr>
                            <td>Ville : </td>
                            <td><select id="ville" name="ville">
                                    <option>Marrakech</option>
                                    <option>Rabat</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td>Sexe : </td>
                            <td><input type="radio" id ="h"  name="sexe" value="homme" />H
                                <input type="radio" id="f" name="sexe" value="femme"  checked="checked"/>F</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button id="valider" op="add" onclick="create()">Valider</button></td>
                        </tr>

                    </table>

                </form>
            </fieldset>
            <fieldset>
                <legend>Liste des Etudiants</legend>
                <table border="0" id="customers">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom
                                <input type="text" id="loadNom" value="" />
                            </th>
                            <th>Prenom</th>
                            <th>Ville</th>
                            <th>Sexe</th>
                            <th>Supprimer</th>
                            <th>Modifier</th>
                        </tr>
                    </thead>
                    <tbody id="contenu">
                        <?php
                        include_once 'service/EtudiantService.php';
                        $es = new EtudiantService();
                        foreach ($es->findAll() as $e) {
                            ?>
                            <tr>
                                <td><?php echo $e->getId() ?></td>
                                <td><?php echo $e->getNom() ?></td>
                                <td><?php echo $e->getPrenom() ?></td>
                                <td><?php echo $e->getVille() ?></td>
                                <td><?php echo $e->getSexe() ?></td>
                                <td><button onclick="supprimer(<?php echo $e->getId() ?>)">Supprimer</button></td>
                                <td><button v="<?php echo $e->getId() ?>" id="update">Modifier</button></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </fieldset>
        </div>
    </body>
</html>
