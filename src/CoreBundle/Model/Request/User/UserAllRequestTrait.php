<?php

namespace CoreBundle\Model\Request\User;


/**
 * Trait UserAllRequestTrait
 */
trait UserAllRequestTrait
{

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $currentTrain;

    /**
     * @var int
     */
    protected $currentApproach;

    /**
     * @inheritDoc
     */
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getCurrentTrain(): int
    {
        return $this->currentTrain;
    }

    /**
     * @param int $currentTrain
     */
    public function setCurrentTrain(int $currentTrain)
    {
        $this->currentTrain = $currentTrain;
    }

    /**
     * @return int
     */
    public function getCurrentApproach(): int
    {
        return $this->currentApproach;
    }

    /**
     * @param int $currentApproach
     */
    public function setCurrentApproach(int $currentApproach)
    {
        $this->currentApproach = $currentApproach;
    }

}
