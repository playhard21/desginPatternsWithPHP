<?php

class Product {
    private $partA;
    private $partB;
    private $partC;

    public function setPartA($partA) {
        $this->partA = $partA;
    }

    public function setPartB($partB) {
        $this->partB = $partB;
    }

    public function setPartC($partC) {
        $this->partC = $partC;
    }
}

interface Builder {
    public function buildPartA();
    public function buildPartB();
    public function buildPartC();
    public function getResult();
}

class ConcreteBuilder1 implements Builder {
    private $product;

    public function __construct() {
        $this->product = new Product();
    }

    public function buildPartA() {
        $this->product->setPartA('Part A');
    }

    public function buildPartB() {
        $this->product->setPartB('Part B');
    }

    public function buildPartC() {
        $this->product->setPartC('Part C');
    }

    public function getResult() {
        return $this->product;
    }
}

class ConcreteBuilder2 implements Builder {
    private $product;

    public function __construct() {
        $this->product = new Product();
    }

    public function buildPartA() {
        $this->product->setPartA('Part X');
    }

    public function buildPartB() {
        $this->product->setPartB('Part Y');
    }

    public function buildPartC() {
        $this->product->setPartC('Part Z');
    }

    public function getResult() {
        return $this->product;
    }
}

class Director {
    public function build(Builder $builder) {
        $builder->buildPartA();
        $builder->buildPartB();
        $builder->buildPartC();

        return $builder->getResult();
    }
}

//Usage

$director = new Director();

$builder1 = new ConcreteBuilder1();
$product1 = $director->build($builder1);

$builder2 = new ConcreteBuilder2();
$product2 = $director->build($builder2);