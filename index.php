<?php

require_once("./controllers/MainController.php"); 
$mainController = new MainController(); // pour accéder à toutes les fonctions 

try {
    if(empty($_GET['page'])){
        $page = "accueil"; 
    } else {
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
        $page = $url[0];
    }
    
    switch($page) {
        case "home": 
            // $page_description = "Page d'accuel du site du KGB."; 
            // $page_title = "Présentation du site du KGB"; 
            // $page_content = "<h1>Bienvenu sur le site du KGB</h1>";
            $mainController->home();
        break;
        case "missions": 
            $mainController-> missions();
        break;
        case "login": 
            $mainController-> login();
        break;
        default: 
            throw new Exception("La page n'existe pas"); 
    }
} catch(Exception $e) {
    $mainController->errorPage($e->getMessage());
}

require_once('./views/common/template.php');
