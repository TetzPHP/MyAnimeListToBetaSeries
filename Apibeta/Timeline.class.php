<?php

namespace Apibeta;

/**
 * Contient les requêtes concernant le Planning
 * @author TetzPHP
 */
class Timeline {

    /**
     * Affiche les derniers évènements des amis du membre identifié.
     * @param integer $nbpp Nombre d'évènements par page, maximum 100
     * @param integer $since_id ID du dernier évènement reçu (Facultatif)
     * @return Evenement[]
     */
    public static function getFriends($nbpp, $since_id = null) {
        $parametres = array();
        $parametres['nbpp'] = $nbpp;
        if ($since_id !== null) {
            $parametres['since_id'] = $since_id;
        }
        return static::executer(__METHOD__, $parametres);
    }

    /**
     * Affiche les derniers évènements du site.
     * @param integer $nbpp Nombre d'évènements par page, maximum 100
     * @param integer $since_id ID du dernier évènement reçu (Facultatif)
     * @return Evenement[]
     */
    public static function getHome($nbpp, $since_id = null) {
        $parametres = array();
        $parametres['nbpp'] = $nbpp;
        if ($since_id !== null) {
            $parametres['since_id'] = $since_id;
        }
        return static::executer(__METHOD__, $parametres);
    }

    /**
     * Affiche les derniers évènements du site.
     * @param integer $id  ID du membre
     * @param integer $nbpp Nombre d'évènements par page, maximum 100
     * @param integer $since_id ID du dernier évènement reçu (Facultatif)
     * @return Evenement[]
     */
    public static function getMember($id, $nbpp, $since_id = null) {
        $parametres = array();
        $parametres['id'] = $id;
        $parametres['nbpp'] = $nbpp;
        if ($since_id !== null) {
            $parametres['since_id'] = $since_id;
        }
        return static::executer(__METHOD__, $parametres);
    }

}
