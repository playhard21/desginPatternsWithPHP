<?php


interface Iterator
{
    public function hasNext();

    public function next();
}

class MyIterator implements Iterator
{
    private $position = 0;
    private $array = [1, 2, 3, 4, 5];

    public function hasNext()
    {
        return isset($this->array[$this->position]);
    }

    public function next()
    {
        return $this->array[$this->position++];
    }
}

$iterator = new MyIterator();
//Usage
while ($iterator->hasNext()) {
    echo $iterator->next() . PHP_EOL;
}
