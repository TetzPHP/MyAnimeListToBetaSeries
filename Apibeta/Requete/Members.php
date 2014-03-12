<?php

namespace Apibeta\Requete;

use Apibeta\Configuration;
use Apibeta\Objet\Membre;

/**
 * Contient les requêtes concernant les Membres
 * @author TetzPHP
 */
abstract class Members extends Requete
{

    /**
     * Récupère un token d'accès avec le code fourni par l'identification OAuth 2.
     * @param string $redirect_uri L'adresse de callback que vous aviez déjà renseignée pour la première partie.
     * @param string $code Code récupéré par la première partie de l'identification.
     */
    public static function postAccess_token($redirect_uri, $code)
    {
        $client_id = Configuration::getCleAPI();
        $client_secret = Configuration::getCleSecrete();
        $parametres = array();
        $parametres['client_id'] = $client_id;
        $parametres['client_secret'] = $client_secret;
        $parametres['redirect_uri'] = $redirect_uri;
        $parametres['code'] = $code;
        return static::executer(__METHOD__, $parametres);
    }

    /**
     * Identification classique du membre.
     * @param string $login Identifiant (login ou e-mail)
     * @param string $password Mot de passe 
     */
    public static function postAuth($login, $password)
    {
        if (strlen($password) !== 32) {
            $password = md5($password);
        }
        $parametres = array();
        $parametres['login'] = $login;
        $parametres['password'] = $password;
        return static::executer(__METHOD__, $parametres);
    }

    /**
     * Uploade et remplace l'avatar de l'utilisateur identifié.
     * @param file $avatar Image à utiliser pour l'avatar de l'utilisateur.
     */
    public static function postAvatar($avatar)
    {
        $parametres = array();
        $parametres['avatar'] = $avatar;
        return static::executer(__METHOD__, $parametres);
    }

    /**
     * Supprime l'avatar de l'utilisateur identifié.
     */
    public static function deleteAvatar()
    {
        $parametres = array();
        return static::executer(__METHOD__, $parametres);
    }

    /**
     * Affiche les badges du membre.
     * @param int $id ID du membre
     */
    public static function getBadges($id)
    {
        $parametres = array();
        $parametres['id'] = $id;
        return static::executer(__METHOD__, $parametres);
    }

    /**
     * Détruit le token actif.
     */
    public static function postDestroy()
    {
        $parametres = array();
        return static::executer(__METHOD__, $parametres);
    }

    /**
     * Renvoie les informations d'un membre, du membre identifié par défaut.
     * @param bool $summary N'affiche que les informations et pas les séries / films du compte (Défaut false)
     * @param type $id ID du membre
     */
    public static function getInfos($summary = false, $id = null)
    {
        $parametres = array();
        $parametres['summary'] = $summary;
        if ($id !== null) {
            $parametres['id'] = $id;
        }
        return new Membre(static::executer(__METHOD__, $parametres));
    }

    /**
     * Vérifie que le token est actif.
     */
    public static function getIs_active()
    {
        $parametres = array();
        return static::executer(__METHOD__, $parametres);
    }

    /**
     * Envoie un e-mail pour réinitialiser le mot de passe.
     * @param string $find Adresse e-mail ou nom de l'utilisateur
     */
    public static function postLost($find)
    {
        $parametres = array();
        $parametres['find'] = $find;
        return static::executer(__METHOD__, $parametres);
    }

    /**
     * Affiche les dernières notifications du membre. 
     * @param int $since_id Dernier ID (Facultatif)
     * @param int $number Nombre de notifications, maximum 100 (Facultatif, défaut 10)
     * @param string $sort Tri. VOIR SORT_*
     * @param string $types Retourner uniquement certains types séparés par une virgule (Facultatif).  Types : badge, banner, bugs, character, commentaire, dons, episode, facebook, film, forum, friend, message, quizz, recommend, site, subtitles, video.
     * @param bool $auto_delete Suppression automatique des notifications (Facultatif, défaut false)
     * @return Notification[]
     */
    public static function getNotifications($since_id = null, $number = null, $sort = null, $types = null, $auto_delete = null)
    {
        $parametres = array();
        if ($since_id !== null) {
            $parametres['since_id'] = $since_id;
        }
        if ($number !== null) {
            $parametres['number'] = $number;
        }
        if ($sort !== null) {
            $parametres['sort'] = $sort;
        }
        if ($types !== null) {
            $parametres['types'] = $types;
        }
        if ($auto_delete !== null) {
            $parametres['auto_delete'] = $auto_delete;
        }
        return Notification::tableau(static::executer(__METHOD__, $parametres));
    }

    /**
     * Identification par OAuth.
     */
    public static function getOauth()
    {
        $parametres = array();
        return static::executer(__METHOD__, $parametres);
    }

    /**
     * Identification par OAuth. Renvoie l'utilisateur sur l'URL de callback que vous avez spécifiée dans votre compte avec le paramètre GET token.
     */
    public static function postOauth()
    {
        $parametres = array();
        return static::executer(__METHOD__, $parametres);
    }

    /**
     * Modifie ou affiche une option de l'utilisateur.
     * @param string $name Nom de l'option
     * @param string $value Valeur de l'option (Null pour afficher
     */
    public static function postOption($name, $value = null)
    {
        $parametres = array();
        $parametres['name'] = $name;
        if ($value !== null) {
            $parametres['value'] = $value;
        }
        return static::executer(__METHOD__, $parametres);
    }

    /**
     * Récupère les options (sous-titres) du membre.
     */
    public static function getOptions()
    {
        $parametres = array();
        return static::executer(__METHOD__, $parametres);
    }

    /**
     * Recherche des membres.
     * @param string $login Nom de l'utilisateur, 2 caractères minimum
     */
    public static function getSearch($login)
    {
        if (len($login) > 1) {
            $parametres = array();
            $parametres['login'] = $login;
            return static::executer(__METHOD__, $parametres);
        } else {
            
        }
    }

    /**
     * Crée un nouveau compte membre sur BetaSeries.
     * @param string $login
     * @param string $email
     * @param string $password
     */
    public static function postSignup($login, $email, $password = null)
    {
        if ($password !== null && len($password) !== 32) {
            $password = md5($password);
        }
        $parametres = array();
        $parametres['login'] = $login;
        $parametres['email'] = $email;
        $parametres['password'] = $password;
        return static::executer(__METHOD__, $parametres);
    }

    /**
     * Cherche les membres parmi les amis du compte.
     * @param array $mails Tableau POST des adresses e-mail à chercher
     */
    public static function postSync($mails)
    {
        $parametres = array();
        $parametres['mails'] = $mails;
        return static::executer(__METHOD__, $parametres);
    }

    /**
     * Retourne les possibilités de noms d'utilisateur libres sur BetaSeries.
     * @param string $username Nom d'utilisateur
     */
    public static function getUsername($username)
    {
        $parametres = array();
        $parametres['username'] = $username;
        return static::executer(__METHOD__, $parametres);
    }
}
