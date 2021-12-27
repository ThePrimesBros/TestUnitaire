<?php

namespace App\Tests;

use App\Entity\Item;
use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    public function testItemIsCreated()
    {
        $user = new Item('nom', 'content', '12-12-2021');

        $this->assertSame(true, $user->isValid());
    }

    public function testDateVide()
    {
        $user = new Item('nom', 'content', '');

        $this->assertSame(false, $user->isValid());
    }

    public function testDatePasBone()
    {
        $user = new Item('nom', 'content', '12-30-2');

        $this->assertSame(false, $user->isValid());
    }
}
