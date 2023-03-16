<?php

use Diamancia\App\entities\Cart;

require 'vendor/autoload.php'; //autoload par composer (init)

use Diamancia\App\controller\AppController;
use Diamancia\App\controller\UserController;
use Diamancia\App\controller\JewelController;
use Diamancia\App\controller\CartController;

// if (!isset($_SESSION['cart'])) {
//     $_SESSION['cart'] = [];
// }

session_start();

// voir avec mr bonneau sans spl autoload normalement avec composer? et partie 

if (!isset($_SESSION['role'])) {
    $_SESSION['role'] = 'ROLE_VISITEUR';
}

$entite = filter_input(INPUT_GET, 'entite', FILTER_SANITIZE_SPECIAL_CHARS);
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);

try {
    // test sur quelle entite on veut travailler
    switch ($entite) {
        case 'user':
            // include 'app/controller/UserController.php';
            // appel du sous contrôleur de l'entite user
            $controller = new UserController();
            $controller->execute($action);
            break;
            // case 'about':
            //     //include 'app/controller/AppController.php';
            //     $controller = new AppController();
            //     $controller->execute('about');
            //     break;
        case 'jewels':
            // appel du sous controleur de l'entite article
            // include 'app/controller/JewelController.php';
            $controller = new JewelController();
            $controller->execute($action);
            break;

        case 'cart':
            // appel du sous controleur de l'entite panier
            // include 'controller/CartControleur.php';
            $ctrl = new CartController();
            $ctrl->execute($action);
            break;
        default:
            // include 'app/controller/AppController.php';
            $controller = new AppController();
            $controller->execute('home');
            break;
    }
} catch (Exception $except) {
    include 'app/controller/AppController.php';
    $controller = new AppController();
    $controller->execute('error');
}
