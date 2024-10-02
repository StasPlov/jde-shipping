<?php

declare(strict_types=1);

namespace JdeShipping\Request\Type;

use JdeShipping\Dto\Schedule;
use JdeShipping\Request\Request;

final class GeoScheduleRequest extends Request
{
	const PRIVATE = false;
	const METHOD = 'GET';
	const URL = 'geo/schedule';
	const DTO = Schedule::class;

	/**
	 * @var string|null
	 */
	private ?string $code = null;

    /**
     * Get the value of code
     *
     * @return string|null
     */
    public function getCode(): ?string {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @param string|null  $code  
     *
     * @return self
     */
    public function setCode($code): self {
        $this->code = $code;

        return $this;
    }
}
