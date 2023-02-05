<?php


interface Mediator
{
    public function send($message, Colleague $colleague);
}

class ConcreteMediator implements Mediator
{
    private $colleague1;
    private $colleague2;

    public function setColleague1(Colleague $colleague)
    {
        $this->colleague1 = $colleague;
    }

    public function setColleague2(Colleague $colleague)
    {
        $this->colleague2 = $colleague;
    }

    public function send($message, Colleague $colleague)
    {
        if ($colleague === $this->colleague1) {
            $this->colleague2->notify($message);
        } else {
            $this->colleague1->notify($message);
        }
    }
}

interface Colleague
{
    public function setMediator(Mediator $mediator);

    public function notify($message);
}

class ConcreteColleague1 implements Colleague
{
    private $mediator;

    public function setMediator(Mediator $mediator)
    {
        $this->mediator = $mediator;
    }

    public function notify($message)
    {
        echo "Colleague1 gets message: " . $message . PHP_EOL;
    }

    public function send($message)
    {
        $this->mediator->send($message, $this);
    }
}

class ConcreteColleague2 implements Colleague
{
    private $mediator;

    public function setMediator(Mediator $mediator)
    {
        $this->mediator = $mediator;
    }

    public function notify($message)
    {
        echo "Colleague2 gets message: " . $message . PHP_EOL;
    }

    public function send($message)
    {
        $this->mediator->send($message, $this);
    }
}

$mediator = new ConcreteMediator();

$colleague1 = new ConcreteColleague1();
$colleague2 = new ConcreteColleague2();

$mediator->setColleague1($colleague1);
$mediator->setColleague2($colleague2);

$colleague1->setMediator($mediator);
$colleague2->setMediator($mediator);

$colleague1->send("How are you?");
$colleague2->send("Fine, thanks");
