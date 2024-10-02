<?php

declare(strict_types=1);

namespace JdeShipping\Dto;

use JMS\Serializer\Annotation as JMS;

class LocationByKladr
{
	/**
	 * @JMS\Type("int")
	 * @JMS\SerializedName("MST_PR_PAY_IN")
	 * @var int
	 */
	private int $mstPrPayIn;

	/**
	 * @JMS\Type("float")
	 * @JMS\SerializedName("KG_DISTANCE")
	 * @var float
	 */
	private float $kgDistance;

	/**
	 * @JMS\Type("string")
	 * @JMS\SerializedName("MST_FEATURES")
	 * @var string
	 */
	private string $mstFeatures;

	/**
	 * @JMS\Type("int")
	 * @JMS\SerializedName("MAX_VES")
	 * @var int
	 */
	private int $maxVes;

	/**
	 * @JMS\Type("int")
	 * @JMS\SerializedName("MAX_OBYOM")
	 * @var int
	 */
	private int $maxObyom;

	/**
	 * @JMS\Type("int")
	 * @JMS\SerializedName("MAX_VES_GM")
	 * @var int
	 */
	private int $maxVesGm;

	/**
	 * @JMS\Type("int")
	 * @JMS\SerializedName("MAX_OBYOM_GM")
	 * @var int
	 */
	private int $maxObyomGm;

	/**
	 * @JMS\Type("int")
	 * @JMS\SerializedName("MAX_L_GM")
	 * @var int
	 */
	private int $maxLGm;

	/**
	 * @JMS\Type("float")
	 * @JMS\SerializedName("MAX_W_GM")
	 * @var float
	 */
	private float $maxWGm;

	/**
	 * @JMS\Type("float")
	 * @JMS\SerializedName("MAX_H_GM")
	 * @var float
	 */
	private float $maxHGm;

	/**
	 * @JMS\Type("int")
	 * @JMS\SerializedName("COUNTRY_CODE")
	 * @var int
	 */
	private int $countryCode;

	/**
	 * @JMS\Type("string")
	 * @JMS\SerializedName("CONTRY_NAME")
	 * @var string
	 */
	private string $contryName;

	/**
	 * @JMS\Type("int")
	 * @JMS\SerializedName("MST_PR_VIRT")
	 * @var int
	 */
	private int $mstPrVirt;

	/**
	 * @JMS\Type("int")
	 * @JMS\SerializedName("MST_PR_TRS")
	 * @var int
	 */
	private int $mstPrTrs;

	/**
	 * @JMS\Type("int")
	 * @JMS\SerializedName("MST_PR_TEPL")
	 * @var int
	 */
	private int $mstPrTepl;

	/**
	 * @JMS\Type("int")
	 * @JMS\SerializedName("ID_MST_OBJ")
	 * @var int
	 */
	private int $idMstObj;

	/**
	 * @JMS\Type("string")
	 * @JMS\SerializedName("MST_WEB_NAME")
	 * @var string
	 */
	private string $mstWebName;

	/**
	 * @JMS\Type("int")
	 * @JMS\SerializedName("MST_PR_PAY_OUT")
	 * @var int
	 */
	private int $mstPrPayOut;

	/**
	 * @JMS\Type("int")
	 * @JMS\SerializedName("distance")
	 * @var int
	 */
	private int $distance;

	/**
	 * @JMS\Type("int")
	 * @JMS\SerializedName("code")
	 * @var int
	 */
	private int $code;

	/**
	 * @JMS\Type("string")
	 * @JMS\SerializedName("title")
	 * @var string
	 */
	private string $title;

	/**
	 * @JMS\Type("int")
	 * @JMS\SerializedName("input")
	 * @var int
	 */
	private int $input;

	/**
	 * @JMS\Type("int")
	 * @JMS\SerializedName("output")
	 * @var int
	 */
	private int $output;

	/**
	 * @JMS\Type("int")
	 * @JMS\SerializedName("aex")
	 * @var int
	 */
	private int $aex;

	/**
	 * @JMS\Type("string")
	 * @JMS\SerializedName("addr")
	 * @var string
	 */
	private string $addr;

	/**
	 * @JMS\Type("JdeShipping\Dto\Cords")
	 * @JMS\SerializedName("coords")
	 * @var Cords
	 */
	private Cords $coords;

	/**
	 * Get the value of mstPrPayIn
	 *
	 * @return int
	 */
	public function getMstPrPayIn(): int
	{
		return $this->mstPrPayIn;
	}

	/**
	 * Set the value of mstPrPayIn
	 *
	 * @param int  $mstPrPayIn  
	 *
	 * @return self
	 */
	public function setMstPrPayIn(int $mstPrPayIn): self
	{
		$this->mstPrPayIn = $mstPrPayIn;

		return $this;
	}

