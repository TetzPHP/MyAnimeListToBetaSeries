<?php

namespace Apibeta;

/**
 * Contient les requêtes concernant le Planning
 * @author TetzPHP
 */
class Planning {

    /**
     * Marque un message comme lu.
     * @param string $date Date d'origine (YYYY-MM-JJ — Facultatif, par défaut "now")
     * @param string $before Nombre de jours avant (Facultatif, par défaut 8)
     * @param string $after Nombre de jours après (Facultatif, par défaut 8)
     * @param string $type Type d'épisodes à afficher : "all" ou "premieres" (Facultatif, par défaut "all")
     * @return Episode[]
     */
    public static function getGeneral($date = null, $before = null, $after = null, $type = null) {
        $parametres = array();
        if ($date !== null) {
            $parametres['date'] = $date;
        }
        if ($before !== null) {
            $parametres['before'] = $before;
        }
        if ($after !== null) {
            $parametres['after'] = $after;
        }
        if ($type !== null) {
            $parametres['type'] = $type;
        }
        return static::executer(__METHOD__, $parametres);
    }

    /**
     * Affiche uniquement le premier épisode des prochaines séries qui vont être diffusées.
     * @return Episode[]
     */
    public static function getIncoming() {
        $parametres = array();
        return static::executer(__METHOD__, $parametres);
    }

    /**
     * Affiche le planning du membre identifié ou d'un autre membre.
     * @param bool $unseen N'affiche que les épisodes non-vus
     * @param string $month Affiche le planning du mois spécifié (format YYYY-MM)
     * @param string $id ID du membre (Facultatif si identifié)
     * @return Episode[]
     */
    public static function getMember($unseen = false, $month = null, $id = null) {
        $parametres = array();
        if ($unseen !== null) {
            $parametres['unseen'] = $unseen;
        }
        if ($month !== null) {
            $parametres['month'] = $month;
        }
        if ($id !== null) {
            $parametres['id'] = $id;
        }
        return static::executer(__METHOD__, $parametres);
    }

}
