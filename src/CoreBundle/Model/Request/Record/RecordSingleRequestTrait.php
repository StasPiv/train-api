<?php

namespace CoreBundle\Model\Request\Record;

use CoreBundle\Entity\Record;


/**
 * Trait RecordSingleRequestTrait
 */
trait RecordSingleRequestTrait
{

    /**
     * @inheritDoc
     */
    public function __construct()
    {
    $this->record = new Record();
    }

    /**
     * @return Record
     */
    public function getRecord(): Record
    {
    return $this->record;
    }

    /**
     * @param Record $record
     * @return RecordSingleRequestInterface|$this
     */
    public function setRecord(Record $record): RecordSingleRequestInterface
    {
    $this->record = $record;
    return $this;
    }

}
