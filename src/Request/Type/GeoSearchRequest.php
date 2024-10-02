<?php

declare(strict_types=1);

namespace JdeShipping\Request\Type;

use JdeShipping\Dto\Location;
use JdeShipping\Request\Request;

final class GeoSearchRequest extends Request
{
	const PRIVATE = false;
	const METHOD = 'GET';
	const URL = 'geo/search';
	const DTO = Location::class;

	/**
	 * @var int|null
	 */
	private $mode = null; 

    /**
     * Get the value of mode
     *
     * @return int|null
     */
    public function getMode(): ?int {
        return $this->mode;
    }

    /**
     * Set the value of mode
     *
     * @param int|null  $mode  
     *
     * @return self
     */
    public function setMode($mode): self {
        $this->mode = $mode;

        return $this;
    }
}
