<?php

namespace ApiBundle\Controller;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use NorseDigital\Symfony\RestBundle\Controller\BaseController;
use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use CoreBundle\Form\AllStat\AllStatType;


/**
 * Class AllStatController
 *
 * @RouteResource ("AllStat")
 */
class AllStatController extends BaseController
{

    /**
     * @ApiDoc (
     *   resource = true,
     *   section = "AllStat",
     *   description = "Get AllStat",
     *   input = {
     *      "class" = "CoreBundle\Form\AllStat\AllStatType",
     *      "name" = "",
     *   },
     *   statusCodes = {
     *      "200" = "Ok",
     *      "204" = "AllStat not found",
     *      "400" = "Bad format",
     *      "403" = "Forbidden",
     *   },
     * )
     * @param Request $request
     * @return Response
     */
    public function getAction(Request $request): Response
    {
         return $this->process($request, AllStatType::class);
    }

    /**
     * @return ProcessorInterface
     */
    public function getProcessor(): ProcessorInterface
    {
        return $this->get('core.handler.all_stat');
    }

}
