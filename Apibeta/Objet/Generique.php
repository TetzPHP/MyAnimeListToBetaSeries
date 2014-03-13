<?php

namespace Apibeta\Objet;

/**
 * Partie commune à tous les class "Objet"
 * @author TetzPHP
 */
abstract class Generique
{

    public function __construct($entree)
    {
        $this->hydratation($entree);
    }

    private function hydratation(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * Retourne un tableau d'objet la classe appelé
     * @param array $tableau
     * @param array $tableauAMerger
     * @return static[]
     */
    public static function tableau($tableau, $tableauAMerger = null)
    {
        $retour = array();
        $objet = get_called_class();
        foreach ($tableau as $donnes) {
            if ($tableauAMerger !== null) {
                $donnes = array_merge($donnes, $tableauAMerger);
            }
            $retour[] = new $objet($donnes);
        }
        return $retour;
    }
}
