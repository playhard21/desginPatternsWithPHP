<?php


interface State
{
    public function handle();
}

class ConcreteStateA implements State
{
    public function handle()
    {
        echo "Handled by ConcreteStateA" . PHP_EOL;
    }
}

class ConcreteStateB implements State
{
    public function handle()
    {
        echo "Handled by ConcreteStateB" . PHP_EOL;
    }
}

class Context
{
    private $state;

    public function __construct(State $state)
    {
        $this->state = $state;
    }

    public function setState(State $state)
    {
        $this->state = $state;
    }

    public function handle()
    {
        $this->state->handle();
    }
}

$context = new Context(new ConcreteStateA());
$context->handle();

$context->setState(new ConcreteStateB());
$context->handle();
