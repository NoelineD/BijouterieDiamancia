<?php

namespace Diamancia\App\controller;

use Diamancia\App\model\JewelModel;
use Diamancia\App\entities\Cart;
use Diamancia\App\dao\Dao;
use Diamancia\App\entities\Favoris;
use Exception;

// use Diamancia\App\controller\Controller;

// require_once 'app/controller/Controller.php';

class JewelController extends Controller
{
    // action amenant à la page de listJewels

    public function list()
    {

        // include 'app/model/JewelModel.php';
        $model = new JewelModel();
        $tabJewels = [];

         // if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['stone'])) {
        //     $stoneId = intval($_POST['stone']);
        //     // var_dump($_GET['stone']);
        //     $tabJewels = $model->listJewelsByStone($stoneId);
        //     // var_dump($_GET['stone']);
        // } else {
        //     $tabJewels = $model->listJewel();
        // }   First method avec un seul filtre

        // Filtre par pierre
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['stone'])) {
            $stoneId = intval($_POST['stone']);
            $tabJewels = $model->listJewelsByStone($stoneId);
        }

        // Filtre par couleur
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['color'])) {
            $color = $_POST['color'];
            $tabJewels = $model->listJewelsByColor($color);
        }

        // Filtre par métal
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['metal'])
        ) {
            $metalId = intval($_POST['metal']);
            $tabJewels = $model->listJewelsByMetal($metalId);
        }

        // Filtre par prix
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['min_price']) && isset($_POST['max_price'])
        ) {
            $minPrice = intval($_POST['min_price']);
            $maxPrice = intval($_POST['max_price']);
            $tabJewels = $model->listJewelsByPrice($minPrice, $maxPrice);
        }

        if (empty($tabJewels)) {
            $tabJewels = $model->listJewel();
        }
       
        $tabJewelsLimit = $model->listJewelsWithLimit(20);
        // var_dump($tabJewelsLimit); 
        // affiche le contenu de la variable dans le nav
        $cart = new Cart();
        $nbrJewel = $cart->nbrArticle();
        $view = 'jewel/listJewel';
        $paramView = ['css' => 'listJewel', 'jewels' => $tabJewels, 'jewelslimit' => $tabJewelsLimit];
        // on ajoute le tableau de bijou du modèle correspondant à ma list et aux coups de coeurs
        $this->createView($view, $paramView);
    }

    public function details()
    {
        $idJewel = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        // $dao = new Dao();
        $model = new JewelModel();

        try {
            // $jewels = $dao->getJeweldetailsById($idJewel);
            $jewel = $model->detailsjewel($idJewel);
        } catch (Exception $e) {
            // Afficher le message d'erreur à l'utilisateur
            echo 'Une erreur s\'est produite: ' . $e->getMessage();
            // Enregistrer l'erreur dans le fichier de journal
            error_log('Une erreur s\'est produite: ' . $e->getMessage());
            return;
            return;
        }
        // $cart = new Cart();
        // $nbrJewel = $cart->nbrArticle();

        $view = 'jewel/detailsJewel';
        $paramView = ['css' => 'detailsJewel', 'jewel' => $jewel];
        // on ajoute le tableau de bijou du modèle correspondant à ma list et aux coups de coeurs
        $this->createView($view, $paramView);
    }

    // liste des bagues

    public function listofrings()
    {

        // include 'app/model/JewelModel.php';
        // on instancie la classe jewel model et on passe à ce nouvel objet la méthode listRing
        $model = new JewelModel();

        // $stone = $_GET['stone'] ?? '';
        // $metal = $_GET['metal'] ?? '';
        // $color = $_GET['color'] ?? '';
        // $price = $_GET['price'] ?? '';

        // $filteredRings = $model->getFilteredRings($stone, $metal, $color, $price);

        // // Retourner les bijoux filtrés en tant que réponse AJAX
        // echo json_encode($filteredRings);

        // test avec filtre qui va chercher le nom 

        // // je verifie si des filtres ont été envoyés
        // $filters = [];
        // if (isset($_GET['metal'])) $filters['metal'] = $_GET['metal'];
        // if (isset($_GET['stone'])) $filters['stone'] = $_GET['stone'];
        // if (isset($_GET['price'])) $filters['price'] = $_GET['price'];

        // // Si un filtre pour le métal est présent, on recherche son id correspondant
        // if (isset($filters['metal'])) {
        //     $metalName = $filters['metal'];
        //     $idMetal = $model->getMetalIdByName($metalName);
        //     $filters['metal'] = $idMetal;
        // }

        // // Si un filtre pour la pierre précieuse est présent, on recherche son id correspondant
        // if (isset($filters['stone'])) {
        //     $stoneName = $filters['stone'];
        //     $idStone = $model->getStoneIdByName($stoneName);
        //     $filters['stone'] = $idStone;
        // }

        // // Appel de la méthode listRing avec ou sans filtres selon ce qui a été envoyé
        // // si filtres vide alors on utilise le modèle listRing et sinon on utilise le modèle de filtrage
        // if (empty($filters)) {
        //     $tabRings = $model->listRing();
        // } else {
        //     $tabRings = $model->listRingFiltered($filters);
        // }

        $tabRings = $model->listRing();

        // on passe aussi cette autre méthode pour les cardHearts avec une limite de 20
        $tabJewelsLimit = $model->listJewelsWithLimit(20);

        // var_dump($tabJewelsLimit); 
        // affiche le contenu de la variable dans le nav

        // On instancie le panier, nmbr article pour quand on ajoutera au panier que le compte soit fait dans le panier
        $cart = new Cart();
        $nbrJewel = $cart->nbrArticle();
        $view = 'jewel/listRing';
        $paramView = ['css' => 'listJewel', 'rings' => $tabRings, 'jewelslimit' => $tabJewelsLimit];
        // on ajoute le tableau de bijou du modèle correspondant à ma list et aux coups de coeurs
        $this->createView($view, $paramView);
    }

    public function listofnecklaces()
    {
        $model = new JewelModel();

        $tabNecklace = $model->listNecklace();

        // on passe aussi cette autre méthode pour les cardHearts avec une limite de 20
        $tabJewelsLimit = $model->listJewelsWithLimit(20);

        // On instancie le panier, nmbr article pour quand on ajoutera au panier que le compte soit fait dans le panier
        $cart = new Cart();
        $nbrJewel = $cart->nbrArticle();
        $view = 'jewel/listNecklace';
        $paramView = ['css' => 'listJewel', 'necklaces' => $tabNecklace, 'jewelslimit' => $tabJewelsLimit];
        // on ajoute le tableau de bijou du modèle correspondant à ma list et aux coups de coeurs
        $this->createView($view, $paramView);
    }

    public function listofbracelets()
    {
        $model = new JewelModel();

        $tabBracelets = $model->listBracelets();

        // on passe aussi cette autre méthode pour les cardHearts avec une limite de 20
        $tabJewelsLimit = $model->listJewelsWithLimit(20);

        // On instancie le panier, nmbr article pour quand on ajoutera au panier que le compte soit fait dans le panier
        $cart = new Cart();
        $nbrJewel = $cart->nbrArticle();
        $view = 'jewel/listBracelets';
        $paramView = ['css' => 'listJewel', 'bracelets' => $tabBracelets, 'jewelslimit' => $tabJewelsLimit];
        // on ajoute le tableau de bijou du modèle correspondant à ma list et aux coups de coeurs
        $this->createView($view, $paramView);
    }

    public function listofearrings()
    {
        $model = new JewelModel();

        $tabEarrings = $model->listEarrings();

        // on passe aussi cette autre méthode pour les cardHearts avec une limite de 20
        $tabJewelsLimit = $model->listJewelsWithLimit(20);

        // On instancie le panier, nmbr article pour quand on ajoutera au panier que le compte soit fait dans le panier
        $cart = new Cart();
        $nbrJewel = $cart->nbrArticle();
        $view = 'jewel/listEarrings';
        $paramView = ['css' => 'listJewel', 'earrings' => $tabEarrings, 'jewelslimit' => $tabJewelsLimit];
        // on ajoute le tableau de bijou du modèle correspondant à ma list et aux coups de coeurs
        $this->createView($view, $paramView);
    }

    public function createjewel()
    {
        // var_dump($_POST);

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // envoi du formulaire
            $view = 'jewel/createJewel';
            // $error = '';
            $paramView = ['css' => 'seeJewel', 'error' => ''];
            $this->createView($view, $paramView);
        } else {
            $error = '';
            // traitement des informations
            //print_r($_POST);
            //print_r($_FILES);
            $filename = 'App/Assets/' . $_FILES['image']['name'];
            if (move_uploaded_file($_FILES['image']['tmp_name'], $filename)) {
                $model = new JewelModel();
                $model->createJewel();
            } else {
                $error = 'Erreur lors du chargement de l\'image';
            }

            // $view = 'jewel/listJewel';

            // $paramView = ['css' => 'listJewel', 'error' => ''];
            // $this->createView($view, $paramView);

            header('Location: index.php?entite=jewels&action=list');
            exit();
        }
    }

    // action affichant la page des bijoux qu'on peut modif ou suppr
    public function see()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        // var_dump($id);
        // var_dump($jewel);

        // pour débuguer id est null et doit etre un entier
        // if (!$id) {
        //     // Gestion de l'erreur si $id est nul ou non valide car erreur donné id est null et doit être un entier
        //     $view = 'error';
        //     $paramView = ['error' => 'Invalid id'];
        //     $this->createView($view, $paramView);
        //     return;
        // }

        $model = new JewelModel();
        $jewel = $model->seeJewels($id);

        $view = 'jewel/seeJewel';
        $paramView = ['css' => 'seeJewel', 'jewel' => $jewel, 'error' => ''];
        $this->createView($view, $paramView);
    }

    // action permettant de supprimer un bijou
    public function delete()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $model = new JewelModel();
        $jewel = $model->deleteJewel($id);
        header('Location: index.php?entite=jewels&action=list');
        exit();
    }

    // action permettant de mettre à jour un bijou en faisant appel au model
    public function update()
    {
        // var_dump($color);

        $model = new JewelModel();
        $model->updateJewel();
        header('Location: index.php?entite=jewels&action=list');
        exit();
    }

    // ajouter un article dans le panier si l'id ni est pas déjà (methode add)
    public function addtocart()
    {

        $cart = new Cart();

        $idJewel = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        $dao = new Dao();
        $jewel = $dao->getJewelById($idJewel);

        $cart->add($jewel);
        // var_dump($cart);

        header('Location:index.php?entite=jewels&action=list');
        exit();
    }

    // public function addtofavs()
    // {

    //     $Favs = new Favoris();

    //     $idJewel = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    //     // var_dump($idJewel);

    //     $dao = new Dao();
    //     $jewel = $dao->getJewelById($idJewel);
    //     // var_dump($jewel);

    //     $Favs->add($jewel);
    //     // var_dump($Favs);
    //     //juste retourner bijoux $Favs->$jewel;
    //     header('Location:index.php?entite=jewels&action=list');
    //     exit();
    // }

    public function addtofavs()
    {
        $idJewel = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        $dao = new Dao();
        $jewel = $dao->getJewelById($idJewel);

        // Récupérer les favoris de la session
        $favs = isset($_SESSION['favoris']) ? unserialize($_SESSION['favoris']) : [];

        // Ajouter le bijou aux favoris
        if (!in_array($jewel, $favs)) {
            $favs[] = $jewel;
            $_SESSION['favoris'] = serialize($favs);
        }

        // Rediriger vers la liste de bijoux
        header('Location:index.php?entite=jewels&action=list');
        exit();
    }
}
