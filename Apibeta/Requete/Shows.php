<?php

namespace Apibeta\Requete;

use Apibeta\Objet\Serie;
use Apibeta\Objet\Acteur;

/**
 * Contient les requêtes concernant les Shows
 * @author TetzPHP
 */
class Shows extends Requete
{

    const ORDER_ALPHABETIQUE = 'alphabetical';
    const ORDER_POPULARITE = 'popularity';

    /**
     * Archive une série dans le compte du membre.
     * @param integer $id ID de la série (Facultatif si thetvdb_id renseigné)
     * @param integer $thetvdb_id ID de la série sur TheTVDB (Facultatif si id renseigné)
     * @return Serie
     */
    public static function postArchive($id = null, $thetvdb_id = null)
    {
        $parametres = array();
        if ($id !== null) {
            $parametres['id'] = $id;
        }
        if ($thetvdb_id !== null) {
            $parametres['thetvdb_id'] = $thetvdb_id;
        }
        return new Serie(static::executer(__METHOD__, $parametres));
    }

    /**
     * Sort une série des archives du compte du membre.
     * @param integer $id ID de la série (Facultatif si thetvdb_id renseigné)
     * @param integer $thetvdb_id ID de la série sur TheTVDB (Facultatif si id renseigné)
     * @return Serie
     */
    public static function deleteArchive($id = null, $thetvdb_id = null)
    {
        $parametres = array();
        if ($id !== null) {
            $parametres['id'] = $id;
        }
        if ($thetvdb_id !== null) {
            $parametres['thetvdb_id'] = $thetvdb_id;
        }
        return new Serie(static::executer(__METHOD__, $parametres));
    }

    /**
     * Récupère les personnages de la série, ajoutés par les membres de BetaSeries.
     * @param integer $id ID de la série (Facultatif si thetvdb_id renseigné)
     * @param integer $thetvdb_id ID de la série sur TheTVDB (Facultatif si id renseigné)
     * @return Acteur[]
     */
    public static function getCharacters($id = null, $thetvdb_id = null)
    {
        $parametres = array();
        if ($id !== null) {
            $parametres['id'] = $id;
        }
        if ($thetvdb_id !== null) {
            $parametres['thetvdb_id'] = $thetvdb_id;
        }
        return static::executer(__METHOD__, $parametres);
    }

    /**
     * Affiche les informations d'une série.
     * @param integer $id ID de la série (Facultatif si thetvdb_id renseigné)
     * @param integer $thetvdb_id ID de la série sur TheTVDB (Facultatif si id renseigné)
     * @param string $user Affiche les infos de l'utilisateur identifié pour la série (Facultatif)
     * @return Serie
     */
    public static function getDisplay($id = null, $thetvdb_id = null, $user = null)
    {
        $parametres = array();
        if ($id !== null) {
            $parametres['id'] = $id;
        }
        if ($thetvdb_id !== null) {
            $parametres['thetvdb_id'] = $thetvdb_id;
        }
        if ($user !== null) {
            $parametres['user'] = $user;
        }
        return new Serie(static::executer(__METHOD__, $parametres));
    }

    /**
     * Affiche les informations d'une série.
     * @param integer $id ID de la série (Facultatif si thetvdb_id renseigné)
     * @param integer $thetvdb_id ID de la série sur TheTVDB (Facultatif si id renseigné)
     * @param string $season Numéro de la saison (Facultatif)
     * @param string $episode Numéro de l'épisode (Facultatif)
     * @param string $subtitles Affiche les sous-titres si renseigné (Facultatif)
     * @return Episode[]
     */
    public static function getEpisodes($id = null, $thetvdb_id = null, $season = null, $episode = null, $subtitles = null)
    {
        $parametres = array();
        if ($id !== null) {
            $parametres['id'] = $id;
        }
        if ($thetvdb_id !== null) {
            $parametres['thetvdb_id'] = $thetvdb_id;
        }
        if ($season !== null) {
            $parametres['season'] = $season;
        }
        if ($episode !== null) {
            $parametres['episode'] = $episode;
        }
        if ($subtitles !== null) {
            $parametres['subtitles'] = $subtitles;
        }
        return Episode::tableau(static::executer(__METHOD__, $parametres));
    }

    /**
     * Affiche la liste de toutes les séries.
     * @param string $order Spécifie l'ordre de retour. VOIR ORDER_*
     * @param integer $since N'afficher que les séries modifiées à partir de cette date (timestamp UNIX — facultatif)
     * @return Serie[]
     */
    public static function getList($order = null, $since = null)
    {
        $parametres = array();
        if ($order !== null) {
            $parametres['order'] = $order;
        }
        if ($since !== null) {
            $parametres['since'] = $since;
        }
        return Serie::tableau(static::executer(__METHOD__, $parametres));
    }

    /**
     * Note une série.
     * @param int $note Note attribuée de 1 à 5
     * @param int $id ID de la série (Facultatif si thetvdb_id renseigné)
     * @param int $thetvdb_id  ID de la série sur TheTVDB (Facultatif si id renseigné)
     * @return Serie
     */
    public static function postNote($note, $id = null, $thetvdb_id = null)
    {
        $parametres = array();
        $parametres['note'] = $note;
        if ($id !== null) {
            $parametres['id'] = $id;
        }
        if ($thetvdb_id !== null) {
            $parametres['thetvdb_id'] = $thetvdb_id;
        }
        return new Serie(static::executer(__METHOD__, $parametres));
    }

