<?php
require_once '../init.php'; // (views/View.php)

class ControllerAccueil
{
    private $_departementManager; // = nouvelle instance de la classe 'DepartementManager'(.php); accède aux fonctions.
    private $_view; // = nouvelle instance de la classe 'View'(.php)

    public function __construct($url)
    {
        if(isset($url) && count($url) > 1)
            throw new Exception('Page ctr_acc introuvable');
        else
            $this->departements(); // appel de la fonction departements (créée en-dessous)
    }

    /*
    Cette classe donnant sur la page d'accueil, je n'ai pas besoin d'appeler de fonction.
    Uniquement des liens url vers les différentes parties consultables du site.
    */

    private function departements()
    {
        $this->_departementManager = new DepartementManager();
        $departements = $this->_departementManager->getDepartements();

        $this->_view = new View('Departement');
        // Je fais appel à la fonction 'generate' dans le fichier 'views/View.php',
        // et je vais passer la var 'département' (qui contient tous nos départements) pour les récupérer dans la vue
        $this->_view->generate(array('departement' => $departements));
    }

    private function departement($departementID)
    {
        $this->_departementManager = new DepartementManager();
        $oneDepartement = $this->_departementManager->getDepartement($departementID);

        $this->_view = new View('Departement');
        // Je fais appel à la fonction 'generate' dans le fichier 'views/View.php',
        // et je vais passer la var 'département' (qui contient tous nos départements) pour en récupérer un dans la vue
        $this->_view->generate(array('departement' => $oneDepartement));
    }
}