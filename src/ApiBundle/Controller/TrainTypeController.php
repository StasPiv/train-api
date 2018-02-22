<?php

namespace ApiBundle\Controller;

use CoreBundle\Entity\TrainType;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use NorseDigital\Symfony\RestBundle\Controller\BaseController;
use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use CoreBundle\Form\TrainType\TrainTypeListType;
use CoreBundle\Form\TrainType\TrainTypeCreateType;
use CoreBundle\Form\TrainType\TrainTypeReadType;
use CoreBundle\Form\TrainType\TrainTypeUpdateType;
use CoreBundle\Form\TrainType\TrainTypeDeleteType;


/**
 * Class TrainTypeController
 *
 * @RouteResource ("TrainType")
 */
class TrainTypeController extends BaseController
{

    /**
     * @ApiDoc (
     *   resource = true,
     *   section = "TrainType",
     *   description = "Get list of TrainType",
     *   input = {
     *      "class" = "CoreBundle\Form\TrainType\TrainTypeListType",
     *      "name" = "",
     *   },
     *   statusCodes = {
     *      "200" = "Ok",
     *      "204" = "TrainType not found",
     *      "400" = "Bad format",
     *      "403" = "Forbidden",
     *   },
     * )
     * @param Request $request
     * @return Response
     */
    public function cgetAction(Request $request): Response
    {
         return $this->process($request, TrainTypeListType::class);
    }

    /**
     * @ApiDoc (
     *   resource = true,
     *   section = "TrainType",
     *   description = "Create TrainType",
     *   input = {
     *      "class" = "CoreBundle\Form\TrainType\TrainTypeCreateType",
     *      "name" = "",
     *   },
     *   statusCodes = {
     *      "200" = "Ok",
     *      "204" = "TrainType not found",
     *      "400" = "Bad format",
     *      "403" = "Forbidden",
     *   },
     * )
     * @param Request $request
     * @return Response
     */
    public function postAction(Request $request): Response
    {
        return $this->process($request, TrainTypeCreateType::class, Response::HTTP_CREATED);
    }

    /**
     * @ApiDoc (
     *   resource = true,
     *   section = "TrainType",
     *   description = "Get TrainType",
     *   input = {
     *      "class" = "CoreBundle\Form\TrainType\TrainTypeReadType",
     *      "name" = "",
     *   },
     *   statusCodes = {
     *      "200" = "Ok",
     *      "204" = "TrainType not found",
     *      "400" = "Bad format",
     *      "403" = "Forbidden",
     *   },
     * )
     * @param Request $request
     * @param TrainType $trainType
     * @return Response
     */
    public function getAction(Request $request, TrainType $trainType): Response
    {
         return $this->process($request, TrainTypeReadType::class);
    }

    /**
     * @ApiDoc (
     *   resource = true,
     *   section = "TrainType",
     *   description = "Update TrainType",
     *   input = {
     *      "class" = "CoreBundle\Form\TrainType\TrainTypeUpdateType",
     *      "name" = "",
     *   },
     *   statusCodes = {
     *      "200" = "Ok",
     *      "204" = "TrainType not found",
     *      "400" = "Bad format",
     *      "403" = "Forbidden",
     *   },
     * )
     * @param Request $request
     * @param TrainType $trainType
     * @return Response
     */
    public function putAction(Request $request, TrainType $trainType): Response
    {
         return $this->process($request, TrainTypeUpdateType::class);
    }

    /**
     * @ApiDoc (
     *   resource = true,
     *   section = "TrainType",
     *   description = "Update certain fields TrainType",
     *   input = {
     *      "class" = "CoreBundle\Form\TrainType\TrainTypeUpdateType",
     *      "name" = "",
     *   },
     *   statusCodes = {
     *      "200" = "Ok",
     *      "204" = "TrainType not found",
     *      "400" = "Bad format",
     *      "403" = "Forbidden",
     *   },
     * )
     * @param Request $request
     * @param TrainType $trainType
     * @return Response
     */
    public function patchAction(Request $request, TrainType $trainType): Response
    {
         return $this->process($request, TrainTypeUpdateType::class);
    }

    /**
     * @ApiDoc (
     *   resource = true,
     *   section = "TrainType",
     *   description = "Delete TrainType",
     *   input = {
     *      "class" = "CoreBundle\Form\TrainType\TrainTypeDeleteType",
     *      "name" = "",
     *   },
     *   statusCodes = {
     *      "200" = "Ok",
     *      "204" = "TrainType not found",
     *      "400" = "Bad format",
     *      "403" = "Forbidden",
     *   },
     * )
     * @param Request $request
     * @param TrainType $trainType
     * @return Response
     */
    public function deleteAction(Request $request, TrainType $trainType): Response
    {
        return $this->process($request, TrainTypeDeleteType::class);
    }

    /**
     * @return ProcessorInterface
     */
    public function getProcessor(): ProcessorInterface
    {
        return $this->get('core.handler.train_type');
    }

}
