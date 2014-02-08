<?php

namespace Apibeta\Objet;

use Apibeta\Requete\Messages;

/**
 * Représente un Message
 * @author TetzPHP
 */
class Message extends Generique
{

    //Attribut renvoyé par BetaSeries
    protected $id;
    protected $message_id;
    protected $inner_id;
    protected $sender;
    protected $recipient;
    protected $date;
    protected $title;
    protected $text;
    protected $unread;
    protected $has_unread;

    /**
     * Supprimer le Message actuel
     * @return Message
     */
    public function supprimer()
    {
        return Messages::deleteMessage($this->message_id);
    }

    /**
     * Répondre au message
     * @return Message
     */
    public function repondre($text, $title)
    {
        return Messages::postMessage($text, $title, null, $this->message_id);
    }

    /**
     * Marquer le message comme lu
     * @return Message
     */
    public function marquerCommeLu()
    {
        return Messages::postRead($this->message_id);
    }
}
