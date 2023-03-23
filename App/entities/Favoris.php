<?php

namespace Diamancia\App\entities;

class Favoris
{
    private $favs;

    public function __construct()
    {

        if (!isset($_SESSION['favoris'])) {
            // [
            //    '1' => [article1, qtt],
            //    '2' => [article2, qqt]
            // ]
            $_SESSION['favoris'] = serialize([]);
        }
        $this->favs = unserialize($_SESSION['favoris']);
        //print_r($this->favs);
    }

    // Faire retourner les articles sur la page qu'on affiche en cliquant sur le coeur

    public function getItemFavs()
    {

        return $this->favs;
    }



    public function add(Jewel $jewel)
    {
        if (array_key_exists($jewel->getId(), $this->favs)) {
            // si le bijou est déjà  dans les favs, ne rien faire
            if (in_array($jewel, $this->favs[$jewel->getId()])) {
                return;
            }
            // sinon, ajouter le bijou dans le tableau existant :/ Cas ou l'id existerait mais pas encore de bijou ou toutes les données à l'intérieur
            $this->favs[$jewel->getId()][] = $jewel;
        } else {
            // si l'identifiant n'existe pas dans le tableau, ajouter un tableau de bijou
            $this->favs[$jewel->getId()] = [$jewel];
        }
        $_SESSION['favoris'] = serialize($this->favs);
    }
    // Supprimer

    public function delete(Jewel $jewel)
    {
        unset($this->favs[$jewel->getId()]);
        $_SESSION['favoris'] = serialize($this->favs);
    }

    public function deleteFav(Jewel $jewel)
    {
        $this->favs[$jewel->getId()];
        if ($this->favs[$jewel->getId()]) {
            $this->delete($jewel);
        }
        $_SESSION['favoris'] = serialize($this->favs);
    }

    public function clear()
    {
    }
}
