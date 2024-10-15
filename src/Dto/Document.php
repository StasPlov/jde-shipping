<?php

declare(strict_types=1);

namespace JdeShipping\Dto;

use JMS\Serializer\Annotation as JMS;

class Document
{
	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private string $name;

	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private string $data;

	/**
	 * Получить имя запрашиваемого файла
	 *
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * Установить имя запрашиваемого файла
	 *
	 * @param string $name Имя запрашиваемого файла
	 * @return static
	 */
	public function setName(string $name): self
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * Получить содержимое pdf файла в кодировке base64
	 *
	 * @return string
	 */
	public function getData(): string
	{
		return $this->data;
	}

	/**
	 * Установить содержимое pdf файла в кодировке base64
	 *
	 * @param string $data Содержимое pdf файла в кодировке base64
	 * @return static
	 */
	public function setData(string $data): self
	{
		$this->data = $data;
		return $this;
	}
}
