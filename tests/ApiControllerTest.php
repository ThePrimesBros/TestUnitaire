<?php

namespace App\Tests;

use App\Entity\Item;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\HttpClient;

class ApiControllerTest extends TestCase
{
    public function testSomething(): void
    {
        $this->assertTrue(true);
    }
    public function testGET()
    {
        $httpClient = HttpClient::create();
        $response = $httpClient->request('GET', 'http://api.icndb.com/jokes/random');
        $data = json_decode($response->getContent());
        $this->assertEquals("success", $data->type);
    }
}
