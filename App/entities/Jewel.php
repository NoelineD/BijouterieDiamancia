<?php

namespace Diamancia\App\entities;

use Diamancia\App\entities\Metal;
use Diamancia\App\entities\Type;
use Diamancia\App\entities\Stone;
use Diamancia\App\entities\Size;

class Jewel
{

    private ?int $id_Article;
    // IdARTICLE ETAIT NULL ?int $idArticle
    private string $title;
    private string $details;
    private string $color;
    private string $image_name;
    private float $price;
    private ?string $updated_at;
    private int $stock;
    private int $id_Type;
    private int $id_Stone;
    private int $id_Metal;
    private int $id_Size;
    private string $name_metal;
    private string $type_name;
    private string $name_stone;
    private string $number_size;

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
        int $id_Size = 0,
        string $name_metal = '',
        string $type_name = '',
        string $name_stone = '',
        string $number_size = ''
    ) {
        $this->id_Article = null;
        $this->title = $title;
        $this->details = $details;
        $this->color = $color;
        $this->image_name = $image_name;
        $this->price = $price;
        $this->updated_at = date("Y-m-d H:i:s");
        $this->stock = $stock;
        $this->id_Type = $id_Type;
        $this->id_Stone = $id_Stone;
        $this->id_Metal = $id_Metal;
        $this->id_Size = $id_Size;
        $this->name_metal = $name_metal;
        $this->type_name = $type_name;
        $this->name_stone = $name_stone;
        $this->number_size = $number_size;
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
    public function getUpdated_at()
    {
        return $this->updated_at;
    }
    public function getPrice()
    {
        return $this->price;
    }

    public function getStock()
    {
        return $this->stock;
    }

     // Récuperation de l'entité type et getter id + Name séparé pour pouvoir les appeler séparément
    public function getTypeTab(): Type
    {
        return new Type($this->id_Type, $this->type_name);
    }
    
    public function getType()
    {
        return $this->id_Type;
    }

    public function getNameType()
    {
        return $this->type_name;
    }

    public function getStoneTab(): Stone
    {
        return new Stone($this->id_Stone, $this->name_stone);
    }

    public function getStone()
    {
        return $this->id_Stone;
    }

    public function getNameStone()
    {
        return $this->name_stone;
    }

    // Récuperation de l'entité metal et getter id + Name séparé pour pouvoir les appeler séparément
    public function getMetalTab(): Metal
    {
        return new Metal($this->id_Metal, $this->name_metal);
    }

    public function getMetal()
    {
        return $this->id_Metal;
    }

    public function getNameMetal()
    {
        return $this->name_metal;
    }

    public function getSizeTab(): Size
    {
        return new Size($this->id_Size, $this->number_size);
    }

    public function getSize()
    {
        return $this->id_Size;
    }

    public function getNbrSize()
    {
        return $this->number_size;
    }

}

