<?php

namespace CoreBundle\Model\Request\Record;

use DateTime;
use CoreBundle\Entity\TrainType;


/**
 * Trait RecordAllRequestTrait
 */
trait RecordAllRequestTrait
{

    /**
     * @var TrainType
     */
    protected $type;

    /**
     * @var int
     */
    protected $trainNumber;

    /**
     * @var int
     */
    protected $approachNumber;

    /**
     * @var float
     */
    protected $value;

    /**
     * @var float
     */
    protected $weight = 0;

    /**
     * @var DateTime
     */
    protected $time;

    /**
     * @inheritDoc
     */
    public function __construct()
    {
    
    }

    /**
     * @return TrainType
     */
    public function getType(): TrainType
    {
        return $this->type;
    }

    /**
     * @param TrainType $type
     * @return RecordAllRequestTrait
     */
    public function setType(TrainType $type): RecordAllRequestInterface
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return int
     */
    public function getTrainNumber(): int
    {
        return $this->trainNumber;
    }

    /**
     * @param int $trainNumber
     */
    public function setTrainNumber(int $trainNumber)
    {
        $this->trainNumber = $trainNumber;
    }

    /**
     * @return int
     */
    public function getApproachNumber(): int
    {
        return $this->approachNumber;
    }

    /**
     * @param int $approachNumber
     */
    public function setApproachNumber(int $approachNumber)
    {
        $this->approachNumber = $approachNumber;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @param float $value
     */
    public function setValue(float $value)
    {
        $this->value = $value;
    }

    /**
     * @return float
     */
    public function getWeight(): float
    {
        return $this->weight;
    }

    /**
     * @param float $weight
     * @return RecordAllRequestTrait
     */
    public function setWeight($weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getTime(): DateTime
    {
        return $this->time;
    }

    /**
     * @param DateTime $time
     */
    public function setTime(DateTime $time)
    {
        $this->time = $time;
    }

}
