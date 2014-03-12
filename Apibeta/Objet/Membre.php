<?php

namespace Apibeta\Objet;

/**
 * Représente un Membre
 * @author TetzPHP
 */
class Membre extends Generique
{

    /** Tout le monde peut m'ajouter comme ami */
    const FRIEND_OPEN = 'open';

    /** Je dois approuver chaque demande d'amitié */
    const FRIEND_REQUESTS = 'requests';

    /** Seuls mes amis peuvent par la suite m'ajouter */
    const FRIEND_FRIENDS = 'friends';

    /** Personne ne peut m'ajouter comme ami */
    const FRIEND_NOBODY = 'nobody';

    protected $id;
    protected $login;
    protected $xp;
    protected $cached;
    protected $avatar;
    protected $in_account;
    protected $stats;
    protected $shows;
    protected $movies;
    protected $options;
    private $downloaded;
    private $notation;
    private $timelag;
    private $global;
    private $friendship;

    /**
     * 
     * @return bool
     */
    public function getDownloaded()
    {
        return $this->downloaded;
    }

    /**
     * Me demander une note aux épisodes que je viens de voir
     * @return bool
     */
    public function getNotation()
    {
        return $this->notation;
    }

    /**
     * Décaler les dates d'une journée pour correspondre à la sortie française
     * @return bool
     */
    public function getTimelag()
    {
        return $this->timelag;
    }

    /**
     * Afficher le numéro global à côté du titre des épisodes (utile pour les mangas)
     * @return bool
     */
    public function getGlobal()
    {
        return $this->global;
    }

    /**
     * Manière dont vous voulez gérer vos amitiés sur BetaSerie | voir const FRIEND_*
     * @return string
     */
    public function getFriendship()
    {
        return $this->friendship;
    }

    private function setDownloaded($downloaded)
    {
        $this->downloaded = $downloaded;
    }

    private function setNotation($notation)
    {
        $this->notation = $notation;
    }

    private function setTimelag($timelag)
    {
        $this->timelag = $timelag;
    }

    private function setGlobal($global)
    {
        $this->global = $global;
    }

    private function setFriendship($friendship)
    {
        $this->friendship = $friendship;
    }

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

    /**
     * 
     * @return Serie[]
     */
    public function getShows()
    {
        return $this->shows;
    }

    /**
     * 
     * @return Film[]
     */
    public function getMovies()
    {
        return $this->movies;
    }

    /**
     * Retourne le tableau des options de l'utilisateur | Voir les propriétés privées de cette classe
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
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

    protected function setShows($shows)
    {
        $this->shows = Serie::tableau($shows);
    }

    protected function setMovies($movies)
    {
        $this->movies = Film::tableau($movies);
    }

    protected function setOptions($options)
    {
        $this->options = $options;
        foreach ($options as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
}
