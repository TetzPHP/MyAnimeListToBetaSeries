<?php

namespace Apibeta\Objet;

/**
 * Représente un Ami
 * @author TetzPHP
 */
class Ami extends Generique
{

    protected $id;
    protected $login;
    protected $xp;
    protected $cached;
    protected $avatar;
    protected $in_account;
    protected $stats;

    public function getId()
    {
        return $this->id;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getXp()
    {
        return $this->xp;
    }

    public function getCached()
    {
        return $this->cached;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function getIn_account()
    {
        return $this->in_account;
    }

    public function getStats()
    {
        return $this->stats;
    }

    protected function setId($id)
    {
        $this->id = $id;
    }

    protected function setLogin($login)
    {
        $this->login = $login;
    }

    protected function setXp($xp)
    {
        $this->xp = $xp;
    }

    protected function setCached($cached)
    {
        $this->cached = $cached;
    }

    protected function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

    protected function setIn_account($in_account)
    {
        $this->in_account = $in_account;
    }

    protected function setStats($stats)
    {
        $this->stats = $stats;
    }
}
