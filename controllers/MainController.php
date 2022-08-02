<?php
class MainController {

    public function home() {
        $page_description = "Page d'accuel du site du KGB."; 
        $page_title = "Présentation du site du KGB"; 
        ob_start(); 
        require_once('./views/homeView.php');
        $page_content = ob_get_clean();
        require_once('./views/common/template.php');
    }

    public function missions() {
        $page_description = "Page listant l'ensemble des missions secrètes du KGB."; 
        $page_title = "Missions du KGB"; 
        ob_start(); 
        require_once('./views/missionsView.php');
        $page_content = ob_get_clean();
        require_once('./views/common/template.php');
    }

    public function login() {
        $page_description = "Page de connexion en tant qu'administrateur du site du KGB pour créer, modifier ou supprimer des missions."; 
        $page_title = "Connexion en tant qu'administrateur du site du KGB"; 
        ob_start(); 
        require_once('./views/loginView.php');
        $page_content = ob_get_clean();
        require_once('./views/common/template.php');
    }
  
    public function errorPage($msg) {
        $page_description = "Page permettant de gérer les erreurs."; 
        $page_title = "Page d'erreur"; 
        ob_start(); 
        require_once('./views/errorPageView.php');
        $page_content = ob_get_clean();
        require_once('./views/common/template.php');
    }












}