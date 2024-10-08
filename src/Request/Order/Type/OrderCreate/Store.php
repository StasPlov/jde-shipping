<?php

declare(strict_types=1);

namespace JdeShipping\Request\Order\Type\OrderCreate;

use JdeShipping\Request\Request;

class Store extends Request
{
	/**
	 * @var string|null
	 */
	private ?string $addr = null;

	/**
	 * @var string|null
	 */
	private ?string $workhours = null;

	/**
	 * @var float|null
	 */
	private ?float $lat = null;

	/**
	 * @var float|null
	 */
	private ?float $lng = null;

	/**
	 * @var string|null
	 */
	private ?string $dinner = null;

	/**
	 * @var string|null
	 */
	private ?string $contact = null;

	/**
	 * @var string|null
	 */
	private ?string $phone = null;

	/**
	 * @var string|null
	 */
	private ?string $warrant = null;

	/**
	 * Get адрес
	 *
	 * @return string|null
	 */
	public function getAddr(): ?string
	{
		return $this->addr;
	}

	/**
	 * Set адрес
	 *
	 * @param string|null  $addr  Адрес
	 *
	 * @return static
	 */
	public function setAddr($addr): self
	{
		$this->addr = $addr;

		return $this;
	}

	/**
	 * Get рабочие часы (пример: 10:00-17:00)
	 *
	 * @return string|null
	 */
	public function getWorkhours(): ?string
	{
		return $this->workhours;
	}

	/**
	 * Set рабочие часы (пример: 10:00-17:00)
	 *
	 * @param string|null  $workhours  Рабочие часы (пример: 10:00-17:00)
	 *
	 * @return static
	 */
	public function setWorkhours($workhours): self
	{
		$this->workhours = $workhours;

		return $this;
	}

	/**
	 * Get широта
	 *
	 * @return float|null
	 */
	public function getLat(): ?float
	{
		return $this->lat;
	}

	/**
	 * Set широта
	 *
	 * @param float|null  $lat  Широта
	 *
	 * @return static
	 */
	public function setLat($lat): self
	{
		$this->lat = $lat;

		return $this;
	}

	/**
	 * Get долгота
	 *
	 * @return float|null
	 */
	public function getLng(): ?float
	{
		return $this->lng;
	}

	/**
	 * Set долгота
	 *
	 * @param float|null  $lng  Долгота
	 *
	 * @return static
	 */
	public function setLng($lng): self
	{
		$this->lng = $lng;

		return $this;
	}

	/**
	 * Get перерыв на обед (пример: 13:00-14:00)
	 *
	 * @return string|null
	 */
	public function getDinner(): ?string
	{
		return $this->dinner;
	}

	/**
	 * Set перерыв на обед (пример: 13:00-14:00)
	 *
	 * @param string|null  $dinner  Перерыв на обед (пример: 13:00-14:00)
	 *
	 * @return static
	 */
	public function setDinner($dinner): self
	{
		$this->dinner = $dinner;

		return $this;
	}

	/**
	 * Get контактное лицо
	 *
	 * @return string|null
	 */
	public function getContact(): ?string
	{
		return $this->contact;
	}

	/**
	 * Set контактное лицо
	 *
	 * @param string|null  $contact  Контактное лицо
	 *
	 * @return static
	 */
	public function setContact($contact): self
	{
		$this->contact = $contact;

		return $this;
	}

	/**
	 * Get телефон
	 *
	 * @return string|null
	 */
	public function getPhone(): ?string
	{
		return $this->phone;
	}

	/**
	 * Set телефон
	 *
	 * @param string|null  $phone  Телефон
	 *
	 * @return static
	 */
	public function setPhone($phone): self
	{
		$this->phone = $phone;

		return $this;
	}

	/**
	 * Get доверенность
	 *
	 * @return string|null
	 */
	public function getWarrant(): ?string
	{
		return $this->warrant;
	}

	/**
	 * Set доверенность
	 *
	 * @param string|null  $warrant  Доверенность
	 *
	 * @return static
	 */
	public function setWarrant($warrant): self
	{
		$this->warrant = $warrant;

		return $this;
	}
}
