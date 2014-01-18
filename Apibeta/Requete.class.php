<?php

namespace Apibeta;

/**
 * Class intérrogeant l'api de BetaSeries
 * @author TetzPHP
 */
abstract class Requete extends Configuration {

    const METHOD_POST = 'POST';
    const METHOD_GET = 'GET';
    const METHOD_DELETE = 'DELETE';

    protected static function executerCurl($method, $url, $parametres) {
        $curl = curl_init($url);
        $optionsCurl = array();
        switch ($method) {
            case static::METHOD_POST:
                $optionsCurl[CURLOPT_POST] = true;
                $optionsCurl[CURLOPT_POSTFIELDS] = $parametres;
                break;
            case static::METHOD_DELETE:
                $optionsCurl[CURLOPT_CUSTOMREQUEST] = 'DELETE';
                $optionsCurl[CURLOPT_POSTFIELDS] = $parametres;
                break;
            case static::METHOD_GET:
            default :
                $optionsCurl[CURLOPT_POSTFIELDS] = $parametres;
                $optionsCurl[CURLOPT_HTTPGET] = 1;
                break;
        }
        $header = array();
        if (static::getToken() !== null) {
            $header[] = 'X-BetaSeries-Token: ' . static::getToken();
        }
        $header[] = 'X-BetaSeries-Key: ' . static::getCleAPI();
        $header[] = 'Accept: application/json';
        $header[] = 'X-BetaSeries-Version: 2.2';
        $optionsCurl[CURLOPT_HTTPHEADER] = $header;
        $optionsCurl[CURLOPT_RETURNTRANSFER] = true;
        $optionsCurl[CURLOPT_SSL_VERIFYHOST] = false; //Problème de vérification de certificat sous Windows
        $optionsCurl[CURLOPT_SSL_VERIFYPEER] = false;
        curl_setopt_array($curl, $optionsCurl);
        $retour = curl_exec($curl);
        $infos = curl_getinfo($curl);
        $erreurs = curl_errno($curl);
        curl_close($curl);
        if(!$erreurs){
            if($infos['http_code'] == 200 && $infos['content_type'] == 'application/json'){
                $retour = json_decode($retour, true);
                if(!empty($retour['errors'])){
                    throw new Erreur($retour['text'],$retour['code']);
                }
            }
        }else{
            throw new Erreur(Erreur::TEXT_ERREUR_PASDEREPONSE, Erreur::CODE_ERREUR_PASDEREPONSE);
        }
        return $retour;
    }

    public static function executer($method, $parametres) {
        $function = static::traiterNomFunction($method);
        $class = get_called_class();
        if(stripos($class, 'Apibeta\\') !== false){
            $class = substr($class, 8);
        }
        $url = strtolower('http' . (static::getRequetesHttps() ? 's' : '') . '://api.betaseries.com/' . $class . '/' . $function['action']);
        return static::executerCurl($function['method'], $url, $parametres);
    }

    protected static function traiterNomFunction($method) {
        $retour = array('action' => '','method' => '');
        if (stripos($method, 'post') !== false) {
            $retour['method'] = static::METHOD_POST;
            $retour['action'] = substr($method, stripos($method, 'post')+4);
        } elseif (stripos($method, 'get') !== false) {
            $retour['method'] = static::METHOD_GET;
            $retour['action'] = substr($method, stripos($method, 'get')+3);
        } elseif (stripos($method, 'delete') !== false) {
            $retour['method'] = static::METHOD_DELETE;
            $retour['action'] = substr($method, stripos($method, 'delete')+6);
        }else{
            throw new Exception('Impossible de résoudre le nom de l\'action');
        }
        return $retour;
    }

}
