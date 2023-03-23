<?php

namespace Diamancia\App\controller;

use Diamancia\App\entities\Favoris;
use Diamancia\App\dao\Dao;
use Diamancia\App\entities\Cart;

class FavsController extends Controller
{


    public function delete()
    {

        $favs = new favoris();

        $idJewel = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        $dao = new Dao();
        $jewel = $dao->getJewelById($idJewel);

        $favs->deletefav($jewel);

        header('Location: index.php?entite=Favoris&action=showfavs');
        exit();
    }

    public function showfavs()
    {

        $favs = new Favoris();

        $jewels = $favs -> getItemFavs();

        $view = 'favs/showFavs';
        $paramView = ['jewels' => $jewels,  'css' => 'showCart'];
        $this->createView($view, $paramView);
    }
}
