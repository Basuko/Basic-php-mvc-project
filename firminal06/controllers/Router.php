<?php
require_once('views/View.php'); // require_once('Requete.php');

class Router
{
    private $_ctrl;
    private $_view;

    // Requête du routeur, càd gestion selon l'action de l'utilisateur
    public function routeReq()
    {
        try
        {
            /* spl_autoload_register: FONCTION magique DE CHARGEMENT AUTOMATIQUE DES CLASSES
            (!! Il faudra le faire pour views et controllers)
            Elle détecte le nom de l'instance de classe, et charge automatiquemernt le fichier '.php'.
            (NOTE: qd je crée 1 instance de classe, je dois requérir le fichier de la classe)
            En param de cette funct, j'utilise UNE AUTRE FONCTION 'function'. */
            spl_autoload_register(function($class){
                // si le '.php' est détecté par rapport au param '$class', ce fichier '.php' est auto-inclus.
                require_once('models/'.$class.'.php');
            });

            $url = '';

            // LE CONTROLLER EST INCLUS SELON L'ACTION DE L'UTILISATEUR
            if(isset($_GET['url']))
            {
                // explode: pour récupérer tous les paramètres de l'url séparément
                $url = explode('/', filter_var($_GET['url'],
                    FILTER_SANITIZE_URL));

                // var_dump($url); ==> pour vérifier si le tableau avec les différents éléments s'affichent (ctroleur / action / id)

                $controller = ucfirst(strtolower($url[0])); // ($url[0]) = le 1er paramètre dans l'url
                // je sauvegarde le 2ème paramètre dans $category si il existe, sinon index
                $category = $url[2] ?? 'index';
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";

                if(file_exists($controllerFile))
                {
                    require_once($controllerFile);
                    // j'instancie le contrôleur
                    $this->_ctrl = new $controllerClass($url);
                }
                else
                    throw new Exception('Page Rtr introuvable');
            }
            else
            {
                require_once('controllers/ControllerAccueil.php');
                $this->_ctrl = new ControllerAccueil($url);
            }
        }
        // GESTION DES ERREURS
        catch(Exception $e)
        {
            $errorMsg = $e->getMessage();
            $this->_view = new View('Error');
            $this->_view->generate(array('errorMsg' => $errorMsg));
        }
    }



}