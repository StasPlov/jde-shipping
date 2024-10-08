<?php

declare(strict_types=1);

namespace JdeShipping\Request\Shipment;

use JdeShipping\Dto\ShipmentCalc;

final class ShipmentCostCalcRequest extends ShipmentCostCalcAbstract
{
	const PRIVATE = true;
	const METHOD = 'GET';
	const URL = 'calculator/price';
	const DTO = ShipmentCalc::class;

	/**
	 * @var string|null
	 */
	private ?string $from = null;

	/**
	 * @var string|null
	 */
	private ?string $to = null;

	/**
	 * @var bool|null
	 */
	private ?bool $smart = null;

	/**
	 * Get идентификатор филиала откуда отправляется груз (Обязательный параметр)
	 *
	 * @return string|null
	 */
	public function getFrom(): ?string
	{
		return $this->from;
	}

	/**
	 * Set идентификатор филиала откуда отправляется груз (Обязательный параметр)
	 *
	 * @param string|null  $from  Идентификатор филиала откуда отправляется груз (Обязательный параметр)
	 *
	 * @return static
	 */
	public function setFrom($from): self
	{
		$this->from = $from;

		return $this;
	}

	/**
	 * Get список филиалов можно получить с помощью getGeoSearchRequest()
	 *
	 * @return string|null
	 */
	public function getTo(): ?string
	{
		return $this->to;
	}

	/**
	 * Set список филиалов можно получить с помощью getGeoSearchRequest()
	 *
	 * @param string|null  $to  Список филиалов можно получить с помощью getGeoSearchRequest()
	 *
	 * @return static
	 */
	public function setTo($to): self
	{
		$this->to = $to;

		return $this;
	}

	/**
	 * Get Параметр для распознования городов по названию
	 *
	 * @return bool|null
	 */
	public function getSmart(): ?bool
	{
		return $this->smart;
	}

	/**
	 * Set Параметр для распознования городов по названию
	 *
	 * @param bool|null  $smart  Параметр для распознования городов по названию
	 *
	 * @return static
	 */
	public function setSmart($smart): self
	{
		$this->smart = $smart;

		return $this;
	}
}
