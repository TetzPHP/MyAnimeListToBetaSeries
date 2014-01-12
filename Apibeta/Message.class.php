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

}
