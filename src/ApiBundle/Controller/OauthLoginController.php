<?php

namespace ApiBundle\Controller;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use NorseDigital\Symfony\RestBundle\Controller\BaseController;
use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use FOS\RestBundle\Controller\Annotations\Get;
use CoreBundle\Form\OauthLogin\OauthLoginType;


/**
 * Class OauthLoginController
 *
 * @RouteResource ("OauthLogin")
 */
class OauthLoginController extends BaseController
{

    /**
     * @ApiDoc (
     *   resource = true,
     *   section = "OauthLogin",
     *   description = "Get OauthLogin",
     *   input = {
     *      "class" = "CoreBundle\Form\OauthLogin\OauthLoginType",
     *      "name" = "",
     *   },
     *   statusCodes = {
     *      "200" = "Ok",
     *      "204" = "OauthLogin not found",
     *      "400" = "Bad format",
     *      "403" = "Forbidden",
     *   },
     * )
     * @Get("/login/check-google")
     * @param Request $request
     * @return Response
     */
    public function getAction(Request $request): Response
    {
         return $this->process($request, OauthLoginType::class);
    }

    /**
     * @return ProcessorInterface
     */
    public function getProcessor(): ProcessorInterface
    {
        return $this->get('core.handler.oauth_login');
    }

}
