<?php


namespace App;


interface StackInterface
{
    public function push(...$items): void;

    public function pop();

    public function length(): ?int;
}