<?php

namespace Diamancia\App\entities;

class Favoris
{
    private $favs;


    public function __construct()
    {

        // si on met dans getItemFavs la serialisation pour que le tableau soit unserialiser si ya session et sinon tableau vide
        $this->favs = $this->getItemFavs();

    // avec la methode si dessous erreur obtenu array sur get title
    //    if (!isset($_SESSION['favoris'])) {
    //     $_SESSION['favoris'] = serialize([]);
    // }
    // $this->favs = unserialize($_SESSION['favoris']);
    }

    // Faire retourner les articles sur la page qu'on affiche en cliquant sur le coeur

    public function getItemFavs()
    {
        $this->favs = isset($_SESSION['favoris']) ? unserialize($_SESSION['favoris']) : [];
        
              return $this->favs;
    }


    // ajoute bijou aux favs si pas déjà présent

    public function add(Jewel $jewel)
    {
        if (in_array($jewel, $this->favs)) {
            // si le bijou est déjà dans les favoris, ne rien faire
            return;
        }
        // sinon, ajouter le bijou dans le tableau
        $this->favs[] = $jewel;
        $_SESSION['favoris'] = serialize($this->favs);

    }
    // Supprimer
    
    public function removeFavorite(Jewel $jewel)
    {
        foreach ($this->favs as $key => $favJewel) {
            if ($favJewel->getId() === $jewel->getId()) {
                unset($this->favs [$key]);
                break;
            }
        }
        $_SESSION['favoris'] = serialize($this->favs);
    }

}
