<?php

namespace CoreBundle\Service\Record;

use DateTime;
use CoreBundle\Entity\TrainType;


/**
 * Interface RecordDefaultValuesInterface
 */
interface RecordDefaultValuesInterface
{

    /**
     * @return TrainType
     */
    public function getDefaultType(): TrainType;

    /**
     * @return int
     */
    public function getDefaultTrainNumber(): int;

    /**
     * @return int
     */
    public function getDefaultApproachNumber(): int;

    /**
     * @return float
     */
    public function getDefaultValue(): float;

    /**
     * @return float
     */
    public function getDefaultWeight(): float;

    /**
     * @return DateTime
     */
    public function getDefaultTime(): DateTime;

}
