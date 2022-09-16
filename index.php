<?php session_start();

require_once("controllers/MainController.php"); 
require_once("controllers/AgentController.php"); 
require_once("controllers/ContactController.php"); 
require_once("controllers/TargetController.php"); 
require_once("controllers/StatusController.php"); 
require_once("controllers/TypeController.php"); 
require_once("controllers/DurationController.php"); 
require_once("controllers/HideoutController.php"); 
require_once("controllers/SpecialityController.php"); 


$mainController = new MainController(); // to use the functions from the MainController
$agentController = new AgentController(); 
$contactController = new ContactController(); 
$targetController = new TargetController(); 
$statusController = new StatusController(); 
$typeController = new TypeController(); 
$durationController = new DurationController(); 
$hideoutController = new HideoutController(); 
$specialityController = new SpecialityController(); 


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
        // home
        case "home": 
            $mainController->home();
        break;

        // login admin 
        case "login": 
            $mainController->login();
        break;
        case "loginValidation": 
            $mainController->loginValidation();
        break;
        case "logout": 
            $mainController->logout();
        break;

        // Mission
        case "missions": 
            $mainController->missions();
        break;
        case "oneMission": 
            $mainController->oneMission();
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

        // Speciality
        case "createSpeciality": 
            $specialityController->createSpeciality(); 
        break;
        case "createSpecialityValidation": 
            $specialityController->createSpecialityValidation();
        break;
        case "specialitiesList": 
            $specialityController->specialitiesList();
        break;
        case "updateSpeciality": 
            $specialityController->updateSpeciality();
        break;
        case "updateSpecialityValidation": 
            $specialityController->updateSpecialityValidation();
        break;
        case "deleteSpeciality": 
            $specialityController->deleteSpeciality();
        break;

        // agent
        case "createAgent": 
            $agentController->createAgent(); 
        break;
        case "createAgentValidation": 
            $agentController->createAgentValidation();
        break;
        case "agentsList": 
            $agentController->agentsList();
        break;
        case "updateAgent": 
            $agentController->updateAgent();
        break;
        case "updateAgentValidation": 
            $agentController->updateAgentValidation();
        break;
        case "deleteAgent": 
            $agentController->deleteAgent();
        break;

        // contact 
        case "createContact": 
            $contactController->createContact(); 
        break;
        case "createContactValidation": 
            $contactController->createContactValidation();
        break;
        case "contactsList": 
            $contactController->contactsList();
        break;
        case "updateContact": 
            $contactController->updateContact();
        break;
        case "updateContactValidation": 
            $contactController->updateContactValidation();
        break;
        case "deleteContact": 
            $contactController->deleteContact();
        break;

        // target
        case "createTarget": 
            $targetController->createTarget(); 
        break;
        case "createTargetValidation": 
            $targetController->createTargetValidation();
        break;
        case "targetsList": 
            $targetController->targetsList();
        break;
        case "updateTarget": 
            $targetController->updateTarget();
        break;
        case "updateTargetValidation": 
            $targetController->updateTargetValidation();
        break;
        case "deleteTarget": 
            $targetController->deleteTarget();
        break;

        // duration
        case "createDuration": 
            $durationController->createDuration(); 
        break;
        case "createDurationValidation": 
            $durationController->createDurationValidation();
        break;
        case "durationsList": 
            $durationController->durationsList();
        break;
        case "updateDuration": 
            $durationController->updateDuration();
        break;
        case "updateDurationValidation": 
            $durationController->updateDurationValidation();
        break;
        case "deleteDuration": 
            $durationController->deleteDuration();
        break;

        // status
        case "createStatus": 
            $statusController->createStatus(); 
        break;
        case "createStatusValidation": 
            $statusController->createStatusValidation();
        break;
        case "statusList": 
            $statusController->statusList();
        break;
        case "updateStatus": 
            $statusController->updateStatus();
        break;
        case "updateStatusValidation": 
            $statusController->updateStatusValidation();
        break;
        case "deleteStatus": 
            $statusController->deleteStatus();
        break;

        // type
        case "createType": 
            $typeController->createType(); 
        break;
        case "createTypeValidation": 
            $typeController->createTypeValidation();
        break;
        case "typesList": 
            $typeController->typesList();
        break;
        case "updateType": 
            $typeController->updateType();
        break;
        case "updateTypeValidation": 
            $typeController->updateTypeValidation();
        break;
        case "deleteType": 
            $typeController->deleteType();
        break;

        // hideout 
        case "createHideout": 
            $hideoutController->createHideout(); 
        break;
        case "createHideoutValidation": 
            $hideoutController->createHideoutValidation();
        break;
        case "hideoutsList": 
            $hideoutController->hideoutsList();
        break;
        case "updateHideout": 
            $hideoutController->updateHideout();
        break;
        case "updateHideoutValidation": 
            $hideoutController->updateHideoutValidation();
        break;
        case "deleteHideout": 
            $hideoutController->deleteHideout();
        break;

        default: 
            throw new Exception("La page n'existe pas"); 
    }
} catch(Exception $e) {
    $mainController->errorPage($e->getMessage());
}

require_once('./views/common/template.php');


