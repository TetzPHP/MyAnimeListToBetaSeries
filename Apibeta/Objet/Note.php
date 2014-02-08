<?php

namespace Apibeta\Objet;

/**
 * Représente une Note
 * @author TetzPHP
 */
class Note extends Generique
{

    protected $total;
    protected $mean;
    protected $user;

    /**
     * Nombre de Votant
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Note Moyenne
     * @return int
     */
    public function getMean()
    {
        return $this->mean;
    }

    /**
     * Note de l'utilisateur connecté (0=pas de vote)
     * @return int
     */
    public function getUser()
    {
        return $this->user;
    }

    protected function setTotal($total)
    {
        $this->total = $total;
    }

    protected function setMean($mean)
    {
        $this->mean = $mean;
    }

    protected function setUser($user)
    {
        $this->user = $user;
    }
}
