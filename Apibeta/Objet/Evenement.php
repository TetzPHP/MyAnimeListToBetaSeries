<?php

namespace Apibeta\Objet;

/**
 * Représente un Evenement
 * @author TetzPHP
 */
class Evenement extends Generique
{

    protected $id;
    protected $type;
    protected $ref;
    protected $ref_id;
    protected $user;
    protected $user_id;
    protected $html;
    protected $date;

    public function getType()
    {
        return $this->type;
    }

    protected function setType($type)
    {
        $this->type = $type;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getRef()
    {
        return $this->ref;
    }

    public function getRef_id()
    {
        return $this->ref_id;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getUser_id()
    {
        return $this->user_id;
    }

    public function getHtml()
    {
        return $this->html;
    }

    public function getDate()
    {
        return $this->date;
    }

    protected function setId($id)
    {
        $this->id = $id;
    }

    protected function setRef($ref)
    {
        $this->ref = $ref;
    }

    protected function setRef_id($ref_id)
    {
        $this->ref_id = $ref_id;
    }

    protected function setUser($user)
    {
        $this->user = $user;
    }

    protected function setUser_id($user_id)
    {
        $this->user_id = $user_id;
    }

    protected function setHtml($html)
    {
        $this->html = $html;
    }

    protected function setDate($date)
    {
        $this->date = $date;
    }
}
