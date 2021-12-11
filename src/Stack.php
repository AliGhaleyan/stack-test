<?php


namespace App;


use App\Exceptions\InvalidItemException;

class Stack implements StackInterface
{
    protected array $items = [];

    public function push(...$items): void
    {
        if (count($items) <= 0) throw new InvalidItemException();

        array_push($this->items, ...$items);
    }

    public function pop()
    {
        return array_pop($this->items);
    }

    public function length(): ?int
    {
        return count($this->items);
    }
}