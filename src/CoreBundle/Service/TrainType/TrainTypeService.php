<?php

namespace CoreBundle\Service\TrainType;

use CoreBundle\Entity\TrainType;
use NorseDigital\Symfony\RestBundle\Service\AbstractService;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;
use CoreBundle\Model\Request\TrainType\TrainTypeAllRequestInterface;
use CoreBundle\Model\Request\TrainType\TrainTypeCreateRequest;
use CoreBundle\Model\Request\TrainType\TrainTypeUpdateRequest;


/**
 * Class TrainTypeService
 *
 * @method TrainType createEntity()
 * @method TrainType getEntity(int $id)
 * @method TrainType getEntityBy(array $criteria)
 * @method TrainType deleteEntity(EntityInterface $entity, bool $flush = true)
 */
class TrainTypeService extends AbstractService implements EventSubscriberInterface, TrainTypeDefaultValuesInterface
{
    use TrainTypeDefaultValuesTrait;


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
     * @param TrainTypeCreateRequest $request
     * @return TrainType
     */
    public function updatePost(TrainTypeCreateRequest $request): TrainType
    {
        $trainType = $this->createEntity();
        $this->setGeneralFields($request, $trainType, true);
        $this->saveEntity($trainType);
        return $trainType;
    }

    /**
     * @param TrainTypeUpdateRequest $request
     * @return TrainType
     */
    public function updatePut(TrainTypeUpdateRequest $request): TrainType
    {
        $trainType = $request->getTrainType();
        $this->setGeneralFields($request, $trainType, true);
        $this->saveEntity($trainType);
        return $trainType;
    }

    /**
     * @param TrainTypeUpdateRequest $request
     * @return TrainType
     */
    public function updatePatch(TrainTypeUpdateRequest $request): TrainType
    {
        $trainType = $request->getTrainType();
        $this->setGeneralFields($request, $trainType);
        $this->saveEntity($trainType);
        return $trainType;
    }

    /**
     * @param TrainTypeAllRequestInterface $request
     * @param TrainType $trainType
     * @param bool $fullUpdate
     * @return TrainType
     */
    public function setGeneralFields(TrainTypeAllRequestInterface $request, TrainType $trainType, bool $fullUpdate = false): TrainType
    {
    if ($request->hasTitle()) {
            $trainType->setTitle($request->getTitle());
        } elseif ($fullUpdate) {
            $trainType->setTitle($this->getDefaultTitle());
        }
    
        if ($request->hasPriority()) {
            $trainType->setPriority($request->getPriority());
        } elseif ($fullUpdate) {
            $trainType->setPriority($this->getDefaultPriority());
        }
        return $trainType;
    }

}
