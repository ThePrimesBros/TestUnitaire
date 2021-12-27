<?php

namespace App\Tests;

use App\Entity\Item;
use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    public function testItemIsCreated()
    {
        $item = new Item('nom', 'content', '12-12-2021 12:30:00');

        $this->assertSame(true, $item->isValid());
    }

    public function testDateVide()
    {
        $item = new Item('nom', 'content', '');

        $this->assertSame(false, $item->isValid());
    }

    public function testDatePasBone()
    {
        $item = new Item('nom', 'content', '12-30-2');

        $this->assertSame(false, $item->isValid());
    }
}
