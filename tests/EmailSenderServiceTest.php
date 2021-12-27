<?php

namespace App\Tests;

use App\Entity\EmailSenderService;
use PHPUnit\Framework\TestCase;


class EmailSenderServiceTest extends TestCase
{
    public function testSendMessage()
    {
        $EmailSenderService = $this->createMock(EmailSenderService::class);
        
        $EmailSenderService->method('SendMessage')
            ->willReturn('foo');

        $this->assertEquals('foo', $EmailSenderService->SendMessage('test@test.fr'));
    }
}