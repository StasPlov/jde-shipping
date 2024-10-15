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
use JdeShipping\Dto\DocumentCode;
use JdeShipping\Dto\Order;
use JdeShipping\Dto\OrderCreate;
use JdeShipping\Dto\ShipmentNewStatus;
use JdeShipping\Dto\ShipmentSimpleStatus;
use JdeShipping\Dto\ShipmentRestriction;

/**
 * Класс JdeShipping предоставляет методы для работы с API службы доставки JDE.
 * 
 * Этот класс наследуется от Client и реализует различные методы для выполнения
 * запросов к API, такие как поиск географических данных, расчет стоимости доставки,
 * создание заказов и управление статусами отправлений.
 */
final class JdeShipping extends Client
{
	/**
	 * Евроборт
	 */
	const SERVICES_BRD = 'BRD';

	/**
	 * Внутренний пересчет
	 */
	const SERVICES_CRGREC = 'CRGREC';

	/**
	 * Выполнение забора груза в день заявки
	 */
	const SERVICES_DCD = 'DCD';

	/**
	 * Забор груза в нерабочее время
	 */
	const SERVICES_DDO = 'DDO';

	/**
	 * Забор груза в фиксиров. время
	 */
	const SERVICES_DFT = 'DFT';

	/**
	 * ПГР и перенос по территории клиента
	 */
	const SERVICES_DLU = 'DLU';

	/**
	 * Доставка хрупкого грузобагажа
	 */
	const SERVICES_FRAG = 'FRAG';

	/**
	 * Обрешетка
	 */
	const SERVICES_LATH = 'LATH';

	/**
	 * Загрузка груза на локальный склад
	 */
	const SERVICES_LWHS = 'LWHS';

	/**
	 * Негабаритный груз
	 */
	const SERVICES_OVERS = 'OVERS';

	/**
	 * Супер негабаритный груз
	 */
	const SERVICES_SOVERS = 'SOVERS';

	/**
	 * Доставка в тепле
	 */
	const SERVICES_TMP = 'TMP';

	/**
	 * Ящик
	 */
	const UPAK_BOX = 1;

	/**
	 * Коробка
	 */
	const UPAK_BOX_CARTON = 2;

	/**
	 * Ящик и коробка
	 */
	const UPAK_BOX_AND_BOX_CARTON = 3;

	/**
	 * Мешок
	 */
	const UPAK_POUCH = 4;

	/**
	 * Мешок и Ящик
	 */
	const UPAK_POUCH_AND_BOX = 5;

	/**
	 * Мешок и Коробка
	 */
	const UPAK_POUCH_AND_BOX_CARTON = 6;

	/**
	 * Канистра
	 */
	const UPAK_CANISTER = 8;

	/**
	 * Бочка
	 */
	const UPAK_BARREL = 16;

	/**
	 * Плательщик отправитель
	 */
	const PAYER_SENDER = 1;

	/**
	 * Плательщик получатель
	 */
	const PAYER_RECIPIENT = 2;

	/**
	 * Плательщик третье лицо
	 */
	const PAYER_THIRD = 3;

	/**
	 * Форма собственности: Физ. лицо
	 */
	const OWNER_PHYSICAL_PERSON = 0;

	/**
	 * Форма собственности: ООО
	 */
	const OWNER_OOO = 1;

	/**
	 * Форма собственности: ОАО
	 */
	const OWNER_OAO = 2;

	/**
	 * Форма собственности: ЗАО
	 */
	const OWNER_ZAO = 3;

	/**
	 * Форма собственности: ИП
	 */
	const OWNER_IP = 4;

	/**
	 * Форма собственности: ФГУ
	 */
	const OWNER_FGU = 5;

	/**
	 * Форма собственности: ФГУП
	 */
	const OWNER_FGUP = 6;

	/**
	 * Форма собственности: МУП
	 */
	const OWNER_MUP = 7;

	/**
	 * Форма собственности: АНО
	 */
	const OWNER_ANO = 8;

	/**
	 * Форма собственности: ГУП
	 */
	const OWNER_GUP = 9;

	/**
	 * Форма собственности: НО
	 */
	const OWNER_NO = 10;

	/**
	 * Форма собственности: Другое
	 */
	const OWNER_OTHER = 11;

	/**
	 * Обработка заявки на перевозку
	 */
	const ORDER_STATE_NEW_ORDER_BY_CLIENT = 'NewOrderByClient';

	/**
	 * Груз не доставлен
	 */
	const ORDER_STATE_NOT_DONE = 'NotDone';

	/**
	 * Груз принят к перевозке
	 */
	const ORDER_ON_TERMINAL_PICKUP = 'OnTerminalPickup';

	/**
	 * Груз в пути
	 */
	const ORDER_ON_ROAD = 'OnRoad';

	/**
	 * Груз прибыл
	 */
	const ORDER_DELIVERING = 'Delivering';

	/**
	 * Груз доставлен
	 */
	const ORDER_DELIVERED = 'Delivered';

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
}