	/**
	 * Get the value of mstFeatures
	 *
	 * @return string
	 */
	public function getMstFeatures(): string
	{
		return $this->mstFeatures;
	}

	/**
	 * Set the value of mstFeatures
	 *
	 * @param string  $mstFeatures  
	 *
	 * @return self
	 */
	public function setMstFeatures(string $mstFeatures): self
	{
		$this->mstFeatures = $mstFeatures;

		return $this;
	}

	/**
	 * Get the value of maxVes
	 *
	 * @return int
	 */
	public function getMaxVes(): int
	{
		return $this->maxVes;
	}

	/**
	 * Set the value of maxVes
	 *
	 * @param int  $maxVes  
	 *
	 * @return self
	 */
	public function setMaxVes(int $maxVes): self
	{
		$this->maxVes = $maxVes;

		return $this;
	}

	/**
	 * Get the value of maxObyom
	 *
	 * @return int
	 */
	public function getMaxObyom(): int
	{
		return $this->maxObyom;
	}

	/**
	 * Set the value of maxObyom
	 *
	 * @param int  $maxObyom  
	 *
	 * @return self
	 */
	public function setMaxObyom(int $maxObyom): self
	{
		$this->maxObyom = $maxObyom;

		return $this;
	}

	/**
	 * Get the value of maxVesGm
	 *
	 * @return int
	 */
	public function getMaxVesGm(): int
	{
		return $this->maxVesGm;
	}

	/**
	 * Set the value of maxVesGm
	 *
	 * @param int  $maxVesGm  
	 *
	 * @return self
	 */
	public function setMaxVesGm(int $maxVesGm): self
	{
		$this->maxVesGm = $maxVesGm;

		return $this;
	}

	/**
	 * Get the value of maxObyomGm
	 *
	 * @return int
	 */
	public function getMaxObyomGm(): int
	{
		return $this->maxObyomGm;
	}

	/**
	 * Set the value of maxObyomGm
	 *
	 * @param int  $maxObyomGm  
	 *
	 * @return self
	 */
	public function setMaxObyomGm(int $maxObyomGm): self
	{
		$this->maxObyomGm = $maxObyomGm;

		return $this;
	}

	/**
	 * Get the value of maxLGm
	 *
	 * @return int
	 */
	public function getMaxLGm(): int
	{
		return $this->maxLGm;
	}

	/**
	 * Set the value of maxLGm
	 *
	 * @param int  $maxLGm  
	 *
	 * @return self
	 */
	public function setMaxLGm(int $maxLGm): self
	{
		$this->maxLGm = $maxLGm;

		return $this;
	}

	/**
	 * Get the value of maxWGm
	 *
	 * @return float
	 */
	public function getMaxWGm(): float
	{
		return $this->maxWGm;
	}

	/**
	 * Set the value of maxWGm
	 *
	 * @param int  $maxWGm  
	 *
	 * @return self
	 */
	public function setMaxWGm(int $maxWGm): self
	{
		$this->maxWGm = $maxWGm;

		return $this;
	}

	/**
	 * Get the value of maxHGm
	 *
	 * @return float
	 */
	public function getMaxHGm(): float
	{
		return $this->maxHGm;
	}

	/**
	 * Set the value of maxHGm
	 *
	 * @param int  $maxHGm  
	 *
	 * @return self
	 */
	public function setMaxHGm(int $maxHGm): self
	{
		$this->maxHGm = $maxHGm;

		return $this;
	}

	/**
	 * Get the value of countryCode
	 *
	 * @return int
	 */
	public function getCountryCode(): int
	{
		return $this->countryCode;
	}

	/**
	 * Set the value of countryCode
	 *
	 * @param int  $countryCode  
	 *
	 * @return self
	 */
	public function setCountryCode(int $countryCode): self
	{
		$this->countryCode = $countryCode;

		return $this;
	}

	/**
	 * Get the value of contryName
	 *
	 * @return string
	 */
	public function getContryName(): string
	{
		return $this->contryName;
	}

	/**
	 * Set the value of contryName
	 *
	 * @param string  $contryName  
	 *
	 * @return self
	 */
	public function setContryName(string $contryName): self
	{
		$this->contryName = $contryName;

		return $this;
	}

	/**
	 * Get the value of mstPrVirt
	 *
	 * @return int
	 */
	public function getMstPrVirt(): int
	{
		return $this->mstPrVirt;
	}

	/**
	 * Set the value of mstPrVirt
	 *
	 * @param int  $mstPrVirt  
	 *
	 * @return self
	 */
	public function setMstPrVirt(int $mstPrVirt): self
	{
		$this->mstPrVirt = $mstPrVirt;

		return $this;
	}

	/**
	 * Get the value of mstPrTrs
	 *
	 * @return int
	 */
	public function getMstPrTrs(): int
	{
		return $this->mstPrTrs;
	}

