<?php

namespace Apibeta\Objet;

/**
 * Représente une série
 * @author TetzPHP
 */
class Serie extends Generique
{

    protected $id;
    protected $thetvdb_id;
    protected $imdb_id;
    protected $title;
    protected $description;
    protected $seasons;
    protected $episodes;
    protected $followers;
    protected $comments;
    protected $similars;
    protected $characters;
    protected $creation;
    protected $genres;
    protected $length;
    protected $network;
    protected $rating;
    protected $status;
    protected $language;
    protected $notes;
    protected $in_account;
    protected $user;
    protected $resource_url;
    protected $unseen;

    /**
     * 
     * @return Episode[]
     */
    public function getUnseen()
    {
        return $this->unseen;
    }

    protected function setUnseen($unseen)
    {
        $this->unseen = Episode::tableau($unseen);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getThetvdb_id()
    {
        return $this->thetvdb_id;
    }

    public function getImdb_id()
    {
        return $this->imdb_id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getSeasons()
    {
        return $this->seasons;
    }

    public function getEpisodes()
    {
        return $this->episodes;
    }

    public function getFollowers()
    {
        return $this->followers;
    }

    public function getComments()
    {
        return $this->comments;
    }

    public function getSimilars()
    {
        return $this->similars;
    }

    public function getCharacters()
    {
        return $this->characters;
    }

    public function getCreation()
    {
        return $this->creation;
    }

    public function getGenres()
    {
        return $this->genres;
    }

    public function getLength()
    {
        return $this->length;
    }

    public function getNetwork()
    {
        return $this->network;
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @return Note
     */
    public function getNotes()
    {
        return $this->notes;
    }

    public function getIn_account()
    {
        return $this->in_account;
    }

    public function getUser()
    {
        if ($this->in_account) {
            return $this->user;
        } else {
            return false;
        }
    }

    public function getResource_url()
    {
        return $this->resource_url;
    }

    protected function setId($id)
    {
        $this->id = $id;
    }

    protected function setThetvdb_id($thetvdb_id)
    {
        $this->thetvdb_id = $thetvdb_id;
    }

    protected function setImdb_id($imdb_id)
    {
        $this->imdb_id = $imdb_id;
    }

    protected function setTitle($title)
    {
        $this->title = $title;
    }

    protected function setDescription($description)
    {
        $this->description = $description;
    }

    protected function setSeasons($seasons)
    {
        $this->seasons = $seasons;
    }

    protected function setEpisodes($episodes)
    {
        $this->episodes = $episodes;
    }

    protected function setFollowers($followers)
    {
        $this->followers = $followers;
    }

    protected function setComments($comments)
    {
        $this->comments = $comments;
    }

    protected function setSimilars($similars)
    {
        $this->similars = $similars;
    }

    protected function setCharacters($characters)
    {
        $this->characters = $characters;
    }

    protected function setCreation($creation)
    {
        $this->creation = $creation;
    }

    protected function setGenres($genres)
    {
        $this->genres = $genres;
    }

    protected function setLength($length)
    {
        $this->length = $length;
    }

    protected function setNetwork($network)
    {
        $this->network = $network;
    }

    protected function setRating($rating)
    {
        $this->rating = $rating;
    }

    protected function setStatus($status)
    {
        $this->status = $status;
    }

    protected function setLanguage($language)
    {
        $this->language = $language;
    }

    protected function setNotes($notes)
    {
        $this->notes = new Note($notes);
    }

    protected function setIn_account($in_account)
    {
        $this->in_account = $in_account;
    }

    protected function setUser($user)
    {
        $this->user = $user;
    }

    protected function setResource_url($resource_url)
    {
        $this->resource_url = $resource_url;
    }
}
