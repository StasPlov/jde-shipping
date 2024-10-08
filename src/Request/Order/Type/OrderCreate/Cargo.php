<?php

declare(strict_types=1);

namespace JdeShipping\Request\Order\Type\OrderCreate;

use JdeShipping\Request\Request;

class Cargo extends Request
{
	/**
	 * @var int|null
	 */
	private ?int $id = null;

	/**
	 * @var string|null
	 */
	private ?string $pack = null;

	/**
	 * @var string|null
	 */
	private ?string $code = null;

	/**
	 * Вес, кг
	 * @var float|null
	 */
	private ?float $weight = null;

	/**
	 * @var float|null
	 */
	private ?float $length = null;

	/**
	 * @var float|null
	 */
	private ?float $width = null;

	/**
	 * @var float|null
	 */
	private ?float $height = null;

	/**
	 * @var int|null
	 */
	private ?int $insValue = null;

	/**
	 * @var int|null
	 */
	private ?int $cashondel = null;

	/**
	 * Get идентификатор груза Клиента в рамках запроса.
	 *
	 * @return int|null
	 */
	public function getId(): ?int
	{
		return $this->id;
	}

	/**
	 * Set идентификатор груза Клиента в рамках запроса.
	 *
	 * @param int|null  $id  Идентификатор груза Клиента в рамках запроса.
	 *
	 * @return static
	 */
	public function setId($id): self
	{
		$this->id = $id;

		return $this;
	}

	/**
	 * Get код упаковки в которой находится груз.
	 *
	 * @return string|null
	 */
	public function getPack(): ?string
	{
		return $this->pack;
	}

	/**
	 * Set код упаковки в которой находится груз.
	 *
	 * @param string|null  $pack  Код упаковки в которой находится груз.
	 *
	 * @return static
	 */
	public function setPack($pack): self
	{
		$this->pack = $pack;

		return $this;
	}

	/**
	 * Get была выполнена самостоятельно
	 *
	 * @return string|null
	 */
	public function getCode(): ?string
	{
		return $this->code;
	}

	/**
	 * Set была выполнена самостоятельно
	 *
	 * @param string|null  $code  была выполнена самостоятельно
	 *
	 * @return static
	 */
	public function setCode($code): self
	{
		$this->code = $code;

		return $this;
	}

	/**
	 * Get вес, кг
	 *
	 * @return float|null
	 */
	public function getWeight(): ?float
	{
		return $this->weight;
	}

	/**
	 * Set вес, кг
	 *
	 * @param float|null  $weight  Вес, кг
	 *
	 * @return static
	 */
	public function setWeight($weight): self
	{
		$this->weight = $weight;

		return $this;
	}

	/**
	 * Get длина, м
	 *
	 * @return float|null
	 */
	public function getLength(): ?float
	{
		return $this->length;
	}

	/**
	 * Set длина, м
	 *
	 * @param float|null  $length  Длина, м
	 *
	 * @return static
	 */
	public function setLength($length): self
	{
		$this->length = $length;

		return $this;
	}

	/**
	 * Get ширина, м
	 *
	 * @return float|null
	 */
	public function getWidth(): ?float
	{
		return $this->width;
	}

	/**
	 * Set ширина, м
	 *
	 * @param float|null  $width  Ширина, м
	 *
	 * @return static
	 */
	public function setWidth($width): self
	{
		$this->width = $width;

		return $this;
	}

	/**
	 * Get высота
	 *
	 * @return float|null
	 */
	public function getHeight(): ?float
	{
		return $this->height;
	}

	/**
	 * Set высота
	 *
	 * @param float|null  $height  Высота
	 *
	 * @return static
	 */
	public function setHeight($height): self
	{
		$this->height = $height;

		return $this;
	}

	/**
	 * Get объявленная ценность
	 *
	 * @return int|null
	 */
	public function getInsValue(): ?int
	{
		return $this->insValue;
	}

	/**
	 * Set объявленная ценность
	 *
	 * @param int|null  $insValue  Объявленная ценность
	 *
	 * @return static
	 */
	public function setInsValue($insValue): self
	{
		$this->insValue = $insValue;

		return $this;
	}

	/**
	 * Get наложенный платеж сумма
	 *
	 * @return int|null
	 */
	public function getCashondel(): ?int
	{
		return $this->cashondel;
	}

	/**
	 * Set наложенный платеж сумма
	 *
	 * @param int|null  $cashondel  Наложенный платеж сумма
	 *
	 * @return static
	 */
	public function setCashondel($cashondel): self
	{
		$this->cashondel = $cashondel;

		return $this;
	}
}
