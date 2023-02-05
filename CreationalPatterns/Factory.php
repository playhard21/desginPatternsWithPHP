<?php

interface Product {
    public function getName();
}

class ConcreteProductA implements Product {
    public function getName() {
        return 'Product A';
    }
}

class ConcreteProductB implements Product {
    public function getName() {
        return 'Product B';
    }
}

class Factory {
    public static function createProduct(string $type): Product {
        switch ($type) {
            case 'A':
                return new ConcreteProductA();
                break;
            case 'B':
                return new ConcreteProductB();
                break;
            default:
                throw new InvalidArgumentException('Invalid type');
        }
    }
}

//Usage

$productA = Factory::createProduct('A');
$productB = Factory::createProduct('B');