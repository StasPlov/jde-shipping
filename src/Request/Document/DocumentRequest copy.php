<?php

declare(strict_types=1);

namespace JdeShipping\Request\Document;

use JdeShipping\Dto\Document;
use JdeShipping\Request\Request;

final class DocumentRequest extends Request
{
	const PRIVATE = true;
	const METHOD = 'GET';
	const URL = 'docs/document';
	const DTO = Document::class;

	/**
	 * @var int|null
	 */
	private ?int $type = null;

	/**
	 * @var string|null
	 */
	private ?string $id = null;

	/**
	 * Получить код документа
	 *
	 * @return int|null
	 */
	public function getType(): ?int
	{
		return $this->type;
	}

	/**
	 * Установить код документа
	 *
	 * @param int|null $type Код документа
	 * @return static
	 */
	public function setType(?int $type): static
	{
		$this->type = $type;
		return $this;
	}

	/**
	 * Получить номер заявки или услуги
	 *
	 * @return string|null
	 */
	public function getId(): ?string
	{
		return $this->id;
	}

	/**
	 * Установить номер заявки или услуги
	 *
	 * @param string|null $id Номер заявки или услуги
	 * @return static
	 */
	public function setId(?string $id): static
	{
		$this->id = $id;
		return $this;
	}
}
