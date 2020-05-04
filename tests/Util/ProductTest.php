<?php

use PHPUnit\Framework\TestCase;
use Util\Product;
use Util\ShoppingCart;

class ProductTest extends TestCase
{
    public function  test_construct_validInput_productObject() {
        $product = new Product(1, 12.50);
        $this->assertInstanceOf(Product::class, $product );
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function  test_construct_invalidInput_invalidArgumentException() {
        $product = new Product(-10, 12.50);
        $this->assertInstanceOf(Product::class, $product );
    }

    public function test_addProduct_validProduct_true() {
        $cart = new ShoppingCart();
        $product = new Product("1", "12.50");

        $cart->addProduct($product);

        $this->assertEquals(1, count($cart->getProducts()));
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function test_addProduct_invalidProduct_false() {
        $cart = new ShoppingCart();
        $cart->addProduct("not a product");
    }

    public function test_calculatePrice_count_equals() {
        $expectedTotal = 50;
        $cart = new ShoppingCart();
        $cart->addProduct(new Product(1, 15.00));
        $cart->addProduct(new Product(2, 25.00));
        $cart->addProduct(new Product(3, 10.00));
        $this->assertEquals($expectedTotal, $cart->calculatePrice());
    }
}