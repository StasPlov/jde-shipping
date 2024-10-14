<?php

declare(strict_types=1);

namespace JdeShipping\Request\Shipment;

use JdeShipping\Dto\ShipmentNewStatus;
use JdeShipping\Request\Request;

final class ShipmentNewStatusRequest extends Request
{
	const PRIVATE = true;
	const METHOD = 'GET';
	const URL = 'cargos/SetZapretTTN';
	const DTO = ShipmentNewStatus::class;

	/**
	 * @var int|null
	 */
	private ?int $ttn = null;

	/**
	 * Get номер ТТН
	 *
	 * @return string|null
	 */
	public function getTtn(): ?string
	{
		return $this->ttn;
	}

	/**
	 * Set номер ТТН
	 *
	 * @param string|null  $ttn  Номер ТТН
	 *
	 * @return static
	 */
	public function setTtn($ttn): self
	{
		$this->ttn = $ttn;

		return $this;
	}
}
