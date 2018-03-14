<?php

namespace CoreBundle\Handler;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use CoreBundle\Model\Handler\OauthLoginProcessorInterface;
use CoreBundle\Model\Request\OauthLogin\OauthLoginRequest;


/**
 * Class OauthLoginHandler
 */
class OauthLoginHandler implements ContainerAwareInterface, OauthLoginProcessorInterface
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
     * @param OauthLoginRequest $request
     * @return array
     */
    public function processGet(OauthLoginRequest $request)
    {
        $ch = curl_init();
        $url = 'https://www.googleapis.com/oauth2/v4/token?code='.urlencode($request->getCode());
        curl_setopt($ch, CURLOPT_URL, $url);
        echo $url . PHP_EOL;
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);
        curl_close($ch);
        var_dump($result);die;


        $ch=curl_init();
        curl_setopt($ch, CURLOPT_URL,'https://www.googleapis.com/oauth2/v2/userinfo');
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $headers = array(
            'Authorization: Bearer ' . $request->getCode(),
        );
        print_r($headers);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }

}
