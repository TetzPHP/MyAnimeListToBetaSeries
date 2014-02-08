<?php

namespace Apibeta\Requete;

use Apibeta\Objet\Episode;
use Apibeta\Objet\Serie;

/**
 * Contient les requêtes concernant les épisodes
 * @author TetzPHP
 */
abstract class Episodes extends Requete
{

    const SUBTITLES_ALL = 'all';
    const SUBTITLES_VOVF = 'vovf';
    const SUBTITLES_VO = 'vo';
    const SUBTITLES_VF = 'vf';

    /**
     * Affiche les informations d'un épisode.
     * @param int|array $id ID de l'épisode. Vous pouvez en mettre plusieurs (Tableau) (Facultatif si thetvdb_id renseigné)
     * @param int|array $thetvdb_id  ID de l'épisode sur TheTVDB. Vous pouvez en mettre plusieurs (Tableau) (Facultatif si id renseigné)
     * @param bool $subtitles Affiche les sous-titres (Ne pas afficher = null)
     * @return Episode
     */
    public static function getDisplay($id = null, $thetvdb_id = null, $subtitles = null)
    {
        $parametres = array();
        if ($id !== null) {
            $parametres['id'] = $id;
        }
        if ($thetvdb_id !== null) {
            $parametres['thetvdb_id'] = $thetvdb_id;
        }
        if ($subtitles !== null) {
            $parametres['subtitles'] = $subtitles;
        }
        return new Episode(static::executer(__METHOD__, $parametres));
    }

    /**
     * Marque un épisode comme téléchargé.
     * @param int $id ID de l'épisode (Facultatif si thetvdb_id renseigné)
     * @param int $thetvdb_id ID de l'épisode sur TheTVDB (Facultatif si id renseigné)
     * @return Episode
     */
    public static function postDownloaded($id = null, $thetvdb_id = null)
    {
        $parametres = array();
        if ($id !== null) {
            $parametres['id'] = $id;
        }
        if ($thetvdb_id !== null) {
            $parametres['thetvdb_id'] = $thetvdb_id;
        }
        return new Episode(static::executer(__METHOD__, $parametres));
    }

    /**
     * Enlève le marquage d'un épisode comme téléchargé.
     * @param int $id ID de l'épisode (Facultatif si thetvdb_id renseigné)
     * @param int $thetvdb_id ID de l'épisode sur TheTVDB (Facultatif si id renseigné)
     * @return Episode
     */
    public static function deleteDownloaded($id = null, $thetvdb_id = null)
    {
        $parametres = array();
        if ($id !== null) {
            $parametres['id'] = $id;
        }
        if ($thetvdb_id !== null) {
            $parametres['thetvdb_id'] = $thetvdb_id;
        }
        return new Episode(static::executer(__METHOD__, $parametres));
    }

    /**
     * Récupère la liste des épisodes à voir.
     * @param string $subtitles  Affiche les épisodes avec certains sous-titres. (Facutatif) Voir SUBTITLES_*
     * @param int $limit Limite à un nombre d'épisodes par série (Facultatif)
     * @param int $showId ID de la série (Facultatif)
     * @param int $userId ID du membre (Facultatif, par défaut membre identifié)
     * @return Episode[]
     */
    public static function getList($subtitles = null, $limit = null, $showId = null, $userId = null)
    {
        $parametres = array();
        if ($subtitles !== null) {
            $parametres['subtitles'] = $subtitles;
        }
        if ($limit !== null) {
            $parametres['limit'] = $limit;
        }
        if ($showId !== null) {
            $parametres['showId'] = $showId;
        }
        if ($userId !== null) {
            $parametres['userId'] = $userId;
        }
        return Serie::tableau(static::executer(__METHOD__, $parametres));
    }

    /**
     * Note un épisode.
     * @param int $note Note attribuée de 1 à 5
     * @param int $id ID de l'épisode (Facultatif si thetvdb_id renseigné)
     * @param int $thetvdb_id ID de l'épisode sur TheTVDB (Facultatif si id renseigné)
     * @return Episode
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
        return new Episode(static::executer(__METHOD__, $parametres));
    }

    /**
     * Supprime une note d'un épisode.
     * @param int $id ID de l'épisode (Facultatif si thetvdb_id renseigné)
     * @param int $thetvdb_id ID de l'épisode sur TheTVDB (Facultatif si id renseigné)
     * @return Episode
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
        return new Episode(static::executer(__METHOD__, $parametres));
    }

    /**
     * Récupère les informations d'un épisode en fonction du nom de fichier
     * @param string $nomFichier Nom du fichier à traiter
     * @return Episode
     */
    public static function getScrapper($nomFichier)
    {
        $parametres = array();
        $parametres['nomFichier'] = $nomFichier;
        return new Episode(static::executer(__METHOD__, $parametres));
    }

    /**
     * Récupère les informations d'un épisode en fonction d'informations.
     * @param int $show_id ID de la série pour l'épisode à chercher
     * @param string $number Numéro de la série, soit SxxExx soit le numéro global
     * @param string $subtitles Si spécifié, retourne les sous-titres des épisodes
     * @return Episode
     */
    public static function getSearch($show_id, $number, $subtitles = null)
    {
        $parametres = array();
        $parametres['show_id'] = $show_id;
        $parametres['number'] = $number;
        $parametres['subtitles'] = $subtitles;
        return new Episode(static::executer(__METHOD__, $parametres));
    }

    /**
     * Marque un épisode comme vu.
     * @param int $id ID de l'épisode (Facultatif si thetvdb_id renseigné)
     * @param int $thetvdb_id ID de l'épisode sur TheTVDB (Facultatif si id renseigné)
     * @param bool $bulk Si bulk est spécifié, tous les épisodes précédents seront aussi marqués comme vus
     * @param bool $delete Si delete est spécifié, tous les épisodes d'après ne seront plus marqués comme vus
     * @param int $note  Si la note est spécifiée entre 1 et 5, donne une note à l'épisode
     * @return Episode
     */
    public static function postWatched($id = null, $thetvdb_id = null, $bulk = null, $delete = null, $note = null)
    {
        $parametres = array();
        if ($id !== null) {
            $parametres['id'] = $id;
        }
        if ($thetvdb_id !== null) {
            $parametres['thetvdb_id'] = $thetvdb_id;
        }
        if ($bulk !== null) {
            $parametres['bulk'] = $bulk;
        }
        if ($delete !== null) {
            $parametres['delete'] = $delete;
        }
        if ($note !== null) {
            $parametres['note'] = $note;
        }
        return new Episode(static::executer(__METHOD__, $parametres));
    }

    /**
     * Enlève le marquage d'un épisode comme vu.
     * @param int $id ID de l'épisode (Facultatif si thetvdb_id renseigné)
     * @param int $thetvdb_id ID de l'épisode sur TheTVDB (Facultatif si id renseigné)
     * @return Episode
     */
    public static function deleteWatched($id = null, $thetvdb_id = null)
    {
        $parametres = array();
        if ($id !== null) {
            $parametres['id'] = $id;
        }
        if ($thetvdb_id !== null) {
            $parametres['thetvdb_id'] = $thetvdb_id;
        }
        return new Episode(static::executer(__METHOD__, $parametres));
    }
}
