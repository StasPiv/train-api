<?php

namespace CoreBundle\Model\Request\OauthLogin;

use NorseDigital\Symfony\RestBundle\Request\AbstractRequest;


/**
 * Class OauthLoginRequest
 */
class OauthLoginRequest extends AbstractRequest
{
    /**
     * @var string
     */
    private $code = '';

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return OauthLoginRequest
     */
    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }
}
