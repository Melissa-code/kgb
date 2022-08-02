<?php

try {
    if(empty($_GET['page'])){
        $page = "accueil"; 
    } else {
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
        $page = $url[0];
    }
    
    switch($page) {
        case "home": 
            $page_description = "Page d'accuel du site du KGB."; 
            $page_title = "Présentation du site du KGB"; 
            $page_content = "<h1>Bienvenu sur le site du KGB</h1>";
        break;
        case "missions": 
            $page_description = "Page listant l'ensemble des missions secrètes du KGB."; 
            $page_title = "Missions du KGB"; 
            $page_content = "<h1>Liste des missions</h1>";
        break;
        case "login": 
            $page_description = "Page de connexion en tant qu'administrateur du site du KGB pour créer, modifier ou supprimer des missions."; 
            $page_title = "Connexion en tant qu'administrateur du site du KGB"; 
            $page_content = "<h1>Connexion</h1>";
        break;
        default: 
            throw new Exception("La page n'existe pas"); 
    }
} catch(Exception $e) {
    $page_description = "Page permettant de gérer les erreurs."; 
    $page_title = "Page d'erreur"; 
    $page_content = $e->getMessage();
}

require_once('./views/common/template.php');
