<?php
// ESSAI DE CONNEXION A LA DB 'MINIBLOG' + AFFICHAGE DE TOUTES LES DONNEES DE LA TABLE ==> ESSAI OK
$dsn    = 'mysql:host=localhost;dbname=miniblog;charset=utf8';
$login  = 'root';
$pass   = '';
try {
    $connect = new PDO($dsn, $login, $pass);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
    echo 'Une erreur est survenue !';
}

$sql = 'SELECT * FROM articles';
$rs_insert = $connect->prepare($sql);
$rs_insert->execute();
$results = $rs_insert->fetchAll(PDO::FETCH_ASSOC);

print_r($results);

$message = 'Insertion ok';

var_dump($results);
