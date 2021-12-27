<?php

namespace App\Tests;

use App\Entity\Item;
use App\Entity\TodoList;
use PHPUnit\Framework\TestCase;

class TodoListTest extends TestCase
{

    public function testAjoute1Items(){
        $todo = new TodoList();
        $item = new Item('Item1', 'Content', '12-12-2021');

        $this->assertSame(true, $todo->add($item));
    }

    public function testAjoute11Items(){
        $todo = new TodoList();
        $item1 = new Item('Item1', 'Content', '12-12-2021');
        $todo->add($item1);
        $item2 = new Item('Item2', 'Content', '12-12-2021');
        $todo->add($item2);
        $item3 = new Item('Item3', 'Content', '12-12-2021');
        $todo->add($item3);
        $item4 = new Item('Item4', 'Content', '12-12-2021');
        $todo->add($item4);
        $item5 = new Item('Item5', 'Content', '12-12-2021');
        $todo->add($item5);
        $item6 = new Item('Item6', 'Content', '12-12-2021');
        $todo->add($item6);
        $item7 = new Item('Item7', 'Content', '12-12-2021');
        $todo->add($item7);
        $item8 = new Item('Item8', 'Content', '12-12-2021');
        $todo->add($item8);
        $item9 = new Item('Item9', 'Content', '12-12-2021');
        $todo->add($item9);
        $item10 = new Item('Item10', 'Content', '12-12-2021');
        $todo->add($item10);
        $item11 = new Item('Item11', 'Content', '12-12-2021');
        $todo->add($item11);

        $this->assertSame(false, $todo->isValid());
    }

    public function testAjoute5Items(){
        $todo = new TodoList();
        $item1 = new Item('Item1', 'Content', '12-12-2021');
        $todo->add($item1);
        $item2 = new Item('Item2', 'Content', '12-12-2021');
        $todo->add($item2);
        $item3 = new Item('Item3', 'Content', '12-12-2021');
        $todo->add($item3);
        $item4 = new Item('Item4', 'Content', '12-12-2021');
        $todo->add($item4);
        $item5 = new Item('Item5', 'Content', '12-12-2021');
        $todo->add($item5);

        $this->assertSame(true, $todo->isValid());
    }

    public function testItemsAvecMemeNom(){
        $todo = new TodoList();
        $item1 = new Item('Item1', 'Content', '12-12-2021');
        $todo->add($item1);
        $item2 = new Item('Item1', 'Content', '12-12-2021');

        $this->assertSame(false, $todo->add($item2));
    }


    // public function todoWithoutItems()
    // {
    //     $todolist = new Todolist();
    //     $this->assertTrue(true);
    // }
}
