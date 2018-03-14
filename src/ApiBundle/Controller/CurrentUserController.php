<?php

namespace ApiBundle\Controller;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use NorseDigital\Symfony\RestBundle\Controller\BaseController;
use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use CoreBundle\Form\CurrentUser\CurrentUserType;
use FOS\RestBundle\Controller\Annotations\Get;


/**
 * Class CurrentUserController
 *
 * @RouteResource ("CurrentUser")
 */
class CurrentUserController extends BaseController
{

    /**
     * @ApiDoc (
     *   resource = true,
     *   section = "CurrentUser",
     *   description = "Get CurrentUser",
     *   input = {
     *      "class" = "CoreBundle\Form\CurrentUser\CurrentUserType",
     *      "name" = "",
     *   },
     *   statusCodes = {
     *      "200" = "Ok",
     *      "204" = "CurrentUser not found",
     *      "400" = "Bad format",
     *      "403" = "Forbidden",
     *   },
     * )
     * @param Request $request
     * @return Response
     */
    public function getAction(Request $request): Response
    {
         return $this->process($request, CurrentUserType::class);
    }

    /**
     * @Get("/me")
     *
     * @return ProcessorInterface
     */
    public function getProcessor(): ProcessorInterface
    {
        return $this->get('core.handler.current_user');
    }

}
