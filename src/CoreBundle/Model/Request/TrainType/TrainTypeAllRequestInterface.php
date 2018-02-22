<?php

namespace CoreBundle\Model\Request\TrainType;


/**
 * Interface TrainTypeAllRequestInterface
 *
 * @method bool hasTitle()
 * @method bool hasPriority()
 */
interface TrainTypeAllRequestInterface
{

    /**
     * @return string
     */
    public function getTitle(): string;

    /**
     * @param string $title
     * @return string
     */
    public function setTitle(string $title);

    /**
     * @return int
     */
    public function getPriority(): int;

    /**
     * @param int $priority
     * @return int
     */
    public function setPriority(int $priority);

}
