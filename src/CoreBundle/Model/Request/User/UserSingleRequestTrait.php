<?php

namespace CoreBundle\Model\Request\User;

use CoreBundle\Entity\User;


/**
 * Trait UserSingleRequestTrait
 */
trait UserSingleRequestTrait
{

    /**
     * @inheritDoc
     */
    public function __construct()
    {
    $this->user = new User();
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
    return $this->user;
    }

    /**
     * @param User $user
     * @return UserSingleRequestInterface|$this
     */
    public function setUser(User $user): UserSingleRequestInterface
    {
    $this->user = $user;
    return $this;
    }

}
