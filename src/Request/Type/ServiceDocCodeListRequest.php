<?php

declare(strict_types=1);

namespace JdeShipping\Request\Type;

use JdeShipping\Dto\DocumentCode;
use JdeShipping\Request\Request;

final class ServiceDocCodeListRequest extends Request
{
	const PRIVATE = false;
	const METHOD = 'GET';
	const URL = 'docs/documentServListAvailable';
	const DTO = DocumentCode::class;
}
