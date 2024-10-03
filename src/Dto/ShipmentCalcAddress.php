<?php

declare(strict_types=1);

namespace JdeShipping\Dto;

use JMS\Serializer\Annotation as JMS;

class ShipmentCalcAddress extends ShipmentCalc
{
	/**
	 * @JMS\Type("JdeShipping\Dto\ShipmentAddress")
	 * @var ShipmentAddress|null
	 */
	private ?ShipmentAddress $from = null;

	/**
	 * @JMS\Type("JdeShipping\Dto\ShipmentAddress")
	 * @var ShipmentAddress|null
	 */
	private ?ShipmentAddress $to = null;

	/**
	 * Get the value of from
	 *
	 * @return ShipmentAddress|null
	 */
	public function getFrom(): ?ShipmentAddress
	{
		return $this->from;
	}

	/**
	 * Set the value of from
	 *
	 * @param ShipmentAddress|null  $from  
	 *
	 * @return self
	 */
	public function setFrom($from): self
	{
		$this->from = $from;

		return $this;
	}

	/**
	 * Get the value of to
	 *
	 * @return ShipmentAddress|null
	 */
	public function getTo(): ?ShipmentAddress
	{
		return $this->to;
	}

	/**
	 * Set the value of to
	 *
	 * @param ShipmentAddress|null  $to  
	 *
	 * @return self
	 */
	public function setTo($to): self
	{
		$this->to = $to;

		return $this;
	}
}
