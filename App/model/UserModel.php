<?php

namespace Diamancia\App\model;

use Diamancia\App\dao\Dao;
use Diamancia\App\entities\User;
use Exception;

class UserModel
{

    public function verifUser(): void
    {

        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        if ($email) {

            $dao = new Dao();
            $user = $dao->getUserByLogin($email); // leve une Exception si user non trouvé

            if (password_verify($password, $user->getPassword())) {    // simulation de la valeur de mot de passe

                $_SESSION['email'] = $user->getEmail();
                $_SESSION['role'] = $user->getRole();
            } else {
                throw new Exception('Oops il semble que le mot de passe soit incorrect !');
            }
        } else {
            throw new Exception(' Votre email n\'est pas valide');
        }
    }

    public function create_user()
    {
        $dao = new Dao();
        // récupération des données du $_POST
        // $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_SPECIAL_CHARS);
        $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS);
        $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
        $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_SPECIAL_CHARS);
        $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS);
        $tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_SPECIAL_CHARS);
        $zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_SPECIAL_CHARS);


        $user = new User($nom, $prenom, $email, $password, $address, $city, $tel, $zipcode);

        // hashage du password
        // $password = password_hash($password, PASSWORD_DEFAULT);
        // appel de la dao
        //    $dao->setUser($nom, $prenom, $mail, $psw);
        $dao->setUser($user);
    }
}
