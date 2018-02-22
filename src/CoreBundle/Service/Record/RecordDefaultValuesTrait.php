<?php

namespace CoreBundle\Service\Record;

use DateTime;
use CoreBundle\Entity\TrainType;


/**
 * Trait RecordDefaultValuesTrait
 */
trait RecordDefaultValuesTrait
{

    /**
     * @return TrainType
     */
    public function getDefaultType(): TrainType
    {
        throw new \RuntimeException('You must set type');
    }

    /**
     * @return int
     */
    public function getDefaultTrainNumber(): int
    {
        throw new \RuntimeException('You must set train number');
    }

    /**
     * @return int
     */
    public function getDefaultApproachNumber(): int
    {
        throw new \RuntimeException('You must set approach number');
    }

    /**
     * @return float
     */
    public function getDefaultValue(): float
    {
        throw new \RuntimeException('You must set value');
    }

    /**
     * @return DateTime
     */
    public function getDefaultTime(): DateTime
    {
        return new \DateTime();
    }

}
