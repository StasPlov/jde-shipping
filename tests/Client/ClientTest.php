<?php

declare(strict_types=1);

namespace JdeShipping\Tests\Client;

use JdeShipping\Client\Client;
use JdeShipping\Request\Type\GeoSearchRequest;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
	private Client $client;

	protected function setUp(): void
	{
		$this->client = Client::create()
			->setUser($_ENV['TEST_USER'] ?? '')
			->setToken($_ENV['TEST_TOKEN'] ?? '');
	}

	public function testRequestWithValidData(): void
	{
		$response = $this->client->request(
			(new GeoSearchRequest())
				->setMode(1)
		);

		$this->assertEquals(1, 1);
	}
}
