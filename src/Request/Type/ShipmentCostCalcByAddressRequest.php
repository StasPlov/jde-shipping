<?php

declare(strict_types=1);

namespace JdeShipping\Request\Type;

use JdeShipping\Dto\ShipmentCalcAddress;

final class ShipmentCostCalcByAddressRequest extends ShipmentCostCalcAbstract
{
	const PRIVATE = true;
	const METHOD = 'GET';
	const URL = 'calculator/PriceAddress';
	const DTO = ShipmentCalcAddress::class;

	/**
	 * @var string|null
	 */
	private ?string $addrFrom = null;

	/**
	 * @var string|null
	 */
	private ?string $fromKladr = null;

	/**
	 * @var string|null
	 */
	private ?string $addrTo = null;

	/**
	 * @var string|null
	 */
	private ?string $toKladr = null;

	/**
	 * Get адрес населенного пункта отправления
	 *
	 * @return string|null
	 */
	public function getAddrFrom(): ?string
	{
		return $this->addrFrom;
	}

	/**
	 * Set адрес населенного пункта отправления
	 *
	 * @param string|null  $addrFrom  Адрес населенного пункта отправления
	 *
	 * @return static
	 */
	public function setAddrFrom($addrFrom): self
	{
		$this->addrFrom = $addrFrom;

		return $this;
	}

	/**
	 * Get идентификатор КЛАДР населенного пункта отправления
	 *
	 * @return string|null
	 */
	public function getFromKladr(): ?string
	{
		return $this->fromKladr;
	}

	/**
	 * Set идентификатор КЛАДР населенного пункта отправления
	 *
	 * @param string|null  $fromKladr  Идентификатор КЛАДР населенного пункта отправления
	 *
	 * @return static
	 */
	public function setFromKladr($fromKladr): self
	{
		$this->fromKladr = $fromKladr;

		return $this;
	}

	/**
	 * Get адрес населенного пункта назначения
	 *
	 * @return string|null
	 */
	public function getAddrTo(): ?string
	{
		return $this->addrTo;
	}

	/**
	 * Set адрес населенного пункта назначения
	 *
	 * @param string|null  $addrTo  Адрес населенного пункта назначения
	 *
	 * @return static
	 */
	public function setAddrTo($addrTo): self
	{
		$this->addrTo = $addrTo;

		return $this;
	}

	/**
	 * Get идентификатор КЛАДР населенного пункта назначения
	 *
	 * @return string|null
	 */
	public function getToKladr(): ?string
	{
		return $this->toKladr;
	}

	/**
	 * Set идентификатор КЛАДР населенного пункта назначения
	 *
	 * @param string|null  $toKladr  Идентификатор КЛАДР населенного пункта назначения
	 *
	 * @return static
	 */
	public function setToKladr($toKladr): self
	{
		$this->toKladr = $toKladr;

		return $this;
	}
}
