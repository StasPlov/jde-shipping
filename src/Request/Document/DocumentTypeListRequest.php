<?php

declare(strict_types=1);

namespace JdeShipping\Request\Document;

use JdeShipping\Dto\DocumentType;
use JdeShipping\Request\Request;

final class DocumentTypeListRequest extends Request
{
	const PRIVATE = false;
	const METHOD = 'GET';
	const URL = 'docs/documentlistavailable';
	const DTO = DocumentType::class;
}
