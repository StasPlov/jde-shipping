<?php

declare(strict_types=1);

namespace JdeShipping\Dto;

use JMS\Serializer\Annotation as JMS;

class City
{
	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private string $code;

	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private string $title;

	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private string $kladrCode;

	/**
	 * @JMS\Type("string")
	 * @var string
	 */
	private string $aexOnly;

	/**
	 * @JMS\Type("JdeShipping\Dto\Cords")
	 * @var Cords
	 */
	private Cords $coords;

    /**
     * Get the value of code
     *
     * @return string
     */
    public function getCode(): string {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @param string  $code  
     *
     * @return self
     */
    public function setCode(string $code): self {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of title
     *
     * @return string
     */
    public function getTitle(): string {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @param string  $title  
     *
     * @return self
     */
    public function setTitle(string $title): self {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of kladrCode
     *
     * @return string
     */
    public function getKladrCode(): string {
        return $this->kladrCode;
    }

    /**
     * Set the value of kladrCode
     *
     * @param string  $kladrCode  
     *
     * @return self
     */
    public function setKladrCode(string $kladrCode): self {
        $this->kladrCode = $kladrCode;

        return $this;
    }

    /**
     * Get the value of aexOnly
     *
     * @return string
     */
    public function getAexOnly(): string {
        return $this->aexOnly;
    }

    /**
     * Set the value of aexOnly
     *
     * @param string  $aexOnly  
     *
     * @return self
     */
    public function setAexOnly(string $aexOnly): self {
        $this->aexOnly = $aexOnly;

        return $this;
    }

    /**
     * Get the value of coords
     *
     * @return Cords
     */
    public function getCoords(): Cords {
        return $this->coords;
    }

    /**
     * Set the value of coords
     *
     * @param Cords  $coords  
     *
     * @return self
     */
    public function setCoords(Cords $coords): self {
        $this->coords = $coords;

        return $this;
    }
}
