<?php

namespace Diamancia\App\controller;

use Diamancia\App\entities\Cart;
use Diamancia\App\dao\Dao;

class CartController extends Controller
{

        // exemple cave a vin
        //    public function add(){

        //         $cart = unserialize($_SESSION['cart']);

        //         $idVin = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        //         // vérifier que $idVin est bien un int et un booleen false


        //         if (array_key_exists($idVin, $cart)){
        //             // incrémenter la quantite
        //             $itemCart = $cart[$idVin][1]++;
        //         } else {
        //             // mettre vin dans le panier
        //             // récupérer le vin
        //             $dao = new Dao();
        //             $wine = $dao->getWineById($idVin);
        //             $cart[$idVin] = [$wine, 1];
        //         }
        //         $_SESSION['cart'] = serialize($cart);
        //         header('Location: index.php?entite=wine&action=list');
        //         exit();
        //     }

        public function add()
        {

                $cart = new Cart();

                $idJewel = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

                $dao = new Dao();
                $jewel = $dao->getJewelById($idJewel);

                $cart->add($jewel);

                header('Location: index.php?entite=cart&action=showcart');
                exit();
        }

        public function remove()
        {

                $cart = new Cart();

                $idVin = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

                $dao = new Dao();
                $wine = $dao->getJewelById($idVin);

                $cart->remove($wine);

                header('Location: index.php?entite=cart&action=showcart');
                exit();
        }

        public function showcart()
        {

                $cart = new Cart();

                $itemCarts = $cart->getItemCart();
                $prixHT = $cart->prixTotal();

                $view = 'cart/showCart';
                $paramView = ['itemCarts' => $itemCarts, 'prixHt' => $prixHT, 'css' => 'showCart'];
                $this->createView($view, $paramView);
        }
}