	/**
	 * Set the value of mstPrTrs
	 *
	 * @param int  $mstPrTrs  
	 *
	 * @return self
	 */
	public function setMstPrTrs(int $mstPrTrs): self
	{
		$this->mstPrTrs = $mstPrTrs;

		return $this;
	}

	/**
	 * Get the value of mstPrTepl
	 *
	 * @return int
	 */
	public function getMstPrTepl(): int
	{
		return $this->mstPrTepl;
	}

	/**
	 * Set the value of mstPrTepl
	 *
	 * @param int  $mstPrTepl  
	 *
	 * @return self
	 */
	public function setMstPrTepl(int $mstPrTepl): self
	{
		$this->mstPrTepl = $mstPrTepl;

		return $this;
	}

	/**
	 * Get the value of idMstObj
	 *
	 * @return int
	 */
	public function getIdMstObj(): int
	{
		return $this->idMstObj;
	}

	/**
	 * Set the value of idMstObj
	 *
	 * @param int  $idMstObj  
	 *
	 * @return self
	 */
	public function setIdMstObj(int $idMstObj): self
	{
		$this->idMstObj = $idMstObj;

		return $this;
	}

	/**
	 * Get the value of mstWebName
	 *
	 * @return string
	 */
	public function getMstWebName(): string
	{
		return $this->mstWebName;
	}

	/**
	 * Set the value of mstWebName
	 *
	 * @param string  $mstWebName  
	 *
	 * @return self
	 */
	public function setMstWebName(string $mstWebName): self
	{
		$this->mstWebName = $mstWebName;

		return $this;
	}

	/**
	 * Get the value of mstPrPayOut
	 *
	 * @return int
	 */
	public function getMstPrPayOut(): int
	{
		return $this->mstPrPayOut;
	}

	/**
	 * Set the value of mstPrPayOut
	 *
	 * @param int  $mstPrPayOut  
	 *
	 * @return self
	 */
	public function setMstPrPayOut(int $mstPrPayOut): self
	{
		$this->mstPrPayOut = $mstPrPayOut;

		return $this;
	}

	/**
	 * Get the value of distance
	 *
	 * @return int
	 */
	public function getDistance(): int
	{
		return $this->distance;
	}

	/**
	 * Set the value of distance
	 *
	 * @param int  $distance  
	 *
	 * @return self
	 */
	public function setDistance(int $distance): self
	{
		$this->distance = $distance;

		return $this;
	}

	/**
	 * Get the value of code
	 *
	 * @return int
	 */
	public function getCode(): int
	{
		return $this->code;
	}

	/**
	 * Set the value of code
	 *
	 * @param int  $code  
	 *
	 * @return self
	 */
	public function setCode(int $code): self
	{
		$this->code = $code;

		return $this;
	}

	/**
	 * Get the value of title
	 *
	 * @return string
	 */
	public function getTitle(): string
	{
		return $this->title;
	}

	/**
	 * Set the value of title
	 *
	 * @param string  $title  
	 *
	 * @return self
	 */
	public function setTitle(string $title): self
	{
		$this->title = $title;

		return $this;
	}

	/**
	 * Get the value of input
	 *
	 * @return int
	 */
	public function getInput(): int
	{
		return $this->input;
	}

	/**
	 * Set the value of input
	 *
	 * @param int  $input  
	 *
	 * @return self
	 */
	public function setInput(int $input): self
	{
		$this->input = $input;

		return $this;
	}

	/**
	 * Get the value of output
	 *
	 * @return int
	 */
	public function getOutput(): int
	{
		return $this->output;
	}

	/**
	 * Set the value of output
	 *
	 * @param int  $output  
	 *
	 * @return self
	 */
	public function setOutput(int $output): self
	{
		$this->output = $output;

		return $this;
	}

	/**
	 * Get the value of aex
	 *
	 * @return int
	 */
	public function getAex(): int
	{
		return $this->aex;
	}

	/**
	 * Set the value of aex
	 *
	 * @param int  $aex  
	 *
	 * @return self
	 */
	public function setAex(int $aex): self
	{
		$this->aex = $aex;

		return $this;
	}

	/**
	 * Get the value of addr
	 *
	 * @return string
	 */
	public function getAddr(): string
	{
		return $this->addr;
	}

	/**
	 * Set the value of addr
	 *
	 * @param string  $addr  
	 *
	 * @return self
	 */
	public function setAddr(string $addr): self
	{
		$this->addr = $addr;

		return $this;
	}

	/**
	 * Get the value of kgDistance
	 *
	 * @return float
	 */
	public function getKgDistance(): float
	{
		return $this->kgDistance;
	}

	/**
	 * Set the value of kgDistance
	 *
	 * @param float  $kgDistance  
	 *
	 * @return self
	 */
	public function setKgDistance(float $kgDistance): self
	{
		$this->kgDistance = $kgDistance;

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
