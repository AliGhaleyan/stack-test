<?php

use App\Exceptions\InvalidItemException;
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
        $this->sut->push(1, 2, 3);
        $this->assertEquals($this->sut->length(), 3);
    }

    public function test_push_no_item_must_throw_exception()
    {
        $this->expectException(InvalidItemException::class);
        $this->sut->push();
    }

    public function test_pop_empty_list_must_be_null()
    {
        $this->assertNull($this->sut->pop());
    }

    public function test_pop_one_item_successful()
    {
        $this->sut->push(1);
        $this->assertEquals($this->sut->pop(), 1);
        $this->assertEquals($this->sut->length(), 0);
    }

    public function test_pop_multi_item_successful()
    {
        $this->sut->push(1,2,3);
        $this->assertEquals($this->sut->pop(), 3);
        $this->assertEquals($this->sut->length(), 2);
        $this->assertEquals($this->sut->pop(), 2);
        $this->assertEquals($this->sut->length(), 1);
        $this->assertEquals($this->sut->pop(), 1);
        $this->assertEquals($this->sut->length(), 0);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->sut = new Stack();
    }
}