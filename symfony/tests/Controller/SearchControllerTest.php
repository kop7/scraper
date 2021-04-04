<?php
namespace App\Tests\Controller;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class SearchControllerTest extends WebTestCase
{
	public function testSearch(): void
	{
		$client = static::createClient([],[
			'HTTP_HOST'       => 'localhost',
		]);
		$client->request('POST', '/api/v1/search/github/php');
		$this->assertEquals(200, $client->getResponse()->getStatusCode());
	}
}
