<?php

namespace Apibeta\Objet;

/**
 * Représente un Film
 * @author TetzPHP
 */
class Film extends Generique
{

    protected $id;
    protected $title;
    protected $original_title;
    protected $themoviedb_id;
    protected $imdb_id;
    protected $url;
    protected $production_year;
    protected $release_date;
    protected $sale_date;
    protected $director;
    protected $length;
    protected $genres;
    protected $synopsis;
    protected $language;
    protected $notes;
    protected $user;

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getOriginal_title()
    {
        return $this->original_title;
    }

    public function getThemoviedb_id()
    {
        return $this->themoviedb_id;
    }

    public function getImdb_id()
    {
        return $this->imdb_id;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getProduction_year()
    {
        return $this->production_year;
    }

    public function getRelease_date()
    {
        return $this->release_date;
    }

    public function getSale_date()
    {
        return $this->sale_date;
    }

    public function getDirector()
    {
        return $this->director;
    }

    public function getLength()
    {
        return $this->length;
    }

    public function getGenres()
    {
        return $this->genres;
    }

    public function getSynopsis()
    {
        return $this->synopsis;
    }

    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @return Note()
     */
    public function getNotes()
    {
        return $this->notes;
    }

    public function getUser()
    {
        return $this->user;
    }

    protected function setId($id)
    {
        $this->id = $id;
    }

    protected function setTitle($title)
    {
        $this->title = $title;
    }

    protected function setOriginal_title($original_title)
    {
        $this->original_title = $original_title;
    }

    protected function setThemoviedb_id($themoviedb_id)
    {
        $this->themoviedb_id = $themoviedb_id;
    }

    protected function setImdb_id($imdb_id)
    {
        $this->imdb_id = $imdb_id;
    }

    protected function setUrl($url)
    {
        $this->url = $url;
    }

    protected function setProduction_year($production_year)
    {
        $this->production_year = $production_year;
    }

    protected function setRelease_date($release_date)
    {
        $this->release_date = $release_date;
    }

    protected function setSale_date($sale_date)
    {
        $this->sale_date = $sale_date;
    }

    protected function setDirector($director)
    {
        $this->director = $director;
    }

    protected function setLength($length)
    {
        $this->length = $length;
    }

    protected function setGenres($genres)
    {
        $this->genres = $genres;
    }

    protected function setSynopsis($synopsis)
    {
        $this->synopsis = $synopsis;
    }

    protected function setLanguage($language)
    {
        $this->language = $language;
    }

    protected function setNotes($notes)
    {
        $this->notes = new Note($notes);
    }

    protected function setUser($user)
    {
        $this->user = $user;
    }
}
