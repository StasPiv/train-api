<?php

namespace CoreBundle\Service\Record;

use CoreBundle\Entity\Record;
use NorseDigital\Symfony\RestBundle\Service\AbstractService;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;
use CoreBundle\Model\Request\Record\RecordAllRequestInterface;
use CoreBundle\Model\Request\Record\RecordCreateRequest;
use CoreBundle\Model\Request\Record\RecordUpdateRequest;


/**
 * Class RecordService
 *
 * @method Record createEntity()
 * @method Record getEntity(int $id)
 * @method Record getEntityBy(array $criteria)
 * @method Record deleteEntity(EntityInterface $entity, bool $flush = true)
 */
class RecordService extends AbstractService implements EventSubscriberInterface, RecordDefaultValuesInterface
{
    use RecordDefaultValuesTrait;


    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @param ContainerInterface $container
     * @param string $entityClass
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(ContainerInterface $container, string $entityClass, EventDispatcherInterface $eventDispatcher)
    {
        parent::__construct($container, $entityClass);
        $this->setContainer($container);
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents(): array
    {
        return [];
    }

    /**
     * @param RecordCreateRequest $request
     * @return Record
     */
    public function updatePost(RecordCreateRequest $request): Record
    {
        $record = $this->createEntity();
        $this->setGeneralFields($request, $record, true);
        $this->saveEntity($record);
        return $record;
    }

    /**
     * @param RecordUpdateRequest $request
     * @return Record
     */
    public function updatePut(RecordUpdateRequest $request): Record
    {
        $record = $request->getRecord();
        $this->setGeneralFields($request, $record, true);
        $this->saveEntity($record);
        return $record;
    }

    /**
     * @param RecordUpdateRequest $request
     * @return Record
     */
    public function updatePatch(RecordUpdateRequest $request): Record
    {
        $record = $request->getRecord();
        $this->setGeneralFields($request, $record);
        $this->saveEntity($record);
        return $record;
    }

    /**
     * @param RecordAllRequestInterface $request
     * @param Record $record
     * @param bool $fullUpdate
     * @return Record
     */
    public function setGeneralFields(RecordAllRequestInterface $request, Record $record, bool $fullUpdate = false): Record
    {
    if ($request->hasType()) {
            $record->setType($request->getType());
        } elseif ($fullUpdate) {
            $record->setType($this->getDefaultType());
        }
    
        if ($request->hasTrainNumber()) {
            $record->setTrainNumber($request->getTrainNumber());
        } elseif ($fullUpdate) {
            $record->setTrainNumber($this->getDefaultTrainNumber());
        }
    
        if ($request->hasApproachNumber()) {
            $record->setApproachNumber($request->getApproachNumber());
        } elseif ($fullUpdate) {
            $record->setApproachNumber($this->getDefaultApproachNumber());
        }
    
        if ($request->hasValue()) {
            $record->setValue($request->getValue());
        } elseif ($fullUpdate) {
            $record->setValue($this->getDefaultValue());
        }
    
        if ($request->hasTime()) {
            $record->setTime($request->getTime());
        } elseif ($fullUpdate) {
            $record->setTime($this->getDefaultTime());
        }
        return $record;
    }

}
