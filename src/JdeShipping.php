<?php

declare(strict_types=1);

namespace JdeShipping;

use JdeShipping\Client\Client;
use JdeShipping\Request\Geo\GeoSearchRequest;
use JdeShipping\Request\Geo\GeoSearchByKladrRequest;
use JdeShipping\Request\Geo\GeoCitySearchRequest;
use JdeShipping\Request\Geo\GeoScheduleRequest;
use JdeShipping\Request\Cost\CostCalcByAddressRequest;
use JdeShipping\Request\Cost\CostCalcRequest;
use JdeShipping\Request\Service\ServiceDocCodeListRequest;
use JdeShipping\Request\Order\OrderListRequest;
use JdeShipping\Request\Order\OrderCreateRequest;
use JdeShipping\Request\Shipment\ShipmentNewStatusRequest;
use JdeShipping\Request\Shipment\ShipmentStatusByCodeRequest;
use JdeShipping\Request\Shipment\ShipmentSetRestrictionRequest;
use JdeShipping\Dto\Location;
use JdeShipping\Dto\LocationByKladr;
use JdeShipping\Dto\City;
use JdeShipping\Dto\Schedule;
use JdeShipping\Dto\CostCalcAddress;
use JdeShipping\Dto\CostCalc;
use JdeShipping\Dto\Document;
use JdeShipping\Dto\DocumentCode;
use JdeShipping\Dto\DocumentType;
use JdeShipping\Dto\Order;
use JdeShipping\Dto\OrderCreate;
use JdeShipping\Dto\ShipmentNewStatus;
use JdeShipping\Dto\ShipmentSimpleStatus;
use JdeShipping\Dto\ShipmentRestriction;
use JdeShipping\Request\Document\DocumentRequest;
use JdeShipping\Request\Document\DocumentTypeListRequest;
use JdeShipping\Trait\JdeShippingConstTrait;

/**
 * Класс JdeShipping предоставляет методы для работы с API службы доставки JDE.
 * 
 * Этот класс наследуется от Client и реализует различные методы для выполнения
 * запросов к API, такие как поиск географических данных, расчет стоимости доставки,
 * создание заказов и управление статусами отправлений.
 */
final class JdeShipping extends Client
{
	use JdeShippingConstTrait;

	/**
	 * Выполняет поиск географических данных.
	 *
	 * @param GeoSearchRequest $request Запрос на поиск географических данных
	 * @return Location[] Массив найденных локаций
	 * @throws ClientException В случае ошибки при выполнении запроса
	 */
	public function getGeoSearch(GeoSearchRequest $request): array
	{
		return $this->request($request);
	}

	/**
	 * Выполняет поиск географических данных по коду КЛАДР.
	 *
	 * @param GeoSearchByKladrRequest $request Запрос на поиск по коду КЛАДР
	 * @return LocationByKladr[] Массив найденных локаций по КЛАДР
	 * @throws ClientException В случае ошибки при выполнении запроса
	 */
	public function getGeoSearchByKladr(GeoSearchByKladrRequest $request): array
	{
		return $this->request($request);
	}

	/**
	 * Выполняет поиск городов.
	 *
	 * @param GeoCitySearchRequest $request Запрос на поиск городов
	 * @return City[] Массив найденных городов
	 * @throws ClientException В случае ошибки при выполнении запроса
	 */
	public function getGeoCitySearch(GeoCitySearchRequest $request): array
	{
		return $this->request($request);
	}

	/**
	 * Получает расписание для указанного кода.
	 *
	 * @param GeoScheduleRequest $request Запрос на получение расписания
	 * @return Schedule[] Массив расписаний
	 * @throws ClientException В случае ошибки при выполнении запроса
	 */
	public function getGeoSchedule(GeoScheduleRequest $request): array
	{
		return $this->request($request);
	}

	/**
	 * Рассчитывает стоимость доставки по адресу.
	 *
	 * @param CostCalcByAddressRequest $request Запрос на расчет стоимости по адресу
	 * @return CostCalcAddress Результат расчета стоимости
	 * @throws ClientException В случае ошибки при выполнении запроса
	 */
	public function getCostCalcByAddress(CostCalcByAddressRequest $request): CostCalcAddress
	{
		return $this->request($request);
	}

	/**
	 * Рассчитывает стоимость доставки.
	 *
	 * @param CostCalcRequest $request Запрос на расчет стоимости
	 * @return CostCalc Результат расчета стоимости
	 * @throws ClientException В случае ошибки при выполнении запроса
	 */
	public function getCostCalc(CostCalcRequest $request): CostCalc
	{
		return $this->request($request);
	}

	/**
	 * Получает список доступных услуг.
	 *
	 * @param ServiceDocCodeListRequest $request Запрос на получение списка услуг
	 * @return DocumentCode[] Массив кодов документов
	 * @throws ClientException В случае ошибки при выполнении запроса
	 */
	public function getServiceList(ServiceDocCodeListRequest $request): array
	{
		return $this->request($request);
	}

	/**
	 * Получает список заказов.
	 *
	 * @param OrderListRequest $request Запрос на получение списка заказов
	 * @return Order[] Массив заказов
	 * @throws ClientException В случае ошибки при выполнении запроса
	 */
	public function getOrderList(OrderListRequest $request): array
	{
		return $this->request($request);
	}

	/**
	 * Создает новый заказ.
	 *
	 * @param OrderCreateRequest $request Запрос на создание заказа
	 * @return OrderCreate Результат создания заказа
	 * @throws ClientException В случае ошибки при выполнении запроса
	 */
	public function sendOrderCreate(OrderCreateRequest $request): OrderCreate
	{
		return $this->request($request);
	}

	/**
	 * Получает новые статусы отправлений.
	 *
	 * @param ShipmentNewStatusRequest $request Запрос на получение новых статусов
	 * @return ShipmentNewStatus[] Массив новых статусов отправлений
	 * @throws ClientException В случае ошибки при выполнении запроса
	 */
	public function getShipmentNewStatus(ShipmentNewStatusRequest $request): array
	{
		return $this->request($request);
	}

	/**
	 * Получает статус отправления по коду.
	 *
	 * @param ShipmentStatusByCodeRequest $request Запрос на получение статуса по коду
	 * @return ShipmentSimpleStatus Статус отправления
	 * @throws ClientException В случае ошибки при выполнении запроса
	 */
	public function getShipmentStatusByCode(ShipmentStatusByCodeRequest $request): ShipmentSimpleStatus
	{
		return $this->request($request);
	}

	/**
	 * Устанавливает ограничение для отправления.
	 *
	 * @param ShipmentSetRestrictionRequest $request Запрос на установку ограничения
	 * @return ShipmentRestriction Результат установки ограничения
	 * @throws ClientException В случае ошибки при выполнении запроса
	 */
	public function sendShipmentSetRestriction(ShipmentSetRestrictionRequest $request): ShipmentRestriction
	{
		return $this->request($request);
	}

	/**
	 * Получает документ.
	 *
	 * @param DocumentRequest $request Запрос на получение документа
	 * @return Document Результат получения документа
	 * @throws ClientException В случае ошибки при выполнении запроса
	 */
	public function getDocument(DocumentRequest $request): Document
	{
		return $this->request($request);
	}

	/**
	 * Получает список типов документов.
	 *
	 * @param DocumentTypeListRequest $request Запрос на получение списка типов документов
	 * @return DocumentType[] Массив типов документов
	 * @throws ClientException В случае ошибки при выполнении запроса
	 */
	public function getDocumentTypeList(DocumentTypeListRequest $request): array
	{
		return $this->request($request);
	}
}
