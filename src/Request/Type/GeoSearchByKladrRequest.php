<?php

declare(strict_types=1);

namespace JdeShipping\Request\Type;

use JdeShipping\Dto\Location;
use JdeShipping\Request\Request;

final class GeoSearchByKladrRequest extends Request
{
	const PRIVATE = true;
	const METHOD = 'GET';
	const URL = 'geo/MstByKladr';
	const DTO = Location::class;
}
