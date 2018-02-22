<?php

namespace ApiBundle\Controller;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use NorseDigital\Symfony\RestBundle\Controller\BaseController;
use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use CoreBundle\Form\NextApproach\NextApproachType;
use FOS\RestBundle\Controller\Annotations;

/**
 * Class NextApproachController
 *
 * @RouteResource ("NextApproach")
 */
class NextApproachController extends BaseController
{

    /**
     * @ApiDoc (
     *   resource = true,
     *   section = "NextApproach",
     *   description = "Get NextApproach",
     *   input = {
     *      "class" = "CoreBundle\Form\NextApproach\NextApproachType",
     *      "name" = "",
     *   },
     *   statusCodes = {
     *      "200" = "Ok",
     *      "204" = "NextApproach not found",
     *      "400" = "Bad format",
     *      "403" = "Forbidden",
     *   },
     * )
     * @Annotations\Post("/next-approach")
     *
     * @param Request $request
     * @return Response
     */
    public function postAction(Request $request): Response
    {
         return $this->process($request, NextApproachType::class);
    }

    /**
     * @return ProcessorInterface
     */
    public function getProcessor(): ProcessorInterface
    {
        return $this->get('core.handler.next_approach');
    }

}
