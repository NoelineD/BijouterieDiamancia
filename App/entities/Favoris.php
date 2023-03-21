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


    // Ajouter panier

    public function add(Jewel $jewel)
    {

        if (array_key_exists($jewel->getId(), $this->favs)) {
            $this->favs[$jewel->getId()][1]++;
        } else {
            // mettre jewel dans le panier
            $this->favs[$jewel->getId()] = [$jewel, 1];
        }
        $_SESSION['cart'] = serialize($this->favs);
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
        $_SESSION['cart'] = serialize($this->favs);
    }

    public function clear()
    {
    }
}
