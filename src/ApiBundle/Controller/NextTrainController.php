<?php

namespace ApiBundle\Controller;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use NorseDigital\Symfony\RestBundle\Controller\BaseController;
use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use CoreBundle\Form\NextTrain\NextTrainType;
use FOS\RestBundle\Controller\Annotations;

/**
 * Class NextTrainController
 *
 * @RouteResource ("NextTrain")
 */
class NextTrainController extends BaseController
{

    /**
     * @ApiDoc (
     *   resource = true,
     *   section = "NextTrain",
     *   description = "Get NextTrain",
     *   input = {
     *      "class" = "CoreBundle\Form\NextTrain\NextTrainType",
     *      "name" = "",
     *   },
     *   statusCodes = {
     *      "200" = "Ok",
     *      "204" = "NextTrain not found",
     *      "400" = "Bad format",
     *      "403" = "Forbidden",
     *   },
     * )
     *
     * @Annotations\Post("/next-train")
     *
     * @param Request $request
     * @return Response
     */
    public function postAction(Request $request): Response
    {
         return $this->process($request, NextTrainType::class);
    }

    /**
     * @return ProcessorInterface
     */
    public function getProcessor(): ProcessorInterface
    {
        return $this->get('core.handler.next_train');
    }

}
