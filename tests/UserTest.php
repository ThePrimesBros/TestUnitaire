<?php

namespace App\Entity;

//use AppBundle\src\Controller\CalculetteController;
use App\Entity\TodoList;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testIfNamePasPresent()
    {
        $todoList = new TodoList();
        $user = new User('test@test.fr', '', 'DOE', '13-02-2000', 'aaaaaaaaaaaa', [$todoList]);

        $this->assertSame(false, $user->isValid());
    }
    public function testIfMailPasPresent()
    {
        $todoList = new TodoList();
        $user = new User('', 'Jhon', 'DOE', '13-02-2000', 'aaaaaaaaaaaa', [$todoList]);

        $this->assertSame(false, $user->isValid());
    }
    public function testIfPrenomPasPresent()
    {
        $todoList = new TodoList();
        $user = new User('test@test.fr', 'Jhon', '', '13-02-2000', 'aaaaaaaaaaaa', [$todoList]);

        $this->assertSame(false, $user->isValid());
    }
    public function testIfNomPasPresent()
    {
        $todoList = new TodoList();
        $user = new User('test@test.fr', '', 'Doe', '13-02-2000', 'aaaaaaaaaaaa', [$todoList]);

        $this->assertSame(false, $user->isValid());
    }
    public function testIfAgeInfA13()
    {
        $todoList = new TodoList();
        $user = new User('test@test.fr', 'Jhon', 'DOE', '10-02-2010', 'aaaaaaaaaaaa', [$todoList]);

        $this->assertSame(false, $user->isValid());
    }
    public function testIfAgeSupA13()
    {
        $todoList = new TodoList();
        $user = new User('test@test.fr', 'Jhon', 'DOE', '13-02-2000', 'aaaaaaaaaaaa', [$todoList]);

        $this->assertSame(true, $user->isValid());
    }
    public function testIfMailNotGood()
    {
        $todoList = new TodoList();
        $user = new User('testtest.fr', 'Jhon', 'DOE', '13-02-2000', 'aaaaaaaaaaaa', [$todoList]);

        $this->assertSame(false, $user->isValid());
    }
    public function testIfMailNotGood2()
    {
        $todoList = new TodoList();
        $user = new User('test@test', 'Jhon', 'DOE', '13-02-2000', 'aaaaaaaaaaaa', [$todoList]);

        $this->assertSame(false, $user->isValid());
    }
    public function testToutEstValide()
    {
        $todoList = new TodoList();
        $user = new User('test@test.fr', 'Jhon', 'DOE', '13-02-2000', 'aaaaaaaaaaaa', [$todoList]);

        $this->assertSame(true, $user->isValid());
    }
    public function testPasswordPasValide()
    {
        $todoList = new TodoList();
        $user = new User('test@test.fr', 'Jhon', 'DOE', '13-02-2000', 'aaaa', [$todoList]);

        $this->assertSame(false, $user->isValid());
    }
    public function testPasswordPasValideTropGrand()
    {
        $todoList = new TodoList();
        $user = new User('test@test.fr', 'Jhon', 'DOE', '13-02-2000', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', [$todoList]);

        $this->assertSame(false, $user->isValid());
    }
    public function testPasswordNull()
    {
        $todoList = new TodoList();
        $user = new User('test@test.fr', 'Jhon', 'DOE', '13-02-2000', '', [$todoList]);

        $this->assertSame(false, $user->isValid());
    }
    public function test2TodoList()
    {
        $todoList = new TodoList();
        $todoList2 = new TodoList();
        $user = new User('test@test.fr', 'Jhon', 'DOE', '13-02-2000', '', [$todoList, $todoList2]);

        $this->assertSame(false, $user->isValid());
    }
}