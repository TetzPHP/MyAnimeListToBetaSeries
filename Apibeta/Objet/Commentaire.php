<?php

namespace Apibeta\Objet;

/**
 * Représente un commentaire
 * @author TetzPHP
 */
class Commentaire extends Generique
{

    //Attribut retourné par BetaSeries
    protected $id;
    protected $user_id;
    protected $login;
    protected $avatar;
    protected $date;
    protected $text;
    protected $inner_id;
    protected $in_reply_to;
    //Attribut déduit
    private $depuis_type;

    /**
     * Répondre à ce commentaire
     * @param string $texte
     * @return null|Commentaire
     */
    public function repondre($texte)
    {
        if ($this->getDepuis_type() !== null) {
            return null;
        } else {
            return Comments::postComment($this->getDepuis_type(), $this->getInner_id(), $texte, $this->getId());
        }
    }

    public function recupererCommentaireParent()
    {
        if ($this->getDepuis_type() !== null) {
            return null;
        } else {
            return Comments::getComments($this->getDepuis_type(), $this->getInner_id(), 1, $this->getIn_reply_to() - 1)[0];
        }
    }

    /**
     * Supprimer le commentaire actuel
     * @return Commentaire
     */
    public function supprimer()
    {
        return Comments::deleteComment($this->id);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUser_id()
    {
        return $this->user_id;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getInner_id()
    {
        return $this->inner_id;
    }

    public function getIn_reply_to()
    {
        return $this->in_reply_to;
    }

    public function getDepuis_type()
    {
        return $this->depuis_type;
    }

    protected function setId($id)
    {
        $this->id = $id;
    }

    protected function setUser_id($user_id)
    {
        $this->user_id = $user_id;
    }

    protected function setLogin($login)
    {
        $this->login = $login;
    }

    protected function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

    protected function setDate($date)
    {
        $this->date = $date;
    }

    protected function setText($text)
    {
        $this->text = $text;
    }

    protected function setInner_id($inner_id)
    {
        $this->inner_id = $inner_id;
    }

    protected function setIn_reply_to($in_reply_to)
    {
        $this->in_reply_to = $in_reply_to;
    }

    protected function setDepuis_type($depuis_type)
    {
        $this->depuis_type = $depuis_type;
    }
}
