<?php

declare(strict_types=1);

namespace JdeShipping\Tests;

use JdeShipping\JdeShipping;
use JdeShipping\Request\Geo\GeoCitySearchRequest;
use JdeShipping\Request\Geo\GeoScheduleRequest;
use JdeShipping\Request\Geo\GeoSearchByKladrRequest;
use JdeShipping\Request\Geo\GeoSearchRequest;
use JdeShipping\Request\Order\OrderCreateRequest;
use JdeShipping\Request\Order\OrderListRequest;
use JdeShipping\Request\Order\Type\OrderCreate\Delivery;
use JdeShipping\Request\Order\Type\OrderCreate\PersonReceiver;
use JdeShipping\Request\Order\Type\OrderCreate\PersonSender;
use JdeShipping\Request\Order\Type\OrderCreate\Pickup;
use JdeShipping\Request\Order\Type\OrderCreate\Service;
use JdeShipping\Request\Order\Type\OrderCreate\Store;
use JdeShipping\Request\Service\ServiceDocCodeListRequest;
use JdeShipping\Request\Shipment\ShipmentCostCalcByAddressRequest;
use JdeShipping\Request\Shipment\ShipmentCostCalcRequest;
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

	public function testOrderCreateRequest_simple(): void
	{
		$order = (new OrderCreateRequest())
			->setFrom("1125899906842653")
			->setTo("1125899906842629")
			->setVolume(1)
			->setWeight(1)
			->setPositions(2)
			->setGruzdesc("Бытовая техника и электроника")
			->setPayer(JdeShipping::PAYER_SENDER)
			->setNote("ТЕСТ Программисты тестируют API проводить не нужно, отменить!!!")
			->setSender(
				(new PersonSender)
					->setAddr("Санкт-Петербург, Невский 30-2-12")
					->setTitle("ООО Отправитель")
					->setPhone("+79841341530")
			)
			->setReceiver(
				(new PersonReceiver)
					->setAddr("г. Москва, ул. 2-й Лучевой просек, д. 5В")
					->setTitle("ООО Получатель")
					->setPhone("+79841341530")
			);

		$response = $this->jdeShipping->sendOrderCreate($order);

		$this->assertIsObject($response);
		$this->assertEquals("success", $response->getStatus());
	}

	public function testOrderListRequest(): void
	{
		$response = $this->jdeShipping->getOrderList(
			new OrderListRequest()
		);

		$this->assertIsArray($response);
	}

	/* public function testOrderCreateRequest(): void
	{
		$order = (new OrderCreateRequest())
			->setFrom("1125899906842653")
			->setTo("1125899906842629")
			->setVolume(1)
			->setInsValue(1.53)
			->setWeight(1)
			->setPositions(2)
			->setServices(
				(new Service)
					->setPayOnDelivery(true)
					->setPayOnDeliveryAmount(2000)
					->setUpak(JdeShipping::UPAK_BARREL)
					->setNeg(true)
					->setTeplo(false)
					->setLabove(false)
					->setHrup(false)
					->setSeal(false)
					->setZaezd(false)
					->setObr(false)
					->setDocsForward(false)
					->setDocsBack(false)
					->setPallet(false)
					->setPalletPack(false)
			)
			->setGruzdesc("Бытовая техника и электроника")
			->setPickupService(true)
			->setDeliveryService(true)
			->setPayer(JdeShipping::PAYER_SENDER)
			->setNote("Программисты тестируют API проводить не нужно, отменить!!!")
			->setSender(
				(new PersonSender)
					->setAddr("Санкт-Петербург, Невский 30-2-12")
					->setTitle("ООО Отправитель")
					->setPhone("+79841341530")
					->setOwn(JdeShipping::OWNER_OOO)
					->setInn("6449013711")
					->setKpp("644901001")
					->setEmail("SaviouR.S@mail.ru")
					->setLat(45.33)
					->setLng(32.44)
					->setWorkhours("10:00-17:00")
					->setStore(
						(new Store)
							->setAddr("г. Санкт-Петербург, ул. Кременчугская, д.25, кор.4,лит.П")
							->setWorkhours("10:00-17:00")
							->setLat(59.922619)
							->setLng(30.372608)
							->setDinner("13:00-14:00")
							->setContact("Тест")
							->setPhone("+79841341530")
							->setWarrant("123456789")
					)
			)
			->setPickup(
				(new Pickup)
					->setPeriod("9-12")
					->setDate("16.07.2015")
					->setPayer(JdeShipping::PAYER_SENDER)
			)
			->setDelivery(
				(new Delivery)
					->setPeriod("10-18")
					->setPayer(JdeShipping::PAYER_RECIPIENT)
			)
			->setReceiver(
				(new PersonReceiver)
					->setAddr("г. Москва, ул. 2-й Лучевой просек, д. 5В")
					->setTitle("ООО Получатель")
					->setPhone("+79841341530")
			);

		$response = $this->jdeShipping->sendOrderCreate($order);

		$this->assertIsObject($response);
		$this->assertEquals("success", $response->getStatus());
	} */
}
