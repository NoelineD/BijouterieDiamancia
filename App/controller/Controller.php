<?php

namespace Diamancia\App\controller;

abstract class Controller
{

    protected function createView(string $vue, array $params)
    {

        extract($params); // creation des variables nécessaires à la vue
        // $css = 'home';

        include 'app/view/template.php';
    }

    public function execute(string $action)
    {
        $this->$action();   // appel la méthode dont le nom est dans la variable $action
    }

    //$params correspond à l'erreur de page possible ou le css


}
