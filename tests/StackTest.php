<?php

use App\Exceptions\InvalidItemException;
use App\Exceptions\ListEmptyException;
use App\Stack;
use PHPUnit\Framework\TestCase;

class StackTest extends TestCase
{
    protected Stack $sut;

    public function test_empty_list()
    {
        $this->assertEquals($this->sut->length(), 0);
    }

    public function test_push_one_item_successful()
    {
        $this->sut->push(1);
        $this->assertEquals($this->sut->length(), 1);
    }

    public function test_push_multi_item_successful()
    {
        $items = [1, 2, 3];
        $this->sut->push(...$items);
        $this->assertEquals($this->sut->length(), 3);
        $this->assertEquals($this->sut->getItems(), $items);
    }

    public function test_push_no_item_must_throw_exception()
    {
        $this->expectException(InvalidItemException::class);
        $this->sut->push();
    }

    public function test_pop_empty_list_must_throw_exception()
    {
        $this->expectException(ListEmptyException::class);
        $this->sut->pop();
    }

    public function test_pop_one_item_successful()
    {
        $sut = new Stack([1]);
        $this->assertEquals($sut->pop(), 1);
        $this->assertEquals($sut->length(), 0);
    }

    public function test_pop_multi_item_successful()
    {
        $sut = new Stack([3, 2, 1]);

        $this->assertPops([1, 2, 3], $sut);
    }

    protected function assertPops($items, Stack $sut)
    {
        foreach ($items as $item)
            $this->assertEquals($sut->pop(), $item);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->sut = new Stack();
    }
}