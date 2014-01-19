<?php

namespace Apibeta;

/**
 * Contient les requêtes concernant les Subtitles
 * @author TetzPHP
 */
class Subtitles {

    const SUBTITLES_ALL = 'all';
    const SUBTITLES_VOVF = 'vovf';
    const SUBTITLES_VO = 'vo';
    const SUBTITLES_VF = 'vf';

    /**
     * Affiche les sous-titres pour un épisode donné.
     * @param integer $id ID de l'épisode
     * @param string $language : N'affiche que certaines langues : all|vovf|vo|vf (Facultatif)
     * @return Soustitre[]
     */
    public static function getEpisode($id, $language = null) {
        $parametres = array();
        $parametres['id'] = $id;
        if ($language !== null) {
            $parametres['language'] = $language;
        }
        return static::executer(__METHOD__, $parametres);
    }

    /**
     * Affiche les derniers sous-titres récupérés par BetaSeries.
     * @param integer $number Nombre de sous-titres, maximum 100
     * @param string $language : N'affiche que certaines langues : all|vovf|vo|vf (Facultatif)
     * @return Soustitre[]
     */
    public static function getLast($number, $language = null) {
        $parametres = array();
        $parametres['number'] = $number;
        if ($language !== null) {
            $parametres['language'] = $language;
        }
        return static::executer(__METHOD__, $parametres);
    }

    /**
     * Reporte des sous-titres comme incorrects pour se faire supprimer de la liste.
     * @param integer $id ID du sous-titre
     * @param string $reason Raison pour laquelle le sous-titre n'est pas correct
     * @return Soustitre[]
     */
    public static function postReport($id, $reason) {
        $parametres = array();
        $parametres['id'] = $id;
        $parametres['reason'] = $reason;
        return static::executer(__METHOD__, $parametres);
    }

    /**
     * Affiche les sous-titres pour une série donnée.
     * @param integer $id ID de la série
     * @param string $language : N'affiche que certaines langues : all|vovf|vo|vf (Facultatif)
     * @return Soustitre[]
     */
    public static function getShow($id, $language = null) {
        $parametres = array();
        $parametres['id'] = $id;
        if ($language !== null) {
            $parametres['language'] = $language;
        }
        return static::executer(__METHOD__, $parametres);
    }

}
