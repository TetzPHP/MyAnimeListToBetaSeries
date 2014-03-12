<?php

namespace Apibeta;

/**
 * Class regroupant les paramètres utilisé pour se connecter à l'API.
 * @author TetzPHP
 */
abstract class Configuration
{

    const FQDN = 'api.betaseries.com';

    protected static $requetesHttps = true;
    protected static $cleAPI = '';
    protected static $cleSecrete = '';
    protected static $token = null;
    protected static $userAgent = 'ApiBetaPhp5';

    public static function getRequetesHttps()
    {
        return static::$requetesHttps;
    }

    public static function getCleAPI()
    {
        return static::$cleAPI;
    }

    public static function getCleSecrete()
    {
        return static::$cleSecrete;
    }

    public static function getToken()
    {
        return static::$token;
    }

    public static function getUserAgent()
    {
        return static::$userAgent;
    }

    public static function setUserAgent(string $userAgent)
    {
        static::$userAgent = $userAgent;
    }

    public static function setRequetesHttps($requetesHttps = true)
    {
        if (is_bool($requetesHttps)) {
            static::$requetesHttps = $requetesHttps;
        }
    }

    public static function setCleAPI($cleAPI)
    {
        static::$cleAPI = $cleAPI;
    }

    public static function setCleSecrete($cleSecrete)
    {
        static::$cleSecrete = $cleSecrete;
    }

    public static function setToken($token)
    {
        static::$token = $token;
    }
}
