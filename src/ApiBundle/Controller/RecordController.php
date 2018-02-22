<?php

namespace ApiBundle\Controller;

use CoreBundle\Entity\Record;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use NorseDigital\Symfony\RestBundle\Controller\BaseController;
use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use CoreBundle\Form\Record\RecordListType;
use CoreBundle\Form\Record\RecordCreateType;
use CoreBundle\Form\Record\RecordReadType;
use CoreBundle\Form\Record\RecordUpdateType;
use CoreBundle\Form\Record\RecordDeleteType;


/**
 * Class RecordController
 *
 * @RouteResource ("Record")
 */
class RecordController extends BaseController
{

    /**
     * @ApiDoc (
     *   resource = true,
     *   section = "Record",
     *   description = "Get list of Record",
     *   input = {
     *      "class" = "CoreBundle\Form\Record\RecordListType",
     *      "name" = "",
     *   },
     *   statusCodes = {
     *      "200" = "Ok",
     *      "204" = "Record not found",
     *      "400" = "Bad format",
     *      "403" = "Forbidden",
     *   },
     * )
     * @param Request $request
     * @return Response
     */
    public function cgetAction(Request $request): Response
    {
         return $this->process($request, RecordListType::class);
    }

    /**
     * @ApiDoc (
     *   resource = true,
     *   section = "Record",
     *   description = "Create Record",
     *   input = {
     *      "class" = "CoreBundle\Form\Record\RecordCreateType",
     *      "name" = "",
     *   },
     *   statusCodes = {
     *      "200" = "Ok",
     *      "204" = "Record not found",
     *      "400" = "Bad format",
     *      "403" = "Forbidden",
     *   },
     * )
     * @param Request $request
     * @return Response
     */
    public function postAction(Request $request): Response
    {
        return $this->process($request, RecordCreateType::class, Response::HTTP_CREATED);
    }

    /**
     * @ApiDoc (
     *   resource = true,
     *   section = "Record",
     *   description = "Get Record",
     *   input = {
     *      "class" = "CoreBundle\Form\Record\RecordReadType",
     *      "name" = "",
     *   },
     *   statusCodes = {
     *      "200" = "Ok",
     *      "204" = "Record not found",
     *      "400" = "Bad format",
     *      "403" = "Forbidden",
     *   },
     * )
     * @param Request $request
     * @param Record $record
     * @return Response
     */
    public function getAction(Request $request, Record $record): Response
    {
         return $this->process($request, RecordReadType::class);
    }

    /**
     * @ApiDoc (
     *   resource = true,
     *   section = "Record",
     *   description = "Update Record",
     *   input = {
     *      "class" = "CoreBundle\Form\Record\RecordUpdateType",
     *      "name" = "",
     *   },
     *   statusCodes = {
     *      "200" = "Ok",
     *      "204" = "Record not found",
     *      "400" = "Bad format",
     *      "403" = "Forbidden",
     *   },
     * )
     * @param Request $request
     * @param Record $record
     * @return Response
     */
    public function putAction(Request $request, Record $record): Response
    {
         return $this->process($request, RecordUpdateType::class);
    }

    /**
     * @ApiDoc (
     *   resource = true,
     *   section = "Record",
     *   description = "Update certain fields Record",
     *   input = {
     *      "class" = "CoreBundle\Form\Record\RecordUpdateType",
     *      "name" = "",
     *   },
     *   statusCodes = {
     *      "200" = "Ok",
     *      "204" = "Record not found",
     *      "400" = "Bad format",
     *      "403" = "Forbidden",
     *   },
     * )
     * @param Request $request
     * @param Record $record
     * @return Response
     */
    public function patchAction(Request $request, Record $record): Response
    {
         return $this->process($request, RecordUpdateType::class);
    }

    /**
     * @ApiDoc (
     *   resource = true,
     *   section = "Record",
     *   description = "Delete Record",
     *   input = {
     *      "class" = "CoreBundle\Form\Record\RecordDeleteType",
     *      "name" = "",
     *   },
     *   statusCodes = {
     *      "200" = "Ok",
     *      "204" = "Record not found",
     *      "400" = "Bad format",
     *      "403" = "Forbidden",
     *   },
     * )
     * @param Request $request
     * @param Record $record
     * @return Response
     */
    public function deleteAction(Request $request, Record $record): Response
    {
        return $this->process($request, RecordDeleteType::class);
    }

    /**
     * @return ProcessorInterface
     */
    public function getProcessor(): ProcessorInterface
    {
        return $this->get('core.handler.record');
    }

}
