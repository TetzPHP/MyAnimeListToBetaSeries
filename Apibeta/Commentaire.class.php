<?php

namespace Apibeta;

/**
 * Représente un commentaire
 * @author TetzPHP
 */
class Commentaire {

    //Attribut retourné par BetaSeries
    public $id,
            $user_id,
            $login,
            $avatar,
            $date,
            $text,
            $inner_id,
            $in_reply_to;
    //Attribut déduit
    private $depuis_type,
            $depuis_id;

    public function __construct($informations) {
        
    }

    /**
     * Répondre à ce commentaire
     * @param string $texte
     * @return Commentaire
     */
    public function repondre($texte) {
        return Comments::postComment($this->depuis_type, $this->depuis_id, $texte, $this->id);
    }

    /**
     * Supprimer le commentaire actuel
     * @return Commentaire
     */
    public function supprimer() {
        return Comments::deleteComment($this->id);
    }

}
