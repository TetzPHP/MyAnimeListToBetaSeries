<?php

namespace Apibeta\Requete;

use Apibeta\Configuration;
use Apibeta\Erreur;

/**
 * Class intérrogeant l'api de BetaSeries
 * @author TetzPHP
 */
abstract class Requete
{

    const METHOD_POST = 'POST';
    const METHOD_GET = 'GET';
    const METHOD_DELETE = 'DELETE';

    protected static function executerCurl($method, $url, $parametres)
    {
        $curl = curl_init($url);
        $optionsCurl = array();
        switch ($method) {
            case static::METHOD_POST:
                $optionsCurl[CURLOPT_POST] = true;
                $optionsCurl[CURLOPT_POSTFIELDS] = $parametres;
                break;
            case static::METHOD_DELETE:
                $optionsCurl[CURLOPT_CUSTOMREQUEST] = static::METHOD_DELETE;
                $optionsCurl[CURLOPT_URL] = $url . '?' . http_build_query($parametres);
                break;
            case static::METHOD_GET:
            default:
                $optionsCurl[CURLOPT_HTTPGET] = 1;
                $optionsCurl[CURLOPT_URL] = $url . '?' . http_build_query($parametres);
                break;
        }
        $header = array();
        if (Configuration::getToken() !== null) {
            $header[] = 'X-BetaSeries-Token: ' . Configuration::getToken();
        }
        $header[] = 'X-BetaSeries-Key: ' . Configuration::getCleAPI();
        $header[] = 'Accept: application/json';
        $header[] = 'X-BetaSeries-Version: 2.2';
        $optionsCurl[CURLOPT_HTTPHEADER] = $header;
        $optionsCurl[CURLOPT_RETURNTRANSFER] = true;
        $optionsCurl[CURLOPT_SSL_VERIFYHOST] = false; //Problème de vérification de certificat sous Windows
        $optionsCurl[CURLOPT_SSL_VERIFYPEER] = false;
        $optionsCurl[CURLOPT_FRESH_CONNECT] = true;
        curl_setopt_array($curl, $optionsCurl);
        $retour = curl_exec($curl);
        $infos = curl_getinfo($curl);
        $erreurs = curl_errno($curl);
        curl_close($curl);
        if (!$erreurs) {
            if (($infos['http_code'] == 200 || $infos['http_code'] == 400) && $infos['content_type'] == 'application/json') {
                $retour = json_decode($retour, true);
                if (!empty($retour['errors'])) {
                    throw new Erreur($retour['errors'][0]['text'], $retour['errors'][0]['code']);
                } else {
                    unset($retour['errors']);
                    if (count($retour) === 1) {
                        $retour = array_values($retour)[0];
                    }
                }
            } else {
                var_dump($retour, $infos, $erreurs);
                throw new Erreur(Erreur::TEXT_ERREUR_PASDEREPONSE, Erreur::CODE_ERREUR_PASDEREPONSE);
            }
        } else {
            throw new Erreur(Erreur::TEXT_ERREUR_PASDEREPONSE, Erreur::CODE_ERREUR_PASDEREPONSE);
        }
        return $retour;
    }

    protected static function executer($method, $parametres)
    {
        $function = static::traiterNomFunction($method);
        $class = get_called_class();
        $namespace = __NAMESPACE__ . '\\';
        if (stripos($class, $namespace) !== false) {
            $class = substr($class, strlen($namespace));
        }
        $url = strtolower('http' . (Configuration::getRequetesHttps() ? 's' : '') . '://' . Configuration::FQDN . '/' . $class . '/' . $function['action']);
        return static::executerCurl($function['method'], $url, $parametres);
    }

    protected static function traiterNomFunction($method)
    {
        $retour = array('action' => '', 'method' => '');
        if (stripos($method, static::METHOD_POST) !== false) {
            $retour['method'] = static::METHOD_POST;
            $retour['action'] = substr($method, stripos($method, static::METHOD_POST) + 4);
        } elseif (stripos($method, static::METHOD_GET) !== false) {
            $retour['method'] = static::METHOD_GET;
            $retour['action'] = substr($method, stripos($method, static::METHOD_GET) + 3);
        } elseif (stripos($method, static::METHOD_DELETE) !== false) {
            $retour['method'] = static::METHOD_DELETE;
            $retour['action'] = substr($method, stripos($method, static::METHOD_DELETE) + 6);
        } else {
            throw new Erreur(Erreur::TEXT_ERREUR_PASDACTION, Erreur::CODE_ERREUR_PASDACTION);
        }
        return $retour;
    }
}
