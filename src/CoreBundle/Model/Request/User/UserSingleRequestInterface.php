<?php

namespace CoreBundle\Model\Request\User;

use CoreBundle\Entity\User;


/**
 * Interface UserSingleRequestInterface
 */
interface UserSingleRequestInterface
{

    /**
     * @return User
     */
    public function getUser(): User;

    /**
     * @param User $user
     * @return self
     */
    public function setUser(User $user): self;

}
