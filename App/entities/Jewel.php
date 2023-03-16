<?php

namespace Diamancia\App\entities;

class Jewel
{

    private ?int $id_Article;
    // IdARTICLE ETAIT NULL ?int $idArticle
    private string $title;
    private string $details;
    private string $color;
    private string $image_name;
    private float $price;
    private ?string $update_at;
    private int $stock;
    private int $id_Type;
    private int $id_Stone;
    private int $id_Metal;
    private int $id_Size;


    //constructeur
    public function __construct(

        string $title = 'default title',
        // ce qu'on met ici entre guilllement est une valeur par defaut dont l'ordinateur a parfois
        string $details = '',
        string $color = '',
        string $image_name = '',
        float $price = 0.0,
        int $stock = 0,
        int $id_Type = 0,
        int $id_Stone = 0,
        int $id_Metal = 0,
        int $id_Size = 0
    ) {
        $this->id_Article = null;
        $this->title = $title;
        $this->details = $details;
        $this->color = $color;
        $this->image_name = $image_name;
        $this->price = $price;
        $this->update_at = date("Y-m-d H:i:s");
        $this->stock = $stock;
        $this->id_Type = $id_Type;
        $this->id_Stone = $id_Stone;
        $this->id_Metal = $id_Metal;
        $this->id_Size = $id_Size;
    }

    // les getteurs
    public function getId()
    {
        return $this->id_Article;
    }
    public function getTitle()
    {
        return $this->title;
    }

    public function getDetails()
    {
        return $this->details;
    }

    public function getColor()
    {
        return $this->color;
    }
    public function getImage_name()
    {
        return $this->image_name;
    }
    public function getUpdate_at()
    {
        return $this->update_at;
    }
    public function getPrice()
    {
        return $this->price;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function getType()
    {
        return $this->id_Type;
    }

    public function getStone()
    {
        return $this->id_Stone;
    }

    public function getMetal()
    {
        return $this->id_Metal;
    }

    public function getSize()
    {
        return $this->id_Size;
    }
}
