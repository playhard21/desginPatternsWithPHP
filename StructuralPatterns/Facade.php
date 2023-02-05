<?php

class SubsystemA {
    public function operationA1() {
        return 'Subsystem A, Operation A1';
    }

    public function operationA2() {
        return 'Subsystem A, Operation A2';
    }
}

class SubsystemB {
    public function operationB1() {
        return 'Subsystem B, Operation B1';
    }

    public function operationB2() {
        return 'Subsystem B, Operation B2';
    }
}

class Facade {
    private $subsystemA;
    private $subsystemB;

    public function __construct(SubsystemA $subsystemA, SubsystemB $subsystemB) {
        $this->subsystemA = $subsystemA;
        $this->subsystemB = $subsystemB;
    }

    public function operation1() {
        return $this->subsystemA->operationA1() . ' ' . $this->subsystemB->operationB1();
    }

    public function operation2() {
        return $this->subsystemA->operationA2() . ' ' . $this->subsystemB->operationB2();
    }
}

//Usage
$subsystemA = new SubsystemA();
$subsystemB = new SubsystemB();

$facade = new Facade($subsystemA, $subsystemB);

echo $facade->operation1() . PHP_EOL;
echo $facade->operation2() . PHP_EOL;
