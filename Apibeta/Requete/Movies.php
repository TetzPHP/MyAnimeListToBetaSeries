<?php

namespace Apibeta\Requete;

use Apibeta\Objet\Film;

/**
 * Contient les requêtes concernant les Movies
 * @author TetzPHP
 */
class Movies extends Requete
{

    const ORDER_ALPHABETIQUE = 'alphabetical';
    const ORDER_POPULARITE = 'popularity';

    /**
     * Affiche la liste de tous les films.
     * @param integer $start Nombre de démarrage pour la liste des films (facultatif, défaut 0)
     * @param integer $limit Limite du nombre de films à afficher (maximum 1000) (facultatif)
     * @param string $order Spécifie l'ordre de retour (facultatif). VOIR ORDER_*
     * @return Film[]
     */
    public static function getList($start = null, $limit = null, $order = null)
    {
        $parametres = array();
        if ($start !== null) {
            $parametres['start'] = $start;
        }
        if ($limit !== null) {
            $parametres['limit'] = $limit;
        }
        if ($order !== null) {
            $parametres['order'] = $order;
        }
        return Film::tableau(static::executer(__METHOD__, $parametres));
    }

    /**
     * Affiche les détails d'un film.
     * @param integer $id ID du film
     * @return Film
     */
    public static function getMovie($id)
    {
        $parametres = array();
        $parametres['id'] = $id;
        return new Film(static::executer(__METHOD__, $parametres));
    }

    /**
     * Ajoute le film dans les films vus par le membre.
     * @param integer $id ID du film
     * @param integer $mail Activer les alertes e-mail (0 ou 1, 1 par défaut)
     * @param integer $twitter Activer les alertes Twitter (0 ou 1, 1 par défaut)
     * @param integer $state 0 = pas vu, 1 = vu, 2 = ne veut pas voir (0 par défaut)
     * @param integer $profile Afficher sur le profil (0 ou 1, 1 par défaut)
     * @return Film
     */
    public static function postMovie($id, $mail = 1, $twitter = 1, $state = 0, $profile = 1)
    {
        $parametres = array();
        $parametres['id'] = $id;
        $parametres['mail'] = $mail;
        $parametres['twitter'] = $twitter;
        $parametres['state'] = $state;
        $parametres['profile'] = $profile;
        return new Film(static::executer(__METHOD__, $parametres));
    }

    /**
     * Supprime un film du compte membre.
     * @param integer $id ID du film
     * @return Film
     */
    public static function deleteMovie($id)
    {
        $parametres = array();
        $parametres['id'] = $id;
        return new Film(static::executer(__METHOD__, $parametres));
    }

    /**
     * Affiche un film au hasard.
     * @param integer $nb Nombre de films à afficher, par défaut 1
     * @return Film[]
     */
    public static function getRandom($nb = 1)
    {
        $parametres = array();
        $parametres['nb'] = $nb;
        return Film::tableau(static::executer(__METHOD__, $parametres));
    }

    /**
     * Récupère les informations d'un film en fonction du nom de fichier
     * @param string $file Nom du fichier à traiter
     * @return Film
     */
    public static function getScrapper($file)
    {
        $parametres = array();
        $parametres['file'] = $file;
        return new Film(static::executer(__METHOD__, $parametres));
    }

    /**
     * Recherche un film.
     * @param string $title Titre recherché
     */
    public static function getSearch($title)
    {
        $parametres = array();
        $parametres['title'] = $title;
        return static::executer(__METHOD__, $parametres);
    }
}
