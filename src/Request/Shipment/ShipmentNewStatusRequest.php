<?php

declare(strict_types=1);

namespace JdeShipping\Request\Shipment;

use JdeShipping\Dto\ShipmentNewStatus;
use JdeShipping\Request\Request;

final class ShipmentNewStatusRequest extends Request
{
	const PRIVATE = true;
	const METHOD = 'GET';
	const URL = 'cargos/StatusOnlyNew';
	const DTO = ShipmentNewStatus::class;

	/**
	 * @var int|null
	 */
	private ?int $days = null;

	/**
	 * @var string|null
	 */
	private ?string $date = null;

	/**
	 * @var string|null
	 */
	private ?string $time = null;

	/**
	 * Get период, за который были приняты отправления по которым будет возвращаться статус. Значение по умолчанию - 30 дней
	 *
	 * @return int|null
	 */
	public function getDays(): ?int
	{
		return $this->days;
	}

	/**
	 * Set период, за который были приняты отправления по которым будет возвращаться статус. Значение по умолчанию - 30 дней
	 *
	 * @param int|null  $days  Период, за который были приняты отправления по которым будет возвращаться статус. Значение по умолчанию - 30 дней
	 *
	 * @return static
	 */
	public function setDays($days): self
	{
		$this->days = $days;

		return $this;
	}

	/**
	 * Get дата, начиная с которой необходимо получить обновленные данные. Значение по умолчанию - текущая дата.
	 *
	 * @return string|null
	 */
	public function getDate(): ?string
	{
		return $this->date;
	}

	/**
	 * Set дата, начиная с которой необходимо получить обновленные данные. Значение по умолчанию - текущая дата.
	 *
	 * @param string|null  $date  Дата, начиная с которой необходимо получить обновленные данные. Значение по умолчанию - текущая дата.
	 *
	 * @return static
	 */
	public function setDate($date): self
	{
		$this->date = $date;

		return $this;
	}

	/**
	 * Get дата, начиная с которой необходимо получить обновленные данные. Значение по умолчанию - текущая дата.
	 *
	 * @return string|null
	 */
	public function getTime(): ?string
	{
		return $this->time;
	}

	/**
	 * Set дата, начиная с которой необходимо получить обновленные данные. Значение по умолчанию - текущая дата.
	 *
	 * @param string|null  $time  Дата, начиная с которой необходимо получить обновленные данные. Значение по умолчанию - текущая дата.
	 *
	 * @return static
	 */
	public function setTime($time): self
	{
		$this->time = $time;

		return $this;
	}
}
