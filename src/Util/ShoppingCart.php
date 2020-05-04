<?php namespace Util;

use Interfaces\PriceInterface;

class ShoppingCart implements PriceInterface
{
    private $products;

    public function __construct()
    {
        $this->products = array();
    }

    public function addProduct($product) {
        if($product instanceof Product) {
            array_push($this->products, $product);
        } else {
            throw new \InvalidArgumentException("Item must be of type Product");
        }
    }

    public function productInCart($product) {
        return array_values($this->products).contains($product);
    }

    public function getProductCount() {
        return array_count_values($this->products);
    }

    public function calculatePrice()
    {
        $price = 0;
        foreach ($this->products as $product) {
            $price = $price + $product->getPrice();
        }
        return $price;
    }

    public function getProducts(): array
    {
        return $this->products;
    }
}