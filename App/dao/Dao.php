<?php

namespace Diamancia\App\dao;

use PDO;
use PDOException;
use Exception;
use Diamancia\App\entities\User;
use Diamancia\App\entities\Jewel;

class Dao
{

    private ?PDO $dbconnect;

    public function __construct()
    {
        try {
            $this->dbconnect = new PDO('mysql:host=localhost;dbname=bijouterie;charset=UTF8', 'root', '');
        } catch (PDOException $pdoExcept) {
            //var_dump($pdoExcept->getMessage()); die();
            throw new Exception('Nous sommes désolés l\'application n\'est pas disponible pour le moment...');
        }
    }


    public function getUserByLogin(string $login): User
    {

        $sql = 'SELECT * FROM user WHERE email=:login;';

        $user_stat = $this->dbconnect->prepare($sql);
        $user_stat->bindParam('login', $login);
        $user_stat->execute();

        if ($user_stat->rowCount() == 1) {
            $user_stat->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Diamancia\App\entities\User');
            //le setfetchmode sert a renvoyer un objet d'une certaine classe
            //props late pour valoriser les propriétés
            // pour que ça appelle d'abord le constructeur sans ecraser les setters, valorise les propritété apres
            $user = $user_stat->fetch();
            $user_stat = NULL;
            //quand on met null l'objet est supprimé de la memoire on a plus besoin pour la requete apres c'est bon
            $this->dbconnect = NULL;
            return $user;
        } else {
            $user_stat = NULL;
            $this->dbconnect = NULL;
            throw new Exception('User non trouvé dans la base');
        }
    }

    public function setUser(User $user)
    {

        $sql = 'INSERT INTO user VALUES (NULL, :role, :nom, :prenom, :email, :password, :address, :city,:zipcode, :tel)';
        $user_stat = $this->dbconnect->prepare($sql);

        $param = [
            ':role' => $user->getRole(),
            ':nom' => $user->getNom(),
            ':prenom' => $user->getPrenom(),
            ':email' => $user->getEmail(),
            ':password' => $user->getPassword(),
            ':address' => $user->getAddress(),
            ':city' => $user->getCity(),
            ':zipcode' => $user->getZipcode(),
            ':tel' => $user->getTel(),

        ];
        $user_stat->execute($param);
    }

    public function getAllJewels(): array
    {

        $sql = 'SELECT * FROM articles ORDER BY RAND()';
        $jewel_statement = $this->dbconnect->query($sql);
        $jewel_statement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Diamancia\App\entities\Jewel');
        //Fetch props late= si utilisé avec fetch class le constructeur de la classe appelé avant que les propriétés ne soit assignées à partir des valeurs de colonnes respectives
        $jewels = $jewel_statement->fetchAll();
        // fetchAll permet de recuperer tout les resultats et retourner un tableau de bijoux
        return $jewels;
    }

    public function getJewelsWithLimit($limit): array
    {

        $sql = "SELECT * FROM articles ORDER BY RAND() LIMIT $limit";
        $jewel_statement = $this->dbconnect->query($sql);
        $jewel_statement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Diamancia\App\entities\Jewel');
        //Fetch props late= si utilisé avec fetch class le constructeur de la classe appelé avant que les propriétés ne soit assignées à partir des valeurs de colonnes respectives
        $jewels = $jewel_statement->fetchAll();
        return $jewels;
    }

    //get all articles by ID by stone, by type etc.... PAGE BY STONE AND CATEGORY TO DO
    // +enregistrer cart and favs + 2 functions

    //To modify jewels

    public function setjewel(Jewel $jewel)
    {

        $sql = 'INSERT INTO articles  VALUES (NULL, :title, :details, :color, :file, :price, :date, :stock, :type, :stone, :metal, :size)';
        $jewel_statement = $this->dbconnect->prepare($sql);

        $param = [
            ':title' => $jewel->getTitle(),
            ':details' => $jewel->getDetails(),
            ':color' => $jewel->getColor(),
            ':file' => $jewel->getImage_name(),
            ':price' => $jewel->getPrice(),
            ':date' => $jewel->getUpdate_at(),
            ':stock' => $jewel->getStock(),
            ':type' => $jewel->getType(),
            ':stone' => $jewel->getStone(),
            ':metal' => $jewel->getMetal(),
            ':size' => $jewel->getSize()
        ];

        $jewel_statement->execute($param);
    }

    // connexion dao pour recup les infos et pouvoir ensuite les modifier
    public function updateJewel(Jewel $jewel, int $idJewel)
    {

        $sql = 'UPDATE `articles` SET `title`=:title,`details`=:details,`color`=:color,`image_name`=:file,`price`=:price,`updated_at`=:date, `stock`=:stock,`id_type`=:type,`id_pierre`=:stone,`metal`=:metal,`size`=:size WHERE id_Article=' . $idJewel;

        $jewel_statement = $this->dbconnect->prepare($sql);
        $param = [
            ':title' => $jewel->getTitle(),
            ':details' => $jewel->getDetails(),
            ':color' => $jewel->getColor(),
            // ':image_name' => $jewel->getImage_name(), si je veux simplement changer le nom
            ':file' => $jewel->getImage_name(),
            // file pour parcourir les fichiers et modif image
            ':price' => $jewel->getPrice(),
            ':date' => $jewel->getUpdate_at(),
            ':stock' => $jewel->getStock(),
            ':stone' => $jewel->getStone(),
            ':type' => $jewel->getType(),
            ':metal' => $jewel->getMetal(),
            ':size' => $jewel->getSize()
        ];

        $jewel_statement->execute($param);
    }

    // to delete the jewel from database (page seeJewel)
    public function deleteJewelById($idJewel)
    {

        $sql = 'DELETE FROM articles WHERE id_Article=:id';
        $jewel_statement = $this->dbconnect->prepare($sql);
        $jewel_statement->bindParam(':id', $idJewel);
        $jewel_statement->execute();
    }


    public function getArticleByid($idArticle)
    {

        $sql = 'SELECT * FROM articles WHERE id_Article = ' . $idArticle . ';';

        $art_stat = $this->dbconnect->query($sql);

        $art = $art_stat->fetch(PDO::FETCH_ASSOC);

        return $art;
    }

    public function getJewelById(int $id): Jewel
    {
        $sql = 'SELECT * FROM articles WHERE id_Article=:id';
        $jewel_statement = $this->dbconnect->prepare($sql);
        $jewel_statement->bindParam(':id', $id);
        $jewel_statement->execute();
        $jewel_statement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Diamancia\App\entities\Jewel');
        $jewel = $jewel_statement->fetch();
        return $jewel;
    }
}
