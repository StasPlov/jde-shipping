<?php

declare(strict_types=1);

namespace JdeShipping\Request\Order\Type\OrderCreate;

class PersonSender extends Person
{
	/**
	 * @var string|null
	 */
	private ?string $inn = null;

	/**
	 * @var string|null
	 */
	private ?string $kpp = null;

	/**
	 * @var string|null
	 */
	private ?string $email = null;

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
	private ?string $workhours = null;

	/**
	 * @var Store|null
	 */
	private ?Store $store = null;

	/**
	 * Get иНН
	 *
	 * @return string|null
	 */
	public function getInn(): ?string
	{
		return $this->inn;
	}

	/**
	 * Set иНН
	 *
	 * @param string|null  $inn  ИНН
	 *
	 * @return static
	 */
	public function setInn($inn): self
	{
		$this->inn = $inn;

		return $this;
	}

	/**
	 * Get кПП
	 *
	 * @return string|null
	 */
	public function getKpp(): ?string
	{
		return $this->kpp;
	}

	/**
	 * Set кПП
	 *
	 * @param string|null  $kpp  КПП
	 *
	 * @return static
	 */
	public function setKpp($kpp): self
	{
		$this->kpp = $kpp;

		return $this;
	}

	/**
	 * Get электронная почта
	 *
	 * @return string|null
	 */
	public function getEmail(): ?string
	{
		return $this->email;
	}

	/**
	 * Set электронная почта
	 *
	 * @param string|null  $email  Электронная почта
	 *
	 * @return static
	 */
	public function setEmail($email): self
	{
		$this->email = $email;

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
	 * Get рабочие часы (10:00-17:00)
	 *
	 * @return string|null
	 */
	public function getWorkhours(): ?string
	{
		return $this->workhours;
	}

	/**
	 * Set рабочие часы (10:00-17:00)
	 *
	 * @param string|null  $workhours  Рабочие часы (10:00-17:00)
	 *
	 * @return static
	 */
	public function setWorkhours($workhours): self
	{
		$this->workhours = $workhours;

		return $this;
	}

	/**
	 * Get информация о складе
	 *
	 * @return Store|null
	 */
	public function getStore(): ?Store
	{
		return $this->store;
	}

	/**
	 * Set информация о складе
	 *
	 * @param Store|null  $store  Информация о складе
	 *
	 * @return static
	 */
	public function setStore($store): self
	{
		$this->store = $store;

		return $this;
	}
}
