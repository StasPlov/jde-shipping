<?php

declare(strict_types=1);

namespace JdeShipping\Request\Order\Type\OrderCreate;

class PersonReceiver extends Person
{
	/**
	 * @var string|null
	 */
	private ?string $pass = null;

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
	 * @var Store|null
	 */
	private ?Store $store = null;

	/**
	 * Get паспорт
	 *
	 * @return string|null
	 */
	public function getPass(): ?string
	{
		return $this->pass;
	}

	/**
	 * Set паспорт
	 *
	 * @param string|null  $pass  Паспорт
	 *
	 * @return static
	 */
	public function setPass($pass): self
	{
		$this->pass = $pass;

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
