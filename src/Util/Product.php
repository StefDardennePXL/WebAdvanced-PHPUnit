<?php namespace Util;

class Product
{
    private $id;
    private $price;

    public function __construct($id, $price)
    {
        if($id >= 0 && $price >= 0) {
            $this->id = $id;
            $this->price = $price;
        } else {
            throw new \InvalidArgumentException("Value cannot be negative");
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPrice()
    {
        return $this->price;
    }
}