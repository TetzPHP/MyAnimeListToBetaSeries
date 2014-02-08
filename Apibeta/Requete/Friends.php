<?php

namespace Apibeta\Requete;

use Apibeta\Objet\Ami;

/**
 * Contient les requêtes concernant les amis
 * @author TetzPHP
 */
class Friends extends Requete
{

    /**
     * Bloque un utilisateur.
     * @param int $id ID du membre à bloquer
     * @return Ami
     */
    public static function postBlock($id)
    {
        $parametres = array();
        $parametres['id'] = $id;
        return new Ami(static::executer(__METHOD__, $parametres));
    }

    /**
     * Supprime le blocage d'un utilisateur.
     * @param int $id ID du membre à débloquer
     * @return Ami
     */
    public static function deleteBlock($id)
    {
        $parametres = array();
        $parametres['id'] = $id;
        return new Ami(static::executer(__METHOD__, $parametres));
    }

    /**
     * Ajoute un ami dans le compte de l'utilisateur.
     * @param int $id ID du membre à ajouter en ami
     * @return Ami
     */
    public static function postFriend($id)
    {
        $parametres = array();
        $parametres['id'] = $id;
        return new Ami(static::executer(__METHOD__, $parametres));
    }

    /**
     * Supprime un ami du compte de l'utilisateur.
     * @param int $id ID du membre à supprimer
     * @return Ami
     */
    public static function deleteFriend($id)
    {
        $parametres = array();
        $parametres['id'] = $id;
        return new Ami(static::executer(__METHOD__, $parametres));
    }

    /**
     * Récupère la liste des amis de l'utilisateur.
     * @param bool $blocked Si spécifié, retourne la liste des personnes bloquées
     * @return Ami[]
     */
    public static function getList($blocked = null)
    {
        $parametres = array();
        if ($blocked !== null) {
            $parametres['blocked'] = $blocked;
        }
        return Ami::tableau(static::executer(__METHOD__, $parametres));
    }

    /**
     * Récupère la liste des demandes envoyées par l'utilisateur.
     * @param bool $received Si spécifié, retourne la liste des demandes reçues
     * @return Ami[]
     */
    public static function getRequests($received = null)
    {
        $parametres = array();
        if ($received !== null) {
            $parametres['received'] = $received;
        }
        return Ami::tableau(static::executer(__METHOD__, $parametres));
    }
}
