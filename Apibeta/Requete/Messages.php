<?php

namespace Apibeta\Requete;

use Apibeta\Objet\Message;

/**
 * Contient les requêtes concernant les Messages
 * @author TetzPHP
 */
abstract class Messages
{

    /**
     * Récupère une discussion identifiée par l'ID du premier message.
     * @param integer $id ID du premier message de la discussion
     * @return Message[]
     */
    public static function getDiscussion($id)
    {
        $parametres = array();
        $parametres['id'] = $id;
        return Message::tableau(static::executer(__METHOD__, $parametres));
    }

    /**
     * Récupère la boîte de réception du membre identifié, par pages de 20.
     * @param integer $page Numéro de la page, 1 par défaut
     * @return Message[]
     */
    public static function getInbox($page = 1)
    {
        $parametres = array();
        $parametres['page'] = $page;
        return Message::tableau(static::executer(__METHOD__, $parametres));
    }

    /**
     * Supprime un message que vous avez écrit.
     * @param integer $id ID du message à supprimer — Si c'est le premier d'une discussion, toute la discussion est supprimée
     * @return Message
     */
    public static function deleteMessage($id)
    {
        $parametres = array();
        $parametres['id'] = $id;
        return new Message(static::executer(__METHOD__, $parametres));
    }

    /**
     * Marque un message comme lu.
     * @param string $text Texte du message
     * @param string $title Titre du message (obligatoire si premier message)
     * @param integer $to ID du membre destinataire (obligatoire si premier message)
     * @param integer $id ID du premier message de la discussion (obligatoire si $to non présent)
     * @return Message
     */
    public static function postMessage($text, $title, $to = null, $id = null)
    {
        $parametres = array();
        if ($to !== null) {
            $parametres['to'] = $to;
        }
        if ($id !== null) {
            $parametres['id'] = $id;
        }
        $parametres['text'] = $text;
        $parametres['title'] = $title;
        return new Message(static::executer(__METHOD__, $parametres));
    }

    /**
     * Marque un message comme lu.
     * @param integer $id ID du message à marquer comme lu
     * @return Message
     */
    public static function postRead($id)
    {
        $parametres = array();
        $parametres['id'] = $id;
        return new Message(static::executer(__METHOD__, $parametres));
    }
}
