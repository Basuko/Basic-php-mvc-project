<?php
require_once('views/View.php');

class ControllerSalarie
{
    private $_salarieManager; // = nouvelle instance de la classe 'SalarieManager'(.php); accède aux fonctions.
    private $_view; // = nouvelle instance de la classe 'View'(.php)

    public function __construct($url)
    {
        if(isset($url) && count($url) > 1)
            throw new Exception('Page ctr_empl introuvable');
        else
            $this->salaries(); // appel de la fonction salaries (créée en-dessous)
    }

    private function salaries()
    {
        $this->_salarieManager = new SalarieManager();
        $salaries = $this->_salarieManager->getSalaries();

        $this->_view = new View('Salarie');
        // Je fais appel à la fonction 'generate' dans le fichier 'views/View.php',
        // et je vais passer la var 'salarie' (qui contient tous nos salariés) pour les récupérer dans la vue
        $this->_view->generate(array('salarie' => $salaries));
    }

    private function salariesBySexe()
    {
        $this->_salarieManager = new SalarieManager();
        $salariesBySexe = $this->_salarieManager->getSalariesBySexe();

        $this->_view = new View('SalarieBySexe');
        // Je fais appel à la fonction 'generate' dans le fichier 'views/View.php',
        // et je vais passer la var 'salarie' (qui contient tous nos salariés) pour les récupérer dans la vue
        $this->_view->generate(array('salarieBySexe' => $salariesBySexe));
    }
}