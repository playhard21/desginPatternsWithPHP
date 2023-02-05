<?php

interface Prototype {
    public function copy(): Prototype;
}

class ConcretePrototype1 implements Prototype {
    private ConcretePrototype1 $property;

    public function __construct($property) {
        $this->property = $property;
    }

    public function copy(): Prototype {
        return new self($this->property);
    }
}

class ConcretePrototype2 implements Prototype {
    private ConcretePrototype2 $property;

    public function __construct($property) {
        $this->property = $property;
    }

    public function copy(): Prototype {
        return new self($this->property);
    }
}

//Usage
$prototype1 = new ConcretePrototype1('property 1');
$prototype2 = new ConcretePrototype2('property 2');

$clone1 = $prototype1->copy();
$clone2 = $prototype2->copy();