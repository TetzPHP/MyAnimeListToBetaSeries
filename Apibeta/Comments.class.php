<?php

namespace Apibeta;

/**
 * Contient les requêtes concernant les commentaires
 * @author TetzPHP
 */
abstract class Comments {

    //Type de commentaires
    const TYPE_EPISODE = 'episode';
    const TYPE_SHOW = 'show';
    const TYPE_MEMBER = 'member';
    const TYPE_MOVIE = 'movie';
    //Ordre de classement
    const ORDER_ASC = 'asc';
    const ORDER_DESC = 'desc';

    /**
     * Envoie un commentaire pour l'élément spécifié.
     * @param string $type Type d'élément. Voir TYPE_*
     * @param string $id ID de l'élément en question
     * @param string $text Texte du commentaire
     * @param int $in_reply_to Si c'est une réponse, inner_id du commentaire correspondant (Facultatif)
     * @return Commentaire
     */
    public static function postComment($type, $id, $text, $in_reply_to = null) {
        $parametres = array();
        $parametres['type'] = $type;
        $parametres['id'] = $id;
        $parametres['text'] = $text;
        if ($in_reply_to !== null) {
            $parametres['in_reply_to'] = $in_reply_to;
        }
        return static::executer(__METHOD__, $parametres);
    }

    /**
     * Supprime un commentaire de l'utilisateur identifié.
     * @param int $id ID du commentaire
     * @return Commentaire
     */
    public static function deleteComment($id) {
        $parametres = array();
        $parametres['id'] = $id;
        return static::executer(__METHOD__, $parametres);
    }

    /**
     * Récupère les commentaires pour un élément donné.
     * @param string $type Type d'élément. Voir TYPE_*
     * @param string $id ID de l'élément en question
     * @param int $nbpp Nombre de commentaires par page
     * @param int $since_id ID du dernier commentaire reçu (Facultatif)
     * @param string $order Ordre chronologique de retour. Voir ORDER_*
     * @return Commentaire[]
     */
    public static function getComments($type, $id, $nbpp, $since_id = null, $order = Comments::ORDER_ASC) {
        $parametres = array();
        $parametres['type'] = $type;
        $parametres['id'] = $id;
        $parametres['nbpp'] = $nbpp;
        if ($since_id !== null) {
            $parametres['since_id'] = $since_id;
        }
        if ($order !== null) {
            $parametres['order'] = $order;
        }
        return static::executer(__METHOD__, $parametres);
    }

    /**
     * Inscrit le membre aux notifications e-mail pour l'élément donné.
     * @param string $type Type d'élément. Voir TYPE_*
     * @param string $id ID de l'élément en question
     * @return bool
     */
    public static function postSubscription($type, $id) {
        $parametres = array();
        $parametres['type'] = $type;
        $parametres['id'] = $id;
        return static::executer(__METHOD__, $parametres);
    }

    /**
     * Désinscrit le membre aux notifications e-mail pour l'élément donné.
     * @param string $type Type d'élément. Voir TYPE_*
     * @param string $id ID de l'élément en question
     * @return bool
     */
    public static function deleteSubscription($type, $id) {
        $parametres = array();
        $parametres['type'] = $type;
        $parametres['id'] = $id;
        return static::executer(__METHOD__, $parametres);
    }

}
