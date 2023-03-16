<?php

namespace Diamancia\App\entities;

class User
{

    private ?int $id;
    private string $role;
    private string $nom;
    private string $prenom;
    private string $email;
    private string $password;
    private string $address;
    private string $city;
    private int $zipcode;
    private int $tel;


    public function __construct(string $nom = '', string $prenom = '', string $email = '', string $password = '', string $address = '', string $city = '', int $zipcode = 0, int $tel = 0)
    {
        $this->id = null;
        $this->role = 'client';
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->address = $address;
        $this->city = $city;
        $this->zipcode = $zipcode;
        $this->tel = $tel;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function getNom()
    {
        return $this->nom;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getZipcode()
    {
        return $this->zipcode;
    }

    public function getTel()
    {
        return $this->tel;
    }
}
