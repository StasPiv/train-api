<?php

namespace CoreBundle\Handler;

use CoreBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use CoreBundle\Model\Handler\CurrentUserProcessorInterface;
use CoreBundle\Model\Request\CurrentUser\CurrentUserRequest;


/**
 * Class CurrentUserHandler
 */
class CurrentUserHandler implements ContainerAwareInterface, CurrentUserProcessorInterface
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
     * @param CurrentUserRequest $request
     * @return User
     */
    public function processGet(CurrentUserRequest $request): User
    {
        return $this->container->get('core.service.user')->getCurrentUser();
    }

}
