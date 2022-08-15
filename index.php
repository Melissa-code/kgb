<?php

require_once("controllers/MainController.php"); 
require_once("controllers/StatusController.php"); 
require_once("controllers/TypeController.php"); 
require_once("controllers/DurationController.php"); 

$mainController = new MainController(); // to use the functions from the MainController
$statusController = new StatusController(); 
$typeController = new TypeController(); 
$durationController = new DurationController(); 



// pour avoir le chemin depuis la racine du site
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS'])? "https" : "http"). "://". $_SERVER['HTTP_HOST']. $_SERVER['PHP_SELF']));


try {
    if(empty($_GET['page'])){
        $page = "home"; 
    } else {
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
        $page = $url[0];
    }

    switch($page) {
        case "home": 
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
        case "loginValidation": 
            $mainController->loginValidation();
        break;
        case "logout": 
            $mainController->logout();
        break;

        case "createMission": 
            $mainController->createMission();
        break;
        case "createMissionValidation": 
            $mainController->createMissionValidation();
        break;
        case "updateMission": 
            $mainController->updateMission();
        break;
        case "updateMissionValidation": 
            $mainController->updateMissionValidation();
        break;
        case "deleteMission": 
            $mainController->deleteMission();
        break;


        case "createDuration": 
            $durationController->createDuration(); 
        break;
        case "createDurationValidation": 
            $durationController->createDurationValidation();
        break;
        case "updateDuration": 
            //$durationController->updateDuration();
        break;
        case "updateDurationValidation": 
            //$durationController->updateDurationValidation();
        break;
        case "deleteDuration": 
            //$durationController->deleteDuration();
        break;


        case "createStatus": 
            $statusController->createStatus(); 
        break;
        case "createStatusValidation": 
            $statusController->createStatusValidation();
        break;
        case "updateStatus": 
            $statusController->updateStatus();
        break;
        case "updateStatusValidation": 
            //$statusController->updateStatusValidation();
        break;
        case "deleteStatus": 
            $statusController->deleteStatus();
        break;


        case "createType": 
            $typeController->createType(); 
        break;
        case "createTypeValidation": 
            $typeController->createTypeValidation();
        break;
        case "updateType": 
            //$typeController->updateType();
        break;
        case "updateTypeValidation": 
            //$typeController->updateTypeValidation();
        break;
        case "deleteStatus": 
            //$typeController->deleteType();
        break;



        
        default: 
            throw new Exception("La page n'existe pas"); 
    }
} catch(Exception $e) {
    $mainController->errorPage($e->getMessage());
}

require_once('./views/common/template.php');


