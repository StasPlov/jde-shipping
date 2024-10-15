<?php

declare(strict_types=1);

namespace JdeShipping\Dto;

use JMS\Serializer\Annotation as JMS;

class DocumentType
{
	/**
	 * @JMS\Type("int")
	 * @var int
	 */
	private int $type;

	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private string $name;

	/**
	 * Получить тип документа
	 *
	 * @return int
	 */
	public function getType(): int
	{
		return $this->type;
	}

	/**
	 * Установить тип документа
	 *
	 * @param int $type Тип документа
	 * @return static
	 */
	public function setType(int $type): self
	{
		$this->type = $type;
		return $this;
	}

	/**
	 * Получить название документа
	 *
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * Установить название документа
	 *
	 * @param string $name Название документа
	 * @return static
	 */
	public function setName(string $name): self
	{
		$this->name = $name;
		return $this;
	}
}
