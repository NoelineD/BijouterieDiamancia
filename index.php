<?php

use Diamancia\App\entities\Cart;

require 'vendor/autoload.php'; //autoload par composer (init)

use Diamancia\App\controller\AppController;
use Diamancia\App\controller\UserController;
use Diamancia\App\controller\JewelController;
use Diamancia\App\controller\CartController;
use Diamancia\App\controller\FavsController;

// if (!isset($_SESSION['cart'])) {
//     $_SESSION['cart'] = [];
// }



// Générer un token aléatoire
// $token = bin2hex(random_bytes(32));

session_start();

// ON CREE LE HEADER

require_once 'config.php';
require_once 'JWT.php';
$header = [
    'typ' => 'JWT',
    'alg' => 'HS256'
    // HACHAGE PAR DEFAUT HS256
];

// on crée le contenu (payload)
$payload = [
    'user_id' => 123,
    'roles' =>[
        'ROLE_ADMIN',
        'ROLE_USER'
    ],
    'email' => 'contact@demo.fr'
    ];

$jwt = new JWT();

//60 nombre de seconde de validité du token à la fin
$token = $jwt ->generate ($header, $payload, SECRET,60);

// echo $token;

// Stocker le token dans la variable de session
// $_SESSION['token'] = $token;

// // Vérifier si le token est valide lors de la soumission du formulaire
// if (isset($_POST['submit'])) {
//     if (!empty($_POST['token']) && hash_equals($_SESSION['token'], $_POST['token'])) {
//         // Le token est valide, traiter la soumission du formulaire
//     } else {
//         // Le token est invalide, afficher un message d'erreur ou rediriger vers une page d'erreur
//     }
// }


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
        case 'favoris':
            // appel du sous controleur de l'entite panier
            // include 'controller/CartControleur.php';
            $ctrl = new FavsController();
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