    /**
     * Supprime une note d'une série.
     * @param int $id ID de la série (Facultatif si thetvdb_id renseigné)
     * @param int $thetvdb_id  ID de la série sur TheTVDB (Facultatif si id renseigné)
     * @return Serie
     */
    public static function deleteNote($id = null, $thetvdb_id = null)
    {
        $parametres = array();
        if ($id !== null) {
            $parametres['id'] = $id;
        }
        if ($thetvdb_id !== null) {
            $parametres['thetvdb_id'] = $thetvdb_id;
        }
        return new Serie(static::executer(__METHOD__, $parametres));
    }

    /**
     * Récupère les images de la série, ajoutées par les membres de BetaSeries.
     * @param int $id ID de la série (Facultatif si thetvdb_id renseigné)
     * @param int $thetvdb_id  ID de la série sur TheTVDB (Facultatif si id renseigné)
     * @return Image[]
     */
    public static function getPictures($id = null, $thetvdb_id = null)
    {
        $parametres = array();
        if ($id !== null) {
            $parametres['id'] = $id;
        }
        if ($thetvdb_id !== null) {
            $parametres['thetvdb_id'] = $thetvdb_id;
        }
        return static::executer(__METHOD__, $parametres);
    }

    /**
     * Affiche une série au hasard.
     * @param integer $nb Nombre de séries à afficher, par défaut 1
     * @param bool $summary Retourne uniquement les infos essentielles de la série (Défaut false)
     * @return Serie
     */
    public static function getRandom($nb = 1, $summary = false)
    {
        $parametres = array();
        $parametres['nb'] = $nb;
        $parametres['summary'] = $summary;
        return new Serie(static::executer(__METHOD__, $parametres));
    }

    /**
     * Créer une recommandation d'une série d'un membre pour un ami.
     * @param int $to ID du membre ami
     * @param string $comments Commentaires pour l'ami (Facultatif)
     * @param int $id ID de la série (Facultatif si thetvdb_id renseigné)
     * @param int $thetvdb_id  ID de la série sur TheTVDB (Facultatif si id renseigné)
     * @return 
     */
    public static function postRecommendation($to, $comments = null, $id = null, $thetvdb_id = null)
    {
        $parametres = array();
        $parametres['to'] = $to;
        if ($comments !== null) {
            $parametres['comments'] = $comments;
        }
        if ($id !== null) {
            $parametres['id'] = $id;
        }
        if ($thetvdb_id !== null) {
            $parametres['thetvdb_id'] = $thetvdb_id;
        }
        return static::executer(__METHOD__, $parametres);
    }

    /**
     * Supprime une recommandation d'une série envoyée ou reçue.
     * @param int $id ID de la recommandation
     * @return type
     */
    public static function deleteRecommendation($id)
    {
        $parametres = array();
        $parametres['id'] = $id;
        return static::executer(__METHOD__, $parametres);
    }

    /**
     * Récupère les recommandations reçues par l'utilisateur identifié.
     * @return type
     */
    public static function getRecommendations()
    {
        $parametres = array();
        return static::executer(__METHOD__, $parametres);
    }

    /**
     * Recherche une série.
     * @param string $title Titre recherché
     * @param bool $summary Retourne uniquement les infos essentielles de la série (Défaut false)
     * @return Serie[]
     */
    public static function getSearch($title, $summary = false)
    {
        $parametres = array();
        $parametres['title'] = $title;
        $parametres['summary'] = $summary;
        return Serie::tableau(static::executer(__METHOD__, $parametres));
    }

    /**
     * Ajoute une série dans le compte du membre.
     * @param integer $id ID de la série (Facultatif si thetvdb_id renseigné)
     * @param integer $thetvdb_id ID de la série sur TheTVDB (Facultatif si id renseigné)
     * @return Serie
     */
    public static function postShow($id = null, $thetvdb_id = null)
    {
        $parametres = array();
        if ($id !== null) {
            $parametres['id'] = $id;
        }
        if ($thetvdb_id !== null) {
            $parametres['thetvdb_id'] = $thetvdb_id;
        }
        return new Serie(static::executer(__METHOD__, $parametres));
    }

    /**
     * Supprime une série du compte du membre.
     * @param integer $id ID de la série (Facultatif si thetvdb_id renseigné)
     * @param integer $thetvdb_id ID de la série sur TheTVDB (Facultatif si id renseigné)
     * @return Serie
     */
    public static function deleteShow($id = null, $thetvdb_id = null)
    {
        $parametres = array();
        if ($id !== null) {
            $parametres['id'] = $id;
        }
        if ($thetvdb_id !== null) {
            $parametres['thetvdb_id'] = $thetvdb_id;
        }
        return new Serie(static::executer(__METHOD__, $parametres));
    }

    /**
     * Récupère les séries marquées similaires par les membres de BetaSeries.
     * @param integer $id ID de la série (Facultatif si thetvdb_id renseigné)
     * @param integer $thetvdb_id ID de la série sur TheTVDB (Facultatif si id renseigné)
     * @return Serie[]
     */
    public static function getSimilars($id = null, $thetvdb_id = null)
    {
        $parametres = array();
        if ($id !== null) {
            $parametres['id'] = $id;
        }
        if ($thetvdb_id !== null) {
            $parametres['thetvdb_id'] = $thetvdb_id;
        }
        return Serie::tableau(static::executer(__METHOD__, $parametres));
    }

    /**
     * Récupère les vidéos associées à la série par les membres de BetaSeries.
     * @param integer $id ID de la série (Facultatif si thetvdb_id renseigné)
     * @param integer $thetvdb_id ID de la série sur TheTVDB (Facultatif si id renseigné)
     */
    public static function getVideos($id = null, $thetvdb_id = null)
    {
        $parametres = array();
        if ($id !== null) {
            $parametres['id'] = $id;
        }
        if ($thetvdb_id !== null) {
            $parametres['thetvdb_id'] = $thetvdb_id;
        }
        return static::executer(__METHOD__, $parametres);
    }
}
