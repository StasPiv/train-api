<?php

namespace CoreBundle\Service\User;


/**
 * Interface UserDefaultValuesInterface
 */
interface UserDefaultValuesInterface
{

    /**
     * @return string
     */
    public function getDefaultName(): string;

    /**
     * @return int
     */
    public function getDefaultCurrentTrain(): int;

    /**
     * @return int
     */
    public function getDefaultCurrentApproach(): int;

}
