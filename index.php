<?php

use Apibeta\Configuration;
use Apibeta\Erreur;
use Apibeta\Requete\Members;

header('Content-Type: text/html; charset=utf-8');

function __autoload($class_name)
{
    include $class_name . '.php';
}
#Hypothèse d'utilisation
Configuration::setCleAPI('');
if (isset($_GET['token']) && !empty($_GET['token'])) {
    Configuration::setToken($_GET['token']);
} else {
    #Identification de l'utilisateur
    try {
        $postAuth = Members::postAuth('', '');
        if (!empty($postAuth['token'])) {
            Configuration::setToken($postAuth['token']);
        }
    } catch (Erreur $e) {
        if ($e->affichableUser()) {
            echo $e->getMessage();
        } else {
            echo Erreur::TEXT_ERREUR_NON_AFFICHABLE;
        }
    }
}

try {
    $mesInfos = Members::getInfos();
} catch (Erreur $e) {
    if ($e->affichableUser()) {
        echo $e->getMessage();
    } else {
        echo Erreur::TEXT_ERREUR_NON_AFFICHABLE;
    }
}