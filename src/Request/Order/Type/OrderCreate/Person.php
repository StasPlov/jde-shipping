<?php

declare(strict_types=1);

namespace JdeShipping\Request\Order\Type\OrderCreate;

use JdeShipping\Request\Request;

class Person extends Request
{
	/**
	 * @var string|null
	 */
	private ?string $addr = null;

	/**
	 * @var string|null
	 */
	private ?string $title = null;

	/**
	 * @var int|null
	 */
	private ?int $own = null;

	/**
	 * @var string|null
	 */
	private ?string $phone = null;

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
	 * Get название
	 *
	 * @return string|null
	 */
	public function getTitle(): ?string
	{
		return $this->title;
	}

	/**
	 * Set название
	 *
	 * @param string|null  $title  Название
	 *
	 * @return static
	 */
	public function setTitle($title): self
	{
		$this->title = $title;

		return $this;
	}

	/**
	 * Get Форма собственности, числовое значение: 
	 * 
	 * 0 - Физ. лицо
	 * 1 - ООО
	 * 2 - ОАО
	 * 3 - ЗАО
	 * 4 - ИП
	 * 5 - ФГУ
	 * 6 - ФГУП
	 * 7 - МУП
	 * 8 - АНО
	 * 9 - ГУП
	 * 10 - НО
	 * 11 - Другое.
	 *
	 * @return int|null
	 */
	public function getOwn(): ?int
	{
		return $this->own;
	}

	/**
	 * Set Форма собственности, числовое значение: 
	 * 
	 * 0 - Физ. лицо
	 * 1 - ООО
	 * 2 - ОАО
	 * 3 - ЗАО
	 * 4 - ИП
	 * 5 - ФГУ
	 * 6 - ФГУП
	 * 7 - МУП
	 * 8 - АНО
	 * 9 - ГУП
	 * 10 - НО
	 * 11 - Другое.
	 *
	 * @param int|null  $own
	 *
	 * @return static
	 */
	public function setOwn($own): self
	{
		$this->own = $own;

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
}
