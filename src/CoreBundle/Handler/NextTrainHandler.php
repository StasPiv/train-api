<?php

namespace CoreBundle\Handler;

use CoreBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use CoreBundle\Model\Handler\NextTrainProcessorInterface;
use CoreBundle\Model\Request\NextTrain\NextTrainRequest;


/**
 * Class NextTrainHandler
 */
class NextTrainHandler implements ContainerAwareInterface, NextTrainProcessorInterface
{
    use ContainerAwareTrait;


    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @param ContainerInterface $container
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(ContainerInterface $container, EventDispatcherInterface $eventDispatcher)
    {
        $this->setContainer($container);
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @param NextTrainRequest $request
     * @return User
     */
    public function processPost(NextTrainRequest $request): User
    {
        $userService = $this->container->get('core.service.user');
        $user = $userService->getCurrentUser();

        $user->setCurrentTrain($user->getCurrentTrain() + 1)->setCurrentApproach(1);

        $userService->saveEntity($user);

        return $user;
    }

}
