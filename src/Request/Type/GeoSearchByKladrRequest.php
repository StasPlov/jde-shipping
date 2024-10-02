<?php

declare(strict_types=1);

namespace JdeShipping\Request\Type;

use JdeShipping\Dto\Location;
use JdeShipping\Dto\LocationByKladr;
use JdeShipping\Request\Request;

final class GeoSearchByKladrRequest extends Request
{
	const PRIVATE = true;
	const METHOD = 'GET';
	const URL = 'geo/MstByKladr';
	const DTO = LocationByKladr::class;

	/**
	 * @var string|null
	 */
	private ?string $kladrCode = null;

    /**
     * Get the value of kladrCode
     *
     * @return string|null
     */
    public function getKladrCode(): ?string {
        return $this->kladrCode;
    }

    /**
     * Set the value of kladrCode
     *
     * @param string|null  $kladrCode  
     *
     * @return self
     */
    public function setKladrCode($kladrCode): self {
        $this->kladrCode = $kladrCode;

        return $this;
    }
}
