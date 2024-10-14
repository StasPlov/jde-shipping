<?php

declare(strict_types=1);

namespace JdeShipping\Request\Shipment;

use JdeShipping\Dto\ShipmentSimpleStatus;
use JdeShipping\Request\Request;

final class ShipmentStatusByCodeRequest extends Request
{
	const PRIVATE = true;
	const METHOD = 'GET';
	const URL = 'cargos/status-by-code';
	const DTO = ShipmentSimpleStatus::class;

	/**
	 * @var string|null
	 */
	private ?string $ttn = null;

	/**
	 * @var string|null
	 */
	private ?string $ref = null;

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

	/**
	 * Get внутренний номер заказа Клиента
	 *
	 * @return string|null
	 */
	public function getRef(): ?string
	{
		return $this->ref;
	}

	/**
	 * Set внутренний номер заказа Клиента
	 *
	 * @param string|null  $ref  Внутренний номер заказа Клиента
	 *
	 * @return static
	 */
	public function setRef($ref): self
	{
		$this->ref = $ref;

		return $this;
	}
}
