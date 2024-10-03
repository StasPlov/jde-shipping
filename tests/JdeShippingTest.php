<?php

declare(strict_types=1);

namespace JdeShipping\Tests;

use JdeShipping\JdeShipping;
use JdeShipping\Request\Type\GeoCitySearchRequest;
use JdeShipping\Request\Type\GeoScheduleRequest;
use JdeShipping\Request\Type\GeoSearchByKladrRequest;
use JdeShipping\Request\Type\GeoSearchRequest;
use JdeShipping\Request\Type\ServiceDocCodeListRequest;
use JdeShipping\Request\Type\ShipmentCostCalcByAddressRequest;
use JdeShipping\Request\Type\ShipmentCostCalcRequest;
use PHPUnit\Framework\TestCase;

class JdeShippingTest extends TestCase
{
	private JdeShipping $jdeShipping;

	protected function setUp(): void
	{
		$this->jdeShipping = new JdeShipping();
		$this->jdeShipping
			->setUser($_ENV['TEST_USER'] ?? '')
			->setToken($_ENV['TEST_TOKEN'] ?? '');
	}

	public function testGetGeoSearch(): void
	{
		$geo = (new GeoSearchRequest())
			->setMode(1);

		$response = $this->jdeShipping->getGeoSearch($geo);

		$this->assertIsArray($response);
		$this->assertNotEmpty($response);
		$this->assertIsObject($response[0]);
	}

	public function testGeoSearchByKladr(): void
	{
		$geoKladr = (new GeoSearchByKladrRequest())
			->setKladrCode('5002700102400');

		$response = $this->jdeShipping->getGeoSearchByKladr($geoKladr);

		$this->assertIsArray($response);
		$this->assertNotEmpty($response);
		$this->assertIsObject($response[0]);
	}

	public function testGeoCitySearch(): void
	{
		$geoKladr = (new GeoCitySearchRequest())
			->setMode(1);

		$response = $this->jdeShipping->getGeoCitySearch($geoKladr);

		$this->assertIsArray($response);
		$this->assertNotEmpty($response);
		$this->assertIsObject($response[0]);
	}

	public function testGeoSchedule(): void
	{
		$geoKladr = (new GeoScheduleRequest())
			->setCode('1125899906842653');

		$response = $this->jdeShipping->getGeoCitySearch($geoKladr);

		$this->assertIsArray($response);
		$this->assertNotEmpty($response);
		$this->assertIsObject($response[0]);
	}

	public function testShipmentCostCalcByAddress(): void
	{
		$shipmentCalc = (new ShipmentCostCalcByAddressRequest())
			->setAddrFrom('владивосток')
			->setAddrTo('москва')
			->setType(1)
			->setWeight(2.167)
			->setWidth(0.121)
			->setHeight(0.121)
			->setLength(2.135)
			->setQuantity(1)
			->setPickup(1)
			->setDelivery(1)
			->setDeclared(3670)
			->setOversizeWeight(1)
			->setOversizeVolume(1)
			->setObrVolume(0.031);

		$response = $this->jdeShipping->getShipmentCostCalcByAddress($shipmentCalc);

		$this->assertIsObject($response);
		$this->assertNull($response->getError());
		$this->assertIsFloat($response->getPrice());
	}

	public function testShipmentCostCalc(): void
	{
		$shipmentCalc = (new ShipmentCostCalcRequest())
			->setFrom('1010005858')
			->setTo('1125904247254472')
			->setType(1)
			->setWeight(216)
			->setVolume(0.41);

		$response = $this->jdeShipping->getShipmentCostCalcByAddress($shipmentCalc);

		$this->assertIsObject($response);
		$this->assertNull($response->getError());
		$this->assertIsFloat($response->getPrice());
	}

	public function testShipmentCostCalc_Service(): void
	{
		$shipmentCalc = (new ShipmentCostCalcRequest())
			->setFrom('1010005858')
			->setTo('1125904247254472')
			->setType(1)
			->setWeight(216)
			->setVolume(0.41)
			->setServices([
				JdeShipping::SERVICES_DLU,
				JdeShipping::SERVICES_CRGREC
			]);

		$this->assertIsArray($shipmentCalc->getServices());

		$shipmentCalc = (new ShipmentCostCalcRequest())
			->setFrom('1010005858')
			->setTo('1125904247254472')
			->setType(1)
			->setWeight(216)
			->setVolume(0.41);

		$this->assertNull($shipmentCalc->getServices());
	}

	public function testShipmentCostCalc_Smart(): void
	{
		$shipmentCalc = (new ShipmentCostCalcRequest())
			->setFrom('Москва')
			->setTo('Владивосток')
			->setType(1)
			->setWeight(216)
			->setVolume(0.41)
			->setSmart(true);

		$response = $this->jdeShipping->getShipmentCostCalcByAddress($shipmentCalc);

		$this->assertIsObject($response);
		$this->assertNull($response->getError());
		$this->assertIsFloat($response->getPrice());
	}

	public function testServiceDocCodeList(): void
	{
		$response = $this->jdeShipping->getServiceList(
			new ServiceDocCodeListRequest()
		);

		$this->assertIsArray($response);
	}
}
