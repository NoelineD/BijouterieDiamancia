<?php

namespace Diamancia\App\controller;

use Diamancia\App\model\JewelModel;
use Diamancia\App\entities\Cart;
// use Diamancia\App\entities\Jewel;
use Diamancia\App\dao\Dao;
// use Diamancia\App\controller\Controller;

// require_once 'app/controller/Controller.php';

class JewelController extends Controller
{
    // action amenant à la page de listJewels

    public function list()
    {

        // include 'app/model/JewelModel.php';
        $model = new JewelModel();
        $tabJewels = $model->listJewel();
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

    // liste des bagues

    public function listofrings()
    {

        // include 'app/model/JewelModel.php';
        // on instancie la classe jewel model et on passe à ce nouvel objet la méthode listRing
        $model = new JewelModel();

        // je verifie si des filtres ont été envoyés
        $filters = [];
        if (isset($_GET['metal'])) $filters['metal'] = $_GET['metal'];
        if (isset($_GET['stone'])) $filters['stone'] = $_GET['stone'];
        if (isset($_GET['price'])) $filters['price'] = $_GET['price'];

        // Si un filtre pour le métal est présent, on recherche son id correspondant
        if (isset($filters['metal'])) {
            $metalName = $filters['metal'];
            $idMetal = $model->getMetalIdByName($metalName);
            $filters['metal'] = $idMetal;
        }

        // Si un filtre pour la pierre précieuse est présent, on recherche son id correspondant
        if (isset($filters['stone'])) {
            $stoneName = $filters['stone'];
            $idStone = $model->getStoneIdByName($stoneName);
            $filters['stone'] = $idStone;
        }

        // Appel de la méthode listRing avec ou sans filtres selon ce qui a été envoyé
        // si filtres vide alors on utilise le modèle listRing et sinon on utilise le modèle de filtrage
        if (empty($filters)) {
            $tabRings = $model->listRing();
        } else {
            $tabRings = $model->listRingFiltered($filters);
        }

        // on passe aussi cette autre méthode pour les cardHearts avec une limite de 20
        $tabJewelsLimit = $model->listJewelsWithLimit(20);

        // var_dump($tabJewelsLimit); 
        // affiche le contenu de la variable dans le nav

        // On instancie le panier
        $cart = new Cart();
        $nbrJewel = $cart->nbrArticle();
        $view = 'jewel/listRing';
        $paramView = ['css' => 'listJewel', 'rings' => $tabRings, 'jewelslimit' => $tabJewelsLimit];
        // on ajoute le tableau de bijou du modèle correspondant à ma list et aux coups de coeurs
        $this->createView($view, $paramView);
    }

    public function createjewel()
    {
        var_dump($_POST);
        $error = "";
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // envoi du formulaire
            $view = 'jewel/createJewel';
            // $error = '';
            $paramView = ['css' => 'seeJewel', 'error' => ''];
            $this->createView($view, $paramView);
        } else {
            // traitement des informations
            //print_r($_POST);
            //print_r($_FILES);
            $filename = 'Assets/' . $_FILES['image']['name'];
            if (move_uploaded_file($_FILES['image']['tmp_name'], $filename)) {
                $model = new JewelModel();
                $model->createJewel();
            } else {
                $error = 'Erreur lors du chargement de l\'image';
            }
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

    public function addtocart()
    {

        $cart = new Cart();

        $idJewel = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        $dao = new Dao();
        $jewel = $dao->getJewelById($idJewel);

        $cart->add($jewel);

        header('Location:index.php?entite=jewels&action=list');
        exit();
    }
}