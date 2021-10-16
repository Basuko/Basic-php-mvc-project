<?php
require_once('views/View.php');

class ControllerEnquete
{
    private $_enqueteManager; // = nouvelle instance de la classe 'EnqueteManager'(.php); accède aux fonctions.
    private $_view; // = nouvelle instance de la classe 'View'(.php)

    public function __construct($url)
    {
        if(isset($url) && count($url) > 1)
            throw new Exception('Page ctr_snd introuvable');
        else
            $this->enquetes(); // appel de la fonction enquetes (créée en-dessous)
    }

    private function enquetes()
    {
        $this->_enqueteManager = new EnqueteManager();
        $enquetes = $this->_enqueteManager->getEnquetes();

        $this->_view = new View('Enquete');
        // Je fais appel à la fonction 'generate' dans le fichier 'views/View.php',
        // et je vais passer la var 'enquete' (qui contient toutes nos enquêtes) pour les récupérer dans la vue
        $this->_view->generate(array('enquete' => $enquetes));
    }
}