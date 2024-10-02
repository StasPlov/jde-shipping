<?php

declare(strict_types=1);

namespace JdeShippingClient;

use JdeShipping\Client\Client;
use JdeShipping\Request\Type\GeoSearchRequest;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
	private Client $client;

	protected function setUp(): void
	{
		$this->client = Client::create()
			->setUser($_ENV['TEST_USER'])
			->setToken($_ENV['TEST_TOKEN']);
	}

	public function testRequestWithValidData(): void
	{
		$response = $this->client->request(
			(new GeoSearchRequest())
				->setMode(1)
		);

		var_dump($response);
		die;

		$this->assertEquals($expectedLocation, $response);
	}
}
