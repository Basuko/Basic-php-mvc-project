<?php
/* Je définis une constante de l'url du site.
Problème du MVC = erreurs possibles au moment de récupérer index, dû à la multiplication des niveaux
--> donc le BUT ici: récupérer l'url 'index' n'importe quand.
 */
define('URL', str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once('controllers/Router.php');

$router = new Router(); // j'instancie le 'router' (càd le 'contrôleur')
$router->routeReq(); // j'appelle la méthode