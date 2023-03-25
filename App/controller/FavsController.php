<?php

namespace Diamancia\App\controller;

use Diamancia\App\entities\Favoris;
use Diamancia\App\dao\Dao;
use Diamancia\App\entities\Cart;

class FavsController extends Controller
{
    

    public function showfavs()
    {

        $favs = new Favoris();

        $jewels = $favs -> getItemFavs();

        $view = 'favs/showFavs';
        $paramView = ['jewels' => $jewels,  'css' => 'showCart'];
        $this->createView($view, $paramView);
    }

    public function remove()
    {
        $favs = new Favoris();

        $idJewel = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        $dao = new Dao();
        $jewel = $dao->getJewelById($idJewel);

        if (is_object($jewel)) {
            $favs->removeFavorite($jewel);
        }

        header('Location: index.php?entite=favoris&action=showfavs');
        exit();
    }
}
