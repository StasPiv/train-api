<?php

namespace CoreBundle\Model\Request\Record;

use DateTime;
use CoreBundle\Entity\TrainType;


/**
 * Interface RecordAllRequestInterface
 *
 * @method bool hasType()
 * @method bool hasTrainNumber()
 * @method bool hasApproachNumber()
 * @method bool hasValue()
 * @method bool hasTime()
 */
interface RecordAllRequestInterface
{

    /**
     * @return TrainType
     */
    public function getType(): TrainType;

    /**
     * @param TrainType $type
     * @return RecordAllRequestInterface
     */
    public function setType(TrainType $type): RecordAllRequestInterface;

    /**
     * @return int
     */
    public function getTrainNumber(): int;

    /**
     * @param int $trainNumber
     * @return int
     */
    public function setTrainNumber(int $trainNumber);

    /**
     * @return int
     */
    public function getApproachNumber(): int;

    /**
     * @param int $approachNumber
     * @return int
     */
    public function setApproachNumber(int $approachNumber);

    /**
     * @return float
     */
    public function getValue(): float;

    /**
     * @param float $value
     * @return float
     */
    public function setValue(float $value);

    /**
     * @return DateTime
     */
    public function getTime(): DateTime;

    /**
     * @param DateTime $time
     * @return DateTime
     */
    public function setTime(DateTime $time);

}
