<?php

namespace Apibeta\Objet;

/**
 * Représente un épisode
 * @author TetzPHP
 */
class Episode extends Generique
{

    protected $id;
    protected $thetvdb_id;
    protected $title;
    protected $season;
    protected $episode;
    protected $show;
    protected $code;
    protected $global;
    protected $description;
    protected $date;
    protected $note;
    protected $user;
    protected $comments;
    protected $subtitles;

    public function getId()
    {
        return $this->id;
    }

    public function getThetvdb_id()
    {
        return $this->thetvdb_id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getSeason()
    {
        return $this->season;
    }

    public function getEpisode()
    {
        return $this->episode;
    }

    public function getShow()
    {
        return $this->show;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getGlobal()
    {
        return $this->global;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getDate()
    {
        return $this->date;
    }

    /**
     * 
     * @return Note
     */
    public function getNote()
    {
        return $this->note;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getComments()
    {
        return $this->comments;
    }

    public function getSubtitles()
    {
        return $this->subtitles;
    }

    protected function setId($id)
    {
        $this->id = $id;
    }

    protected function setThetvdb_id($thetvdb_id)
    {
        $this->thetvdb_id = $thetvdb_id;
    }

    protected function setTitle($title)
    {
        $this->title = $title;
    }

    protected function setSeason($season)
    {
        $this->season = $season;
    }

    protected function setEpisode($episode)
    {
        $this->episode = $episode;
    }

    protected function setShow($show)
    {
        $this->show = $show;
    }

    protected function setCode($code)
    {
        $this->code = $code;
    }

    protected function setGlobal($global)
    {
        $this->global = $global;
    }

    protected function setDescription($description)
    {
        $this->description = $description;
    }

    protected function setDate($date)
    {
        $this->date = $date;
    }

    protected function setNote($note)
    {
        $this->note = new Note($note);
    }

    protected function setUser($user)
    {
        $this->user = $user;
    }

    protected function setComments($comments)
    {
        $this->comments = $comments;
    }

    protected function setSubtitles($subtitles)
    {
        $this->subtitles = $subtitles;
    }
}
