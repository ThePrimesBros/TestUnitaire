<?php

namespace App\Entity;

//use AppBundle\src\Controller\CalculetteController;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testIfNamePasPresent()
    {
        $user = new User('test@test.fr', '', 'DOE', '13-02-2000', 'aaaaaaaaaaaa');

        $this->assertSame(false, $user->isValid());
    }
    public function testIfMailPasPresent()
    {
        $user = new User('', 'Jhon', 'DOE', '13-02-2000', 'aaaaaaaaaaaa');

        $this->assertSame(false, $user->isValid());
    }
    public function testIfPrenomPasPresent()
    {
        $user = new User('test@test.fr', 'Jhon', '', '13-02-2000', 'aaaaaaaaaaaa');

        $this->assertSame(false, $user->isValid());
    }
    public function testIfAgeInfA13()
    {
        $user = new User('test@test.fr', 'Jhon', 'DOE', '10-02-2010', 'aaaaaaaaaaaa');

        $this->assertSame(false, $user->isValid());
    }
    public function testIfAgeSupA13()
    {
        $user = new User('test@test.fr', 'Jhon', 'DOE', '13-02-2000', 'aaaaaaaaaaaa');

        $this->assertSame(true, $user->isValid());
    }
    public function testIfMailNotGood()
    {
        $user = new User('testtest.fr', 'Jhon', 'DOE', '13-02-2000', 'aaaaaaaaaaaa');

        $this->assertSame(false, $user->isValid());
    }
    public function testIfMailNotGood2()
    {
        $user = new User('test@test', 'Jhon', 'DOE', '13-02-2000', 'aaaaaaaaaaaa');

        $this->assertSame(false, $user->isValid());
    }
    public function testToutEstValide()
    {
        $user = new User('test@test.fr', 'Jhon', 'DOE', '13-02-2000', 'aaaaaaaaaaaa');

        $this->assertSame(true, $user->isValid());
    }
    public function testPasswordPasValide()
    {
        $user = new User('test@test.fr', 'Jhon', 'DOE', '13-02-2000', 'aaaa');

        $this->assertSame(false, $user->isValid());
    }
    public function testPasswordPasValideTropGrand()
    {
        $user = new User('test@test.fr', 'Jhon', 'DOE', '13-02-2000', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');

        $this->assertSame(false, $user->isValid());
    }
    public function testPasswordNull()
    {
        $user = new User('test@test.fr', 'Jhon', 'DOE', '13-02-2000', '');

        $this->assertSame(false, $user->isValid());
    }
}