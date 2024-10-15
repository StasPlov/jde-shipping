<?php

declare(strict_types=1);

namespace JdeShipping\Request\Shipment;

use JdeShipping\Dto\ShipmentRestriction;
use JdeShipping\Request\Request;

final class ShipmentSetRestrictionRequest extends Request
{
	const PRIVATE = true;
	const METHOD = 'GET';
	const URL = 'cargos/SetZapretTTN';
	const DTO = ShipmentRestriction::class;

	/**
	 * @var int|null
	 */
	private ?int $ttn = null;

	/**
	 * Get номер ТТН
	 *
	 * @return int|null
	 */
	public function getTtn(): ?int
	{
		return $this->ttn;
	}

	/**
	 * Set номер ТТН
	 *
	 * @param int|null $ttn Номер ТТН
	 *
	 * @return static
	 */
	public function setTtn(int $ttn): self
	{
		$this->ttn = $ttn;

		return $this;
	}
}
