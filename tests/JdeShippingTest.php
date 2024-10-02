<?php

declare(strict_types=1);

namespace JdeShipping\Tests;

use JdeShipping\JdeShipping;
use JdeShipping\Request\Type\GeoSearchRequest;
use PHPUnit\Framework\TestCase;

class JdeShippingTest extends TestCase
{
	private JdeShipping $jdeShipping;

	protected function setUp(): void
	{
		$this->jdeShipping = new jdeShipping();
		$this->jdeShipping
			->setUser($_ENV['TEST_USER'] ?? '')
			->setToken($_ENV['TEST_TOKEN'] ?? '');
	}

	public function testGetGeoSearchRequest(): void
	{
		$geo = (new GeoSearchRequest())
			->setMode(1);

		$response = $this->jdeShipping->getGeoSearchRequest($geo);
		
		$this->assertIsArray($response);
		$this->assertNotEmpty($response);
		$this->assertIsObject($response[0]);
	}
}
