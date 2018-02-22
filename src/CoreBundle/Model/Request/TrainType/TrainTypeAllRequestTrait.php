<?php

namespace CoreBundle\Model\Request\TrainType;


/**
 * Trait TrainTypeAllRequestTrait
 */
trait TrainTypeAllRequestTrait
{

    /**
     * @var string
     */
    protected $title;

    /**
     * @var int
     */
    protected $priority;

    /**
     * @inheritDoc
     */
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return int
     */
    public function getPriority(): int
    {
        return $this->priority;
    }

    /**
     * @param int $priority
     */
    public function setPriority(int $priority)
    {
        $this->priority = $priority;
    }

}
