<?php

namespace Diamancia\App\entities;

class Cart
{
    private $cart;

    public function __construct()
    {
        // s'il n'y a pas de session cart on la serialise en creant un tableau vide comme objet [] tableau dans lequel 
        // on va mettre nos 2 tableaux un avec les infos bijou et autre avec qtt

        if (!isset($_SESSION['cart'])) {
            // [
            //    '1' => [jewel1, qtt],
            //    '2' => [jewel2, qqt]
            // ]
            $_SESSION['cart'] = serialize([]);
        }
        $this->cart = unserialize($_SESSION['cart']);
        //print_r($this->cart);
    }

    // Faire retourner les articles sur la page qu'on affiche en cliquant sur le panier

    public function getItemCart()
    {

        return $this->cart;
    }

    // on ajoute au panier le bijou ou bien on rajoute un à la quantité en incrementant

    public function add(Jewel $jewel)
    {

        // si l'id existe déjà dans ce panier incrémente de 1, sinon ajoute le , valeur quantité bijou 1
        if (array_key_exists($jewel->getId(), $this->cart)) {
            $this->cart[$jewel->getId()][1]++;
        } else {
            // mettre jewel dans le panier
            $this->cart[$jewel->getId()] = [$jewel, 1];
        }
        $_SESSION['cart'] = serialize($this->cart);
    }

    public function delete(Jewel $jewel)
    {
        unset($this->cart[$jewel->getId()]);
        $_SESSION['cart'] = serialize($this->cart);
    }

    public function remove(Jewel $jewel)
    {
        $this->cart[$jewel->getId()][1]--;
        if ($this->cart[$jewel->getId()][1] === 0) {
            $this->delete($jewel);
        }
        $_SESSION['cart'] = serialize($this->cart);
    }

    public function clear()
    {
    }

    public function prixTotal(): float
    {

        $prixTotal = 0.0;

        foreach ($this->cart as $item) {

            $prixTotal += $item[0]->getPrice() * $item[1];
        }

        return $prixTotal;
    }

    public function nbrArticle()
    {
        return count($this->cart);
    }
}
