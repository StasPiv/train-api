<?php

namespace CoreBundle\Model\Handler;

use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;
use CoreBundle\Model\Request\OauthLogin\OauthLoginRequest;


/**
 * Interface OauthLoginProcessorInterface
 */
interface OauthLoginProcessorInterface extends ProcessorInterface
{

    /**
     * @param OauthLoginRequest $request
     * @return void
     */
    public function processGet(OauthLoginRequest $request);

}
