<?php

namespace Diamancia\App\controller;

use Diamancia\App\entities\Cart;
use Diamancia\App\dao\Dao;

class CartController extends Controller
{

        // ajouter une 1 quantité à l'article
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

        // supprimer une 1 quantité à l'article
        public function remove()
        {

                $cart = new Cart();

                $idJewel = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

                $dao = new Dao();
                $jewel = $dao->getJewelById($idJewel);

                $cart->remove($jewel);

                header('Location: index.php?entite=cart&action=showcart');
                exit();
        }

        public function showcart()
        {

                $cart = new Cart();

                $itemCarts = $cart->getItemCart();
                $prixHT = $cart->prixTotal();



                //  if (empty($itemCarts)) {
                //         $errorMessage = "Le panier est vide. Veuillez ajouter des articles avant de passer votre commande.";
                //         $view = 'cart/emptyCart';
                //         $paramView = ['errorMessage' => $errorMessage, 'css' => 'emptyCart'];
                // } else {
                //         $view = 'cart/showCart';
                //         $paramView = ['itemCarts' => $itemCarts, 'prixHt' => $prixHT, 'css' => 'showCart'];
                // }

                // var_dump($prixHT);
                // var_dump($itemCarts);
                $view = 'cart/showCart';
                $paramView = ['itemCarts' => $itemCarts, 'prixHt' => $prixHT, 'css' => 'showCart'];
                $this->createView($view, $paramView);
        }

        public function emptycart()
        {
                // var_dump($_GET['action']);

                $errorMessage = 'Le panier est vide. Veuillez ajouter des articles avant de passer votre commande.';
                // $itemCarts = [];  // test pour passer la valeur de itemcarts dans emptycarts
                // var_dump($itemCarts);
                // var_dump($errorMessage);
                $view = 'cart/emptyCart';
                // $paramView = ['css' => 'showCart', 'errorMessage' => $errorMessage, 'itemCarts' => $itemCarts];
                $paramView = ['css' => 'showCart', 'errorMessage' => $errorMessage];
                $this->createView($view, $paramView);
                // var_dump($prixHT);
        }
}
