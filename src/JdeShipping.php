<?php

declare(strict_types=1);

namespace JdeShipping;

use JdeShipping\Client\Client;

/** 
 * Тут отпеделяем динамические методы
 * 
 * @method Dto\Location[] getGeoSearchRequest(Request\Type\GeoSearchRequest $request);
 * @method Dto\LocationByKladr[] getGeoSearchByKladrRequest(Request\Type\GeoSearchByKladrRequest $request);
 * @method Dto\City[] getGeoCitySearchRequest(Request\Type\GeoCitySearchRequest $request);
 * @method Dto\Schedule[] getGeoScheduleRequest(Request\Type\GeoScheduleRequest $request);
 * 
 * @method Dto\ShipmentCalcAddress getShipmentCostCalcByAddressRequest(Request\Type\ShipmentCostCalcByAddressRequest $request);
 * @method Dto\ShipmentCalc getShipmentCostCalcRequest(Request\Type\ShipmentCostCalcRequest $request);
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

	public function __call(string $name, array $arguments)
	{
		if (0 === \strpos($name, 'get')) {
			return $this->request(...$arguments);
		}

		throw new \BadMethodCallException(\sprintf('Method [%s] not found in [%s].', $name, __CLASS__));
	}
}
