<?php

declare(strict_types=1);

namespace JdeShipping\Dto;

use JMS\Serializer\Annotation as JMS;

class ShipmentRestriction
{
	/**
	 * @JMS\Type("int")
	 * @JMS\SerializedName("is_ok")
	 * @var int
	 */
	private int $isOk;

	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private string $info;

	/**
	 * Get the value of isOk
	 *
	 * @return bool
	 */
	public function getIsOk(): bool
	{
		return $this->isOk === "1";
	}

	/**
	 * Set Признак выполнения запроса 
	 * 
	 * 1 - Успешно 
	 * -1 - Неуспешно
	 *
	 * @param int  $isOk  
	 *
	 * @return static
	 */
	public function setIsOk(int $isOk): self
	{
		$this->isOk = $isOk;

		return $this;
	}

	/**
	 * Get Сообщение о событии выполнения запроса
	 *
	 * @return string
	 */
	public function getInfo(): string
	{
		return $this->info;
	}

	/**
	 * Set Сообщение о событии выполнения запроса
	 *
	 * @param string  $info Сообщение о событии выполнения запроса
	 *
	 * @return static
	 */
	public function setInfo(string $info): self
	{
		$this->info = $info;

		return $this;
	}
}
