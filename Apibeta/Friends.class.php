<?php

namespace Apibeta;

/**
 * Contient les requêtes concernant les amis
 * @author TetzPHP
 */
class Friends {

    public static function postBlock($id) {
        $parametres = array();
        $parametres['id'] = $id;
        return static::executer(__METHOD__, $parametres);
    }

    public static function deleteBlock($id) {
        $parametres = array();
        $parametres['id'] = $id;
        return static::executer(__METHOD__, $parametres);
    }

    public static function postFriend($id) {
        $parametres = array();
        $parametres['id'] = $id;
        return static::executer(__METHOD__, $parametres);
    }

    public static function deleteFriend($id) {
        $parametres = array();
        $parametres['id'] = $id;
        return static::executer(__METHOD__, $parametres);
    }

    public static function getList($blocked = null) {
        $parametres = array();
        if ($blocked !== null) {
            $parametres['blocked'] = $blocked;
        }
        return static::executer(__METHOD__, $parametres);
    }

    public static function getRequests($received = null) {
        $parametres = array();
        if ($received !== null) {
            $parametres['received'] = $received;
        }
        return static::executer(__METHOD__, $parametres);
    }

}
