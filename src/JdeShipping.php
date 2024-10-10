<?php

declare(strict_types=1);

namespace JdeShipping;

use JdeShipping\Client\Client;

/** 
 * Тут отпеделяем динамические методы
 * 
 * @method Dto\Location[] 			getGeoSearch(Request\Geo\GeoSearchRequest $request);
 * @method Dto\LocationByKladr[] 	getGeoSearchByKladr(Request\Geo\GeoSearchByKladrRequest $request);
 * @method Dto\City[] 				getGeoCitySearch(Request\Geo\GeoCitySearchRequest $request);
 * @method Dto\Schedule[] 			getGeoSchedule(Request\Geo\GeoScheduleRequest $request);
 * 
 * @method Dto\ShipmentCalcAddress 	getCostCalcByAddress(Request\Cost\CostCalcByAddressRequest $request);
 * @method Dto\ShipmentCalc 		getCostCalc(Request\Cost\CostCalcRequest $request);
 * 
 * @method Dto\DocumentCode[] 		getServiceList(Request\Service\ServiceDocCodeListRequest $request);
 * 
 * @method Dto\Order[] 				getOrderList(Request\Order\OrderListRequest $request);
 * @method Dto\OrderCreate			sendOrderCreate(Request\Order\OrderCreateRequest $request);
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


	public function __call(string $name, array $arguments)
	{
		if (0 === \strpos($name, 'get')) {
			return $this->request(...$arguments);
		}

		if (0 === \strpos($name, 'send')) {
			return $this->request(...$arguments);
		}

		throw new \BadMethodCallException(\sprintf('Method [%s] not found in [%s].', $name, __CLASS__));
	}
}
