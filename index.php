<?php

spl_autoload_register();

use Apibeta\Configuration;
use Apibeta\Erreur;
use Apibeta\Requete\Members;

header('Content-Type: text/html; charset=utf-8');

#Hypothèse d'utilisation
Configuration::setCleAPI('');
Configuration::setCleSecrete('');
//Configuration::setUserAgent('ApiBetaPhp5'); #Personalisation du UserAgent
if (isset($_COOKIE[Configuration::getUserAgent()]) && !empty($_COOKIE[Configuration::getUserAgent()])) {
    Configuration::setToken($_COOKIE[Configuration::getUserAgent()]);
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
    $O_membre = Members::getInfos();
    var_dump($O_membre);
} catch (Erreur $e) {
    if ($e->affichableUser()) {
        echo $e->getMessage();
    } else {
        echo Erreur::TEXT_ERREUR_NON_AFFICHABLE;
    }
}