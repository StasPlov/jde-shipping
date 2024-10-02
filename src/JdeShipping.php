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
 */
final class JdeShipping extends Client
{
	public function __call(string $name, array $arguments)
	{
		if (0 === \strpos($name, 'get')) {
			return $this->request(...$arguments);
		}

		throw new \BadMethodCallException(\sprintf('Method [%s] not found in [%s].', $name, __CLASS__));
	}
}
