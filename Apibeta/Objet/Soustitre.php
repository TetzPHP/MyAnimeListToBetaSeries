<?php

namespace Apibeta\Objet;

/**
 * Représente un sous-titre
 * @author TetzPHP
 */
class Soustitre extends Generique
{

    protected $id;
    protected $language;
    protected $source;
    protected $quality;
    protected $file;
    protected $url;
    protected $episode;
    protected $date;

    public function getId()
    {
        return $this->id;
    }

    public function getLanguage()
    {
        return $this->language;
    }

    public function getSource()
    {
        return $this->source;
    }

    public function getQuality()
    {
        return $this->quality;
    }

    public function getFile()
    {
        return $this->file;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getEpisode()
    {
        return $this->episode;
    }

    public function getDate()
    {
        return $this->date;
    }

    protected function setId($id)
    {
        $this->id = $id;
    }

    protected function setLanguage($language)
    {
        $this->language = $language;
    }

    protected function setSource($source)
    {
        $this->source = $source;
    }

    protected function setQuality($quality)
    {
        $this->quality = $quality;
    }

    protected function setFile($file)
    {
        $this->file = $file;
    }

    protected function setUrl($url)
    {
        $this->url = $url;
    }

    protected function setEpisode($episode)
    {
        $this->episode = $episode;
    }

    protected function setDate($date)
    {
        $this->date = $date;
    }
}
