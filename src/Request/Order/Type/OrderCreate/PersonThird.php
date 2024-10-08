<?php

declare(strict_types=1);

namespace JdeShipping\Request\Order\Type\OrderCreate;

class PersonThird extends Person
{
	/**
	 * @var string|null
	 */
	private ?string $city = null;

	/**
	 * @var string|null
	 */
	private ?string $inn = null;

	/**
	 * @var string|null
	 */
	private ?string $kpp = null;

	/**
	 * Get город
	 *
	 * @return string|null
	 */
	public function getCity(): ?string
	{
		return $this->city;
	}

	/**
	 * Set город
	 *
	 * @param string|null  $city  Город
	 *
	 * @return static
	 */
	public function setCity($city): self
	{
		$this->city = $city;

		return $this;
	}

	/**
	 * Get ИНН
	 *
	 * @return string|null
	 */
	public function getInn(): ?string
	{
		return $this->inn;
	}

	/**
	 * Set ИНН
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
	 * Get КПП
	 *
	 * @return string|null
	 */
	public function getKpp(): ?string
	{
		return $this->kpp;
	}

	/**
	 * Set КПП
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
}
