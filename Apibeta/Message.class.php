<?php

namespace Apibeta;

/**
 * Représente un Message
 * @author TetzPHP
 */
class Message {

    //Attribut renvoyé par BetaSeries
    public $id,
            $message_id,
            $inner_id,
            $sender,
            $recipient,
            $date,
            $title,
            $text,
            $unread,
            $has_unread;
    
    /**
     * Supprimer le Message actuel
     * @return Message
     */
    public function supprimer() {
        return Messages::deleteMessage($this->message_id);
    }
    
    /**
     * Répondre au message
     * @return Message
     */
    public function repondre($text, $title){
        return Messages::postMessage($text, $title, null, $this->message_id);
    }
    
    /**
     * Marquer le message comme lu
     * @return Message
     */
    public function marquerCommeLu(){
        return Messages::postRead($this->message_id);
    }
}
