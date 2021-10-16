<?php
require_once('views/View.php');

class ControllerRecompense
{
    private $_recompenseManager; // = nouvelle instance de la classe 'RecompenseManager'(.php); accède aux fonctions.
    private $_view;

    public function __construct($url)
    {
        if(isset($url) && count($url) > 1)
            throw new Exception('Page ctr_rcmp introuvable');
        else
            $this->recompenses(); // appel de la fonction recompenses (créée en-dessous)
    }

    private function recompenses()
    {
        $this->_recompenseManager = new RecompenseManager();
        $recompenses = $this->_recompenseManager->getRecompenses();

        $this->_view = new View('Recompense');
        // Je fais appel à la fonction 'generate' dans le fichier 'views/View.php',
        // et je vais passer la var 'recompense' (qui contient toutes nos récompenses) pour les récupérer dans la vue
        $this->_view->generate(array('recompense' => $recompenses));
    }
}