<?php

namespace Diamancia\App\entities;

class Cart
{
    private $cart;

    public function __construct()
    {

        if (!isset($_SESSION['cart'])) {
            // [
            //    '1' => [vin1, qtt],
            //    '2' => [vin2, qqt]
            // ]
            $_SESSION['cart'] = serialize([]);
        }
        $this->cart = unserialize($_SESSION['cart']);
        //print_r($this->cart);
    }

    public function getItemCart()
    {

        return $this->cart;
    }

    public function add(Jewel $jewel)
    {

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
