<?php

namespace Diamancia\App\controller;

use Diamancia\App\model\UserModel;
use Diamancia\App\controller\Controller;
use Exception;

// require_once 'app/controller/Controller.php';

class UserController extends Controller
{

    public function createView(string $vue, array $params)
    {

        extract($params); // creation des variables nécessaires à la vue

        include 'app/view/template.php';
    }

    public function execute(string $action)
    {

        $this->$action();   // appel la méthode dont le nom est dans la variable $action
    }

    public function login()
    {

        $paramView = ['css' => 'login', 'error' => ''];
        $this->createView('user/login', $paramView);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $paramView = ['css' => 'create', 'error' => ''];
            $this->createView('user/create', $paramView);
        } else {

            $model = new UserModel();
            //appel de ma fonction creation user
            $model->create_user();
            $paramView = ['css' => 'login', 'error' => ''];
            $this->createView('user/login', $paramView);
        }
    }
    public function verif()
    {
        // vérification du formaulaire de login
        try {
            // appel de la fonction de vérification des données de connexion
            $model = new UserModel();
            $model->verifUser();    // leve des EXception
            // on est logger
            header('Location: index.php');  // demande de redirection au navigateur
            exit();
        } catch (Exception $err) {
            // erreur d'authentification
            $paramView = ['css' => 'login', 'error' => $err->getMessage()];
            $this->createView('user/login', $paramView);
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: index.php');
        exit();
    }
}
