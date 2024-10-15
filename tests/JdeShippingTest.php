<?php

declare(strict_types=1);

namespace JdeShipping\Tests;

use JdeShipping\Dto\Document;
use JdeShipping\Dto\Order;
use JdeShipping\Dto\ShipmentRestriction;
use JdeShipping\Dto\ShipmentSimpleStatus;
use JdeShipping\JdeShipping;
use JdeShipping\Request\Cost\CostCalcByAddressRequest;
use JdeShipping\Request\Cost\CostCalcRequest;
use JdeShipping\Request\Document\DocumentRequest;
use JdeShipping\Request\Geo\GeoCitySearchRequest;
use JdeShipping\Request\Geo\GeoScheduleRequest;
use JdeShipping\Request\Geo\GeoSearchByKladrRequest;
use JdeShipping\Request\Geo\GeoSearchRequest;
use JdeShipping\Request\Order\OrderCreateRequest;
use JdeShipping\Request\Order\OrderListRequest;
use JdeShipping\Request\Order\Type\OrderCreate\PersonReceiver;
use JdeShipping\Request\Order\Type\OrderCreate\PersonSender;
use JdeShipping\Request\Service\ServiceDocCodeListRequest;
use JdeShipping\Request\Shipment\ShipmentNewStatusRequest;
use JdeShipping\Request\Shipment\ShipmentSetRestrictionRequest;
use JdeShipping\Request\Shipment\ShipmentStatusByCodeRequest;
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

		$response = $this->jdeShipping->getGeoSchedule($geoKladr);

		$this->assertIsArray($response);
		$this->assertNotEmpty($response);
		$this->assertIsObject($response[0]);
	}

	public function testCostCalcByAddress(): void
	{
		$shipmentCalc = (new CostCalcByAddressRequest())
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

		$response = $this->jdeShipping->getCostCalcByAddress($shipmentCalc);

		$this->assertIsObject($response);
		$this->assertNull($response->getError());
		$this->assertIsFloat($response->getPrice());
	}

	public function testCostCalc(): void
	{
		$shipmentCalc = (new CostCalcRequest())
			->setFrom('1010005858')
			->setTo('1125904247254472')
			->setType(1)
			->setWeight(216)
			->setVolume(0.41);

		$response = $this->jdeShipping->getCostCalc($shipmentCalc);

		$this->assertIsObject($response);
		$this->assertNull($response->getError());
		$this->assertIsFloat($response->getPrice());
	}

	public function testCostCalc_Service(): void
	{
		$shipmentCalc = (new CostCalcRequest())
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

		$shipmentCalc = (new CostCalcRequest())
			->setFrom('1010005858')
			->setTo('1125904247254472')
			->setType(1)
			->setWeight(216)
			->setVolume(0.41);

		$this->assertNull($shipmentCalc->getServices());
	}

	public function testCostCalc_Smart(): void
	{
		$shipmentCalc = (new CostCalcRequest())
			->setFrom('Москва')
			->setTo('Владивосток')
			->setType(1)
			->setWeight(216)
			->setVolume(0.41)
			->setSmart(true);

		$response = $this->jdeShipping->getCostCalc($shipmentCalc);

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

	public function testOrderCreate_simple(): string
	{
		$randRef = 'test-' . rand(1000, 9999) . '-' . rand(1000, 9999);
		$order = (new OrderCreateRequest())
			->setFrom("1125899906842653")
			->setTo("1125899906842629")
			->setVolume(1)
			->setWeight(1)
			->setRef($randRef)
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

		return $randRef;
	}

	public function testOrderList(): Order
	{
		$response = $this->jdeShipping->getOrderList(
			new OrderListRequest()
		);

		$this->assertIsArray($response);
		$this->assertNotEmpty($response);

		return $response[0];
	}

	public function testShipmentNewStatus(): void
	{
		$response = $this->jdeShipping->getShipmentNewStatus(
			new ShipmentNewStatusRequest()
		);

		$this->assertIsArray($response);
	}

	/**
	 * @depends testOrderCreate_simple
	 */
	public function testShipmentStatusByCode(string $randRef): void
	{
		$response = $this->jdeShipping->getShipmentStatusByCode(
			(new ShipmentStatusByCodeRequest())
				->setRef($randRef)
		);

		$this->assertIsObject($response);
		$this->assertInstanceOf(ShipmentSimpleStatus::class, $response);
		$this->assertEquals(JdeShipping::ORDER_STATE_NEW_ORDER_BY_CLIENT, $response->getStatus());
	}

	/**
	 * @depends testOrderList
	 * @param Order $order
	 */
	public function testSendShipmentSetRestriction(Order $order): void
	{
		$request = (new ShipmentSetRestrictionRequest())->setTtn($order->getId());

		try {
			$response = $this->jdeShipping->sendShipmentSetRestriction($request);

			$this->assertInstanceOf(ShipmentRestriction::class, $response);

			if ($response->getInfo() === "ТТН не найдена") {
				$this->assertEquals("ТТН не найдена", $response->getInfo());
			} else {
				$this->assertTrue($response->getIsOk());
				$this->assertNotEmpty($response->getInfo());
			}
		} catch (\Exception $e) {
			if ($e->getCode() === 500) {
				$this->markTestSkipped('Произошла ошибка 500 при выполнении sendShipmentSetRestriction');
			} else {
				$this->fail('Неожиданное исключение: ' . $e->getMessage());
			}
		}
	}

	public function testDocument(): void
	{
		$request = (new DocumentRequest())
			->setType(7479)
			->setId("000000000000");

		try {
			$response = $this->jdeShipping->getDocument($request);

			$this->assertIsObject($response);
			$this->assertInstanceOf(Document::class, $response);
		} catch (\Exception $e) {
			if ($e->getCode() === 500) {
				$this->markTestSkipped('Произошла ошибка 500 при выполнении getDocument');
			} else {
				$this->fail('Неожиданное исключение: ' . $e->getMessage());
			}
		}
	}
}
