<?php

namespace Diamancia\App\controller;

use Diamancia\App\entities\Favs;
use Diamancia\App\dao\Dao;

class FavsController extends Controller
{

    public function add()
    {

        $cart = new Favs();

        $idJewel = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        $dao = new Dao();
        $jewel = $dao->getJewelById($idJewel);

        $cart->add($jewel);

        header('Location: index.php?entite=Favs&action=show');
        exit();
    }

    // public function remove()
    // {

    //     $cart = new Cart();

    //     $idVin = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    //     $dao = new Dao();
    //     $wine = $dao->getJewelById($idVin);

    //     $cart->remove($wine);

    //     header('Location: index.php?entite=cart&action=show');
    //     exit();
    // }

    public function showfavs()
    {

        $favs = new Favs();

        $itemfavs = $favs>getItemFavs();
        $prixHT = $favs->prixTotal();

        $view = 'favs/showFavs';
        $paramView = ['itemFavs' => $itemfavs, 'prixHt' => $prixHT, 'css' => 'showCart'];
        $this->createView($view, $paramView);
    }
}
