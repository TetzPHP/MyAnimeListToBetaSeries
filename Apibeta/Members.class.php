<?php

namespace Apibeta;

/**
 * Contient les requêtes concernant les Membres
 * @author TetzPHP
 */
abstract class Members {

    /**
     * Récupère un token d'accès avec le code fourni par l'identification OAuth 2.
     * /!\ Non testé !!!
     * @param string $redirect_uri L'adresse de callback que vous aviez déjà renseignée pour la première partie.
     * @param string $code Code récupéré par la première partie de l'identification.
     */
    static public function postAccess_token($redirect_uri, $code) {
        $client_id = \Apibeta\Configuration::getCleAPI();
        $client_secret = \Apibeta\Configuration::getCleSecrete();
    }

    /**
     * Identification classique du membre.
     * @param string $login Identifiant (login ou e-mail)
     * @param string $password Mot de passe 
     */
    public static function postAuth($login, $password) {
        if (len($password) !== 32) {
            $password = md5($password);
        }
    }

    /**
     * Uploade et remplace l'avatar de l'utilisateur identifié.
     * @param file $avatar Image à utiliser pour l'avatar de l'utilisateur.
     */
    public static function postAvatar($avatar) {
        
    }

    /**
     * Supprime l'avatar de l'utilisateur identifié.
     */
    public static function deleteAvatar() {
        
    }

    /**
     * Affiche les badges du membre.
     * @param int $id ID du membre
     */
    public static function getBadges($id) {
        
    }

    /**
     * Détruit le token actif.
     */
    public static function postDestroy() {
        
    }

    /**
     * Renvoie les informations d'un membre, du membre identifié par défaut.
     * @param type $id ID du membre
     * @param bool $summary N'affiche que les informations et pas les séries / films du compte (Défaut false)
     */
    public static function getInfos($id, $summary = false) {
        
    }

    /**
     * Vérifie que le token est actif.
     */
    public static function getIs_active() {
        
    }

    /**
     * Envoie un e-mail pour réinitialiser le mot de passe.
     * @param string $find Adresse e-mail ou nom de l'utilisateur
     */
    public static function postLost($find) {
        
    }

    /**
     * Affiche les dernières notifications du membre. 
     * @param int $since_id Dernier ID (Facultatif)
     * @param int $number Nombre de notifications, maximum 100 (Facultatif, défaut 10)
     * @param string $sort Tri. VOIR SORT_*
     * @param string $types Retourner uniquement certains types séparés par une virgule (Facultatif).  Types : badge, banner, bugs, character, commentaire, dons, episode, facebook, film, forum, friend, message, quizz, recommend, site, subtitles, video.
     * @param bool $auto_delete Suppression automatique des notifications (Facultatif, défaut false)
     */
    public static function getNotifications($since_id = null, $number = null, $sort = null, $types = null, $auto_delete = null) {
        
    }

    /**
     * Identification par OAuth.
     */
    public static function getOauth() {
        
    }

    /**
     * Identification par OAuth. Renvoie l'utilisateur sur l'URL de callback que vous avez spécifiée dans votre compte avec le paramètre GET token.
     */
    public static function postOauth() {
        
    }
    
    /**
     * Modifie ou affiche une option de l'utilisateur.
     * @param string $name Nom de l'option
     * @param string $value Valeur de l'option
     */
    public static function postOption($name, $value = null) {
        
    }

    /**
     * Récupère les options (sous-titres) du membre.
     */
    public static function getOptions(){
        
    }
    
    /**
     * Recherche des membres.
     * @param string $login Nom de l'utilisateur, 2 caractères minimum
     */
    public static function getSearch($login) {
        if(len($login) > 1){
            
        }
    }
    
    /**
     * Crée un nouveau compte membre sur BetaSeries.
     * @param string $login
     * @param string $email
     * @param string $password
     */
    public static function postSignup($login, $email, $password = null){
        if ($password !== null && len($password) !== 32) {
            $password = md5($password);
        }
    }
    
    /**
     * Cherche les membres parmi les amis du compte.
     * @param array $mails Tableau POST des adresses e-mail à chercher
     */
    public static function postSync($mails) {
        
    }
    
    /**
     * Retourne les possibilités de noms d'utilisateur libres sur BetaSeries.
     * @param string $username Nom d'utilisateur
     */
    public static function getUsername($username){
        
    }
}
