<?php


namespace App;


use App\Exceptions\InvalidItemException;
use App\Exceptions\ListEmptyException;

class Stack implements StackInterface
{
    protected array $items = [];

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    public function push(...$items): void
    {
        if (count($items) <= 0) throw new InvalidItemException();

        array_push($this->items, ...$items);
    }

    public function pop()
    {
        if (count($this->items) <= 0) throw new ListEmptyException();

        return array_pop($this->items);
    }

    public function length(): ?int
    {
        return count($this->items);
    }

    public function getItems()
    {
        return $this->items;
    }
}