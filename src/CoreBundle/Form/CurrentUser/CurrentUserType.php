<?php

namespace CoreBundle\Form\CurrentUser;

use CoreBundle\Model\Request\CurrentUser\CurrentUserRequest;
use NorseDigital\Symfony\RestBundle\Form\AbstractFormType;


/**
 * Class CurrentUserType
 */
class CurrentUserType extends AbstractFormType
{
    const DATA_CLASS = CurrentUserRequest::class;


}
