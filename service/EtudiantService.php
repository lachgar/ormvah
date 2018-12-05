<?php

include_once 'classes/Etudiant.php';
include_once 'connexion/Connexion.php';
include_once 'dao/IDao.php';

class EtudiantService implements IDao {

    private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }

    public function create($o) {
        $query = "INSERT INTO Etudiant VALUES (NULL, ?, ?, ?, ?);";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getNom(), $o->getPrenom(), $o->getVille(), $o->getSexe())) or die("Insert failed");
    }

    public function delete($o) {
        $query = "delete from Etudiant where id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getId())) or die('Erreur SQL');
    }

    public function findAllApi() {
        $etds = array();
        $query = "select * from Etudiant";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function findAll() {
        $etds = array();
        $query = "select * from Etudiant";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        while ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etds[] = new Etudiant($e->id, $e->nom, $e->prenom, $e->ville, $e->sexe);
        }
        return $etds;
    }

    public function findById($id) {
        $query = "select * from Etudiant where id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));
        if ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etd = new Etudiant($e->id, $e->nom, $e->prenom, $e->ville, $e->sexe);
        }
        return $etd;
    }

    public function findByIdApi($id) {
        $query = "select * from Etudiant where id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function update($o) {
        $query = "UPDATE etudiant SET nom = ?,prenom = ?,ville = ?,sexe = ? WHERE id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getNom(), $o->getPrenom(), $o->getVille(), $o->getSexe(), $o->getId())) or die('Erreur SQL');
    }

    public function findAllByNomApi($nom) {
        $etds = array();
        $query = "select * from Etudiant where nom like '".$nom."%'";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

}
