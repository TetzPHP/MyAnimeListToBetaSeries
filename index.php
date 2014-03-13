<?php
//autoload
spl_autoload_register();

use Apibeta\Configuration;
use Apibeta\Erreur;
use Apibeta\Requete\Members;

header('Content-Type: text/html; charset=utf-8');
include_once 'conf.php';

if (isset($_COOKIE[Configuration::getUserAgent()]) && !empty($_COOKIE[Configuration::getUserAgent()])) {
    Configuration::setToken($_COOKIE[Configuration::getUserAgent()]);
} else {
    #Identification de l'utilisateur
    try {
        $postAuth = Members::postAuth('', '');
        if (!empty($postAuth['token'])) {
            Configuration::setToken($postAuth['token']);
            setcookie(Configuration::getUserAgent(), $postAuth['token']);
        }
    } catch (Erreur $e) {
        if ($e->affichableUser()) {
            echo $e->getMessage();
        } else {
            echo Erreur::TEXT_ERREUR_NON_AFFICHABLE;
        }
    }
}

$bases = Db::retourTableau('select * from animes');
try {
    $O_membre = Members::getInfos();
    $export = 'C:\Users\*\Desktop\export\animelist_*_-_129144.xml';
    $O_simpleXml = simplexml_load_file($export, 'SimpleXMLElement', LIBXML_NOCDATA);
    
    foreach ($O_simpleXml->anime as $O_anime) {
        echo $O_anime->series_title;
        foreach ($O_membre->getShows() as $O_serie) {
            if(strtolower($O_anime->series_title) == strtolower($O_serie->getTitle())){
                echo '<span style="color: red;"> - trouve !</span> - My : '.$O_anime->series_animedb_id.' - Beta : '.$O_serie->getId().'('.$O_serie->getThetvdb_id().')';
                //Correspondance à 100%
                //var_dump(Db::AjouterCorrespondanceAnime($O_serie->getId(), $O_serie->getThetvdb_id(), null, $O_anime->series_animedb_id, $O_anime->series_title, null, $O_serie->getTitle(), false));
            }
        }
        echo '<br />';
    }
} catch (Erreur $e) {
    if ($e->affichableUser()) {
        echo $e->getMessage();
    } else {
        echo Erreur::TEXT_ERREUR_NON_AFFICHABLE;
    }
}