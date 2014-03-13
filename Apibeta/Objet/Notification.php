<?php

namespace Apibeta\Objet;

use Apibeta\Requete\Members;

/**
 * Représente une Notification
 * @author TetzPHP
 */
class Notification extends Generique
{

    protected $id;
    protected $type;
    protected $text;
    protected $html;
    protected $date;
    protected $date_read;

    public function getId()
    {
        return $this->id;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getHtml()
    {
        return $this->html;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getDate_read()
    {
        return $this->date_read;
    }

    protected function setId($id)
    {
        $this->id = $id;
    }

    protected function setType($type)
    {
        $this->type = $type;
    }

    protected function setText($text)
    {
        $this->text = $text;
    }

    protected function setHtml($html)
    {
        $this->html = $html;
    }

    protected function setDate($date)
    {
        $this->date = $date;
    }

    protected function setDate_read($date_read)
    {
        $this->date_read = $date_read;
    }

    /**
     * Marque comme lu la notification sélectionné
     * @important Il est recommandé de marqué comme lu au moment de récupérer les notifications {Members::getNotifications} cela limite les requêtes.
     * @return Notification
     */
    public function marquerCommeLu()
    {
        return Members::getNotifications($this->id - 1, 1, null, null, true);
    }
}
