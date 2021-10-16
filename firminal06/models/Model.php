<?php

abstract class Model
{
    private static $_bdd;

    // INSTANCIE LA CONNEXION A LA BDD
    private static function setBdd()
    {
        self::$_bdd = new PDO('mysql:host=localhost;dbname=bornesmpd;charset=utf8','root','');
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    // RECUPERE LA CONNEXION A LA BDD
    protected function getBdd()
    {
        if(self::$_bdd == null)
            self::setBdd();
        return self::$_bdd;
    }

    protected function getAll($table,$obj)
    {
        $var = [];
        $req = $this->getBdd()->prepare('SELECT * FROM '.$table.' ORDER BY '.$table.'ID');
        $req->execute();
        while($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $var[] = new $obj($data);
        }
        return $var;
        $req->closeCursor();
    }

    // FONCTION PROTOTYPE: ReadOne
    protected function getOne($table,$obj,$id)
    {
        // $var = []; plus besoin de récup tableau, car only une ligne
        $req = $this->getBdd()->prepare('SELECT * FROM '.$table.' WHERE id = '.$id);
        $req->execute();
        // while($data = $req->fetch(PDO::FETCH_ASSOC))
        // {
        //     $var[] = new $obj($data);
        // }
        // return $var;
        return $req->fetch();
        $req->closeCursor();
    }

    // FONCTION PROTOTYPE: ReadBy
    public function findByNom($table,$obj,$nom)
    {
        $var = [];
        $req = $this->getBdd()->prepare('SELECT * FROM '.$table.' WHERE nom = '.$nom);
        $req->execute();
        while($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $var[] = new $obj($data);
        }
        return $var;
        $req->closeCursor();
    }

    // FONCTION PROTOTYPE: Create
    public function create($table,$obj,$nom)
    {
        $var = [];
        $req = $this->getBdd()->prepare('SELECT * FROM '.$table.' WHERE nom = '.$nom);
        $req->execute();
        while($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $var[] = new $obj($data);
        }
        return $var;
        $req->closeCursor();
    }

}