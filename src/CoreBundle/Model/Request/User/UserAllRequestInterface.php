<?php

namespace CoreBundle\Model\Request\User;


/**
 * Interface UserAllRequestInterface
 *
 * @method bool hasName()
 * @method bool hasCurrentTrain()
 * @method bool hasCurrentApproach()
 */
interface UserAllRequestInterface
{

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name
     * @return string
     */
    public function setName(string $name);

    /**
     * @return int
     */
    public function getCurrentTrain(): int;

    /**
     * @param int $currentTrain
     * @return int
     */
    public function setCurrentTrain(int $currentTrain);

    /**
     * @return int
     */
    public function getCurrentApproach(): int;

    /**
     * @param int $currentApproach
     * @return int
     */
    public function setCurrentApproach(int $currentApproach);

}
