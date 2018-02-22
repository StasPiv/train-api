<?php

namespace CoreBundle\Model\Request\Record;

use CoreBundle\Entity\Record;


/**
 * Interface RecordSingleRequestInterface
 */
interface RecordSingleRequestInterface
{

    /**
     * @return Record
     */
    public function getRecord(): Record;

    /**
     * @param Record $record
     * @return self
     */
    public function setRecord(Record $record): self;

}
