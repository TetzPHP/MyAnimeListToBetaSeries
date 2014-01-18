<?php

function __autoload($class_name) {
    include $class_name . '.class.php';
}

#Hypothèse d'utilisation
\Apibeta\Configuration::setCleAPI('MaClé');
if (isset($_GET['token']) && !empty($_GET['token'])) {
    \Apibeta\Configuration::setToken($_GET['token']);
} else {
    #Identification de l'utilisateur
    try {
        $postAuth = \Apibeta\Members::postAuth('Dev088', 'developer');
        if (!empty($postAuth['token'])) {
            \Apibeta\Configuration::setToken($postAuth['token']);
        }
    } catch (\Apibeta\Erreur $e) {
        if($e->affichableUser()){
            echo $e->getMessage();
        }else{
            echo \Apibeta\Erreur::TEXT_ERREUR_NON_AFFICHABLE;
        }
    }
}
var_dump(\Apibeta\Configuration::getToken());
#Ma liste d'épisodes à regarder
var_dump(\Apibeta\Episodes::getList());
