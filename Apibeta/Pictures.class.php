<?php

namespace Apibeta;

/**
 * Contient les requêtes concernant les Pictures
 * @author TetzPHP
 */
class Pictures {

    /**
     * Retourne une image du badge (32x32).
     * @param integer $id ID du badge
     */
    public static function getBadges($id) {
        $parametres = array();
        $parametres['id'] = $id;
        return static::executer(__METHOD__, $parametres);
    }

    /**
     * Retourne une image du personnage.
     * @param integer $id : ID du personnage
     * @param integer $width : Largeur désirée (facultatif, défaut 250)
     * @param integer $height : Hauteur désirée (facultatif, défaut 375)
     */
    public static function getCharacters($id, $width = null, $height = null) {
        $parametres = array();
        $parametres['id'] = $id;
        if ($width !== null) {
            $parametres['width'] = $width;
        }
        if ($height !== null) {
            $parametres['height'] = $height;
        }
        return static::executer(__METHOD__, $parametres);
    }

    /**
     * Retourne une image de l'épisode.
     * @param integer $id : ID du personnage
     * @param integer $width : Largeur désirée (facultatif)
     * @param integer $height : Hauteur désirée (facultatif)
     */
    public static function getEpisodes($id, $width = null, $height = null) {
        $parametres = array();
        $parametres['id'] = $id;
        if ($width !== null) {
            $parametres['width'] = $width;
        }
        if ($height !== null) {
            $parametres['height'] = $height;
        }
        return static::executer(__METHOD__, $parametres);
    }
    
    /**
     * Retourne une image du membre.
     * @param integer $id : ID du personnage
     * @param integer $width : Largeur désirée (facultatif)
     * @param integer $height : Hauteur désirée (facultatif)
     */
    public static function getMembers($id, $width = null, $height = null) {
        $parametres = array();
        $parametres['id'] = $id;
        if ($width !== null) {
            $parametres['width'] = $width;
        }
        if ($height !== null) {
            $parametres['height'] = $height;
        }
        return static::executer(__METHOD__, $parametres);
    }    
    
    /**
     * Retourne une image de la série.
     * @param integer $id : ID du personnage
     * @param integer $width : Largeur désirée (facultatif)
     * @param integer $height : Hauteur désirée (facultatif)
     */
    public static function getShows($id, $width = null, $height = null) {
        $parametres = array();
        $parametres['id'] = $id;
        if ($width !== null) {
            $parametres['width'] = $width;
        }
        if ($height !== null) {
            $parametres['height'] = $height;
        }
        return static::executer(__METHOD__, $parametres);
    }
}
