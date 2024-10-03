<?php

declare(strict_types=1);

namespace JdeShipping\Dto;

use JMS\Serializer\Annotation as JMS;

class DocumentCode
{
	/**
	 * @JMS\Type("int")
	 * @JMS\SerializedName("LST_INDEX")
	 * @var int|null
	 */
	private ?int $lstIndex = null;

	/**
	 * @JMS\Type("string")
	 * @JMS\SerializedName("LST_NAME")
	 * @var string|null
	 */
	private ?string $lstName = null;

	/**
	 * Код услуги
	 *
	 * @return int|null
	 */
	public function getLstIndex(): ?int
	{
		return $this->lstIndex;
	}

	/**
	 * Код услуги
	 *
	 * @param int|null  $lstIndex  Код услуги
	 *
	 * @return static
	 */
	public function setLstIndex($lstIndex): self
	{
		$this->lstIndex = $lstIndex;

		return $this;
	}

	/**
	 * Наименование услуги
	 *
	 * @return string|null
	 */
	public function getLstName(): ?string
	{
		return $this->lstName;
	}

	/**
	 * Наименование услуги
	 *
	 * @param string|null  $lstName  Наименование услуги
	 *
	 * @return static
	 */
	public function setLstName($lstName): self
	{
		$this->lstName = $lstName;

		return $this;
	}
}
