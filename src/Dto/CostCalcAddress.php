<?php

declare(strict_types=1);

namespace JdeShipping\Dto;

use JMS\Serializer\Annotation as JMS;

class CostCalcAddress extends CostCalc
{
	/**
	 * @JMS\Type("JdeShipping\Dto\CostAddress")
	 * @var CostAddress|null
	 */
	private ?CostAddress $from = null;

	/**
	 * @JMS\Type("JdeShipping\Dto\CostAddress")
	 * @var CostAddress|null
	 */
	private ?CostAddress $to = null;

	/**
	 * Get the value of from
	 *
	 * @return CostAddress|null
	 */
	public function getFrom(): ?CostAddress
	{
		return $this->from;
	}

	/**
	 * Set the value of from
	 *
	 * @param CostAddress|null  $from  
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
	 * @return CostAddress|null
	 */
	public function getTo(): ?CostAddress
	{
		return $this->to;
	}

	/**
	 * Set the value of to
	 *
	 * @param CostAddress|null  $to  
	 *
	 * @return self
	 */
	public function setTo($to): self
	{
		$this->to = $to;

		return $this;
	}
}
