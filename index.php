<?php
// pour avoir le chemin depuis la racine du site
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS'])? "https" : "http"). "://". $_SERVER['HTTP_HOST']. $_SERVER['PHP_SELF']));

require_once("controllers/MainController.php"); 
$mainController = new MainController(); // to use the functions from the MainController

try {
    if(empty($_GET['page'])){
        $page = "home"; 
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
            $mainController->missions();
        break;
        case "oneMission": 
            $mainController->oneMission();
        break;
        case "login": 
            $mainController->login();
        break;
        case "createMission": 
            $mainController->createMission();
        break;
        case "createMissionValidation": 
            $mainController->createMissionValidation();
        break;
        default: 
            throw new Exception("La page n'existe pas"); 
    }
} catch(Exception $e) {
    $mainController->errorPage($e->getMessage());
}

require_once('./views/common/template.php');


