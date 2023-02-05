<?php

interface Subject {
    public function request();
}

class RealSubject implements Subject {
    public function request() {
        return 'RealSubject';
    }
}

class Proxy implements Subject {
    private $realSubject;

    public function request() {
        if ($this->realSubject === null) {
            $this->realSubject = new RealSubject();
        }

        return $this->realSubject->request();
    }
}

//Usage

$proxy = new Proxy();

echo $proxy->request() . PHP_EOL;
