<?php

namespace Diamancia\App\model;

use Diamancia\App\dao\Dao;
use Diamancia\App\entities\Jewel;
use Exception;

class JewelModel
{

    // CARDS Dans listJewel
    public function listJewel()
    {

        $dao = new Dao();
        $tabJewels = $dao->getAllJewels();
        return $tabJewels;
    }

    // CARD HEART
    // on transmet la valeur de la limite comme argument
    public function listJewelsWithLimit($limit=20)
    {

        $dao = new Dao();
        $tabJewelsLimit = $dao->getJewelsWithLimit($limit);
        return $tabJewelsLimit;
    }

    public function seeJewels(int $id)
    {
        $dao = new Dao();
        $jewel = $dao->getJewelById($id);
        return $jewel;
    }

    public function deleteJewel(int $id)
    {
        $dao = new Dao();
        $dao->deleteJewelById($id);
    }

    // CARDS Dans listRing

    public function listRing()
    {

    $dao = new Dao();
    
    $tabJewels = $dao->getAllRings();
    return $tabJewels;
    }

    public function listRingFiltered($filters)
    {
        $dao = new Dao();

        // Récupération des noms des métaux et pierres précieuses à partir des ids
        if (isset($filters['metal'])) {
            $metalName = $dao->getMetalNameById($filters['metal']);
            $filters['metal'] = $metalName;
        }
        if (isset($filters['stone'])) {
            $stoneName = $dao->getStoneNameById($filters['stone']);
            $filters['stone'] = $stoneName;
        }
        
        $tabJewels = $dao->getRingsFiltered($filters);
        return $tabJewels;
    }

    // ******************************** PARTIE ADMIN ************************************//

    // récupère les infos de la dao et création d'un nouveau bijou on instancie une nouvelle classe
    public function createJewel()
    {

        $dao = new Dao();
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
        $details = filter_input(INPUT_POST, 'details', FILTER_SANITIZE_SPECIAL_CHARS);
        $color = filter_input(INPUT_POST, 'color', FILTER_SANITIZE_SPECIAL_CHARS);
        $filename = $_FILES['image']['name'];
        $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_SPECIAL_CHARS);
        $stock = filter_input(INPUT_POST, 'stock', FILTER_SANITIZE_SPECIAL_CHARS);
        $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
        $stone = filter_input(INPUT_POST, 'stone', FILTER_SANITIZE_SPECIAL_CHARS);
        $metal = filter_input(INPUT_POST, 'metal', FILTER_SANITIZE_SPECIAL_CHARS);
        $size = filter_input(INPUT_POST, 'size', FILTER_SANITIZE_SPECIAL_CHARS);

        $jewel = new Jewel($title, $details, $color, $filename, $price, $stock, $type, $stone,$metal,$size);

        $dao->setJewel($jewel);
    }

    // on instancie la classe jewel et on communique avec la dao pour lui transmettre les informations
    public function updateJewel()
    {

        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
        $details = filter_input(INPUT_POST, 'details', FILTER_SANITIZE_SPECIAL_CHARS);
        $color = filter_input(INPUT_POST, 'color', FILTER_SANITIZE_SPECIAL_CHARS);
        $filename = filter_input(INPUT_POST, 'image_name', FILTER_SANITIZE_SPECIAL_CHARS);
        $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
        $stock = filter_input(INPUT_POST, 'stock', FILTER_VALIDATE_INT);
        $type = filter_input(INPUT_POST, 'type', FILTER_VALIDATE_INT);
        $stone = filter_input(INPUT_POST, 'stone', FILTER_VALIDATE_INT);
        $metal = filter_input(INPUT_POST, 'metal', FILTER_SANITIZE_SPECIAL_CHARS);
        $size = filter_input(INPUT_POST, 'size', FILTER_VALIDATE_INT);



        if ($_FILES['image']['error'] == 0) {
            move_uploaded_file($_FILES['image']['tmp_name'], 'Assets/');
            $filename = $_FILES['image']['name'];
        }

        // na pas oublier d'ajouter en dessous filename si je transforme en file

        $jewel = new Jewel($title, $details, $color, $filename, $price, $stock, $type, $stone, $metal, $size);
        $dao = new Dao();
        $dao->updateJewel($jewel, $id);
    }

}
