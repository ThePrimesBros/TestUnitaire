<?php

namespace App\Tests;

use App\Entity\EmailSenderService;
use App\Entity\User;
use PHPUnit\Framework\TestCase;


class EmailSenderServiceTest extends TestCase
{
    public function testSendMessage()
    {
        $EmailSenderService = $this->createMock(SendMessage::class);
        
        $EmailSenderService->method('send')
            ->willReturn('foo');

        $this->assertEquals('foo', $EmailSenderService->send());

        /*$user = new User($mail, $name);
        $user->SetMail('mail@test.com');
        $user->setName('Prenomtest');*/
    }
}