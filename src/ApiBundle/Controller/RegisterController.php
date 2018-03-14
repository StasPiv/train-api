<?php

namespace ApiBundle\Controller;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use NorseDigital\Symfony\RestBundle\Controller\BaseController;
use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use CoreBundle\Form\Register\RegisterType;
use FOS\RestBundle\Controller\Annotations\Post;

/**
 * Class RegisterController
 *
 * @RouteResource ("Register")
 */
class RegisterController extends BaseController
{

    /**
     * @ApiDoc (
     *   resource = true,
     *   section = "Register",
     *   description = "Register",
     *   input = {
     *      "class" = "CoreBundle\Form\Register\RegisterType",
     *      "name" = "",
     *   },
     *   statusCodes = {
     *      "200" = "Ok",
     *      "204" = "Register not found",
     *      "400" = "Bad format",
     *      "403" = "Forbidden",
     *   },
     * )
     * @Post("/register")
     * @param Request $request
     * @return Response
     */
    public function postAction(Request $request): Response
    {
         return $this->process($request, RegisterType::class);
    }

    /**
     * @return ProcessorInterface
     */
    public function getProcessor(): ProcessorInterface
    {
        return $this->get('core.handler.register');
    }

}
