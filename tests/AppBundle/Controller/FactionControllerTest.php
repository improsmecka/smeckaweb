<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FactionControllerTest extends WebTestCase
{
    public function testVydry()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/vydry');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Vydry', $crawler->filter('.container h1')->text());
        $this->assertContains('Výpis úspěchů', $crawler->filter('.container h2')->text());
       
    }
}
