<?php


interface Observer
{
    public function update(Subject $subject);
}

interface Subject
{
    public function attach(Observer $observer);

    public function detach(Observer $observer);

    public function notify();
}

class ConcreteSubject implements Subject
{
    private $observers = [];
    private $state;

    public function attach(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer)
    {
        $key = array_search($observer, $this->observers, true);
        if ($key) {
            unset($this->observers[$key]);
        }
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;
        $this->notify();
    }
}

class ConcreteObserverA implements Observer
{
    public function update(Subject $subject)
    {
        if ($subject->getState() > 0) {
            echo "ConcreteObserverA: Reacted to the event" . PHP_EOL;
        }
    }
}

class ConcreteObserverB implements Observer
{
    public function update(Subject $subject)
    {
        if ($subject->getState() == 0) {
            echo "ConcreteObserverB: Reacted to the event" . PHP_EOL;
        }
    }
}

$subject = new ConcreteSubject();

$observerA = new ConcreteObserverA();
$observerB = new ConcreteObserverB();

$subject->attach($observerA);
$subject->attach($observerB);

$subject->setState(1);
$subject->setState(0);
