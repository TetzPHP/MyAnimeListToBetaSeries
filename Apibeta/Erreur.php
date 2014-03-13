<?php

namespace Apibeta;

/**
 * Ceci est une classe d'exception, elle est lancée lorsqu'une erreure est sourvenue.
 * @author TetzPHP
 */
class Erreur extends \Exception
{

    // Erreur Transport
    const CODE_ERREUR_PASDEREPONSE = 1;
    const TEXT_ERREUR_PASDEREPONSE = 'Impossible de communiquer avec le site BetaSeries. Merci de réessayer ultérieurement.';
    const CODE_ERREUR_PASDACTION = 2;
    const TEXT_ERREUR_PASDACTION = 'Impossible de résoudre l\'action demandée.';
    const TEXT_ERREUR_NON_AFFICHABLE = 'Nous avons rencontré une erreur. Merci de réassayer plus tard, si l\'erreur persiste, merci de contacter le webmaster.';
    // Erreur API
    const CODE_API_CLE_INVALIDE = 1001;
    const TEXT_API_CLE_INVALIDE = 'Clé API Invalide';
    const CODE_API_TYPE_INVALIDE = 1002;
    const TEXT_API_TYPE_INVALIDE = 'Type invalide';
    const CODE_API_ACTION_INVALIDE = 1003;
    const TEXT_API_ACTION_INVALIDE = 'Action invalide';
    // Erreur Utilisateur
    const CODE_USER_TOKEN_INALIDE = 2001;
    const TEXT_USER_TOKEN_INALIDE = "Token utilisateur invalide.";
    const CODE_USER_NONAUTHORISE = 2002;
    const TEXT_USER_NONAUTHORISE = "Les réglages vie privée de l'utilisateur ne permettent pas l'action";
    const CODE_USER_SERIEDEJAPRESENTE = 2003;
    const TEXT_USER_SERIEDEJAPRESENTE = "La série est déjà dans le compte utilisateur";
    const CODE_USER_SERIENONPRESENTE = 2004;
    const TEXT_USER_SERIENONPRESENTE = "La série n'est pas dans le compte utilisateur";
    const CODE_USER_EPISODENONVU = 2005;
    const TEXT_USER_EPISODENONVU = "L'utilisateur n'a pas vu cet épisode";
    const CODE_USER_PASAMIS = 2006;
    const TEXT_USER_PASAMIS = "Les deux utilisateurs ne sont pas amis";
    const CODE_USER_OPTION_INVALIDE = 2007;
    const TEXT_USER_OPTION_INVALIDE = "Les options de l'utilisateur ne sont pas valides";
    // Erreur d'entrées
    const CODE_VAR_MANQUANTE = 3001;
    const TEXT_VAR_MANQUANTE = "Une variable est manquante";
    const CODE_VAR_INSUFFISANT = 3002;
    const TEXT_VAR_INSUFFISANT = "Le terme doit avoir au moins 2 caractères";
    const CODE_VAR_NOMBRE = 3003;
    const TEXT_VAR_NOMBRE = "Le paramètre doit être un nombre";
    const CODE_VAR_INCORRECT = 3004;
    const TEXT_VAR_INCORRECT = "Valeur de la variable incorrecte";
    const CODE_VAR_NONAUTHORISE = 3005;
    const TEXT_VAR_NONAUTHORISE = "Caractères non autorisés";
    const CODE_VAR_EMAIL_INVALIDE = 3006;
    const TEXT_VAR_EMAIL_INVALIDE = "Adresse e-mail invalide";
    // Erreur de la base
    const CODE_BDD_NOTEXIST = 4001;
    const TEXT_BDD_NOTEXIST = "La série n'existe pas";
    const CODE_BDD_NOUSER = 4002;
    const TEXT_BDD_NOUSER = "L'utilisateur n'existe pas";
    const CODE_BDD_WRONGPASSWORD = 4003;
    const TEXT_BDD_WRONGPASSWORD = "Mauvais mot de passe";
    const CODE_BDD_USER_EXISTE = 4004;
    const TEXT_BDD_USER_EXISTE = "L'utilisateur existe déjà";

    /**
     * Fonction permettant de savoir si le message d'erreur doit être/peut être affiché pas l'utilisateur
     * @return bool
     */
    public function affichableUser()
    {
        $code = parent::getCode();
        return ($code == static::CODE_ERREUR_PASDEREPONSE || $code > static::CODE_USER_TOKEN_INALIDE && $code < static::CODE_VAR_MANQUANTE || $code == static::CODE_VAR_EMAIL_INVALIDE || $code > static::CODE_BDD_NOUSER);
    }
}
