<?php

namespace ApiBundle\Controller;

use CoreBundle\Entity\User;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use NorseDigital\Symfony\RestBundle\Controller\BaseController;
use NorseDigital\Symfony\RestBundle\Handler\ProcessorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use CoreBundle\Form\User\UserListType;
use CoreBundle\Form\User\UserCreateType;
use CoreBundle\Form\User\UserReadType;
use CoreBundle\Form\User\UserUpdateType;
use CoreBundle\Form\User\UserDeleteType;


/**
 * Class UserController
 *
 * @RouteResource ("User")
 */
class UserController extends BaseController
{

//    /**
//     * @ApiDoc (
//     *   resource = true,
//     *   section = "User",
//     *   description = "Get list of User",
//     *   input = {
//     *      "class" = "CoreBundle\Form\User\UserListType",
//     *      "name" = "",
//     *   },
//     *   statusCodes = {
//     *      "200" = "Ok",
//     *      "204" = "User not found",
//     *      "400" = "Bad format",
//     *      "403" = "Forbidden",
//     *   },
//     * )
//     * @param Request $request
//     * @return Response
//     */
//    public function cgetAction(Request $request): Response
//    {
//         return $this->process($request, UserListType::class);
//    }
//
//    /**
//     * @ApiDoc (
//     *   resource = true,
//     *   section = "User",
//     *   description = "Create User",
//     *   input = {
//     *      "class" = "CoreBundle\Form\User\UserCreateType",
//     *      "name" = "",
//     *   },
//     *   statusCodes = {
//     *      "200" = "Ok",
//     *      "204" = "User not found",
//     *      "400" = "Bad format",
//     *      "403" = "Forbidden",
//     *   },
//     * )
//     * @param Request $request
//     * @return Response
//     */
//    public function postAction(Request $request): Response
//    {
//        return $this->process($request, UserCreateType::class, Response::HTTP_CREATED);
//    }

    /**
     * @ApiDoc (
     *   resource = true,
     *   section = "User",
     *   description = "Get User",
     *   input = {
     *      "class" = "CoreBundle\Form\User\UserReadType",
     *      "name" = "",
     *   },
     *   statusCodes = {
     *      "200" = "Ok",
     *      "204" = "User not found",
     *      "400" = "Bad format",
     *      "403" = "Forbidden",
     *   },
     * )
     * @param Request $request
     * @param User $user
     * @return Response
     */
    public function getAction(Request $request, User $user): Response
    {
         return $this->process($request, UserReadType::class);
    }

//    /**
//     * @ApiDoc (
//     *   resource = true,
//     *   section = "User",
//     *   description = "Update User",
//     *   input = {
//     *      "class" = "CoreBundle\Form\User\UserUpdateType",
//     *      "name" = "",
//     *   },
//     *   statusCodes = {
//     *      "200" = "Ok",
//     *      "204" = "User not found",
//     *      "400" = "Bad format",
//     *      "403" = "Forbidden",
//     *   },
//     * )
//     * @param Request $request
//     * @param User $user
//     * @return Response
//     */
//    public function putAction(Request $request, User $user): Response
//    {
//         return $this->process($request, UserUpdateType::class);
//    }
//
    /**
     * @ApiDoc (
     *   resource = true,
     *   section = "User",
     *   description = "Update certain fields User",
     *   input = {
     *      "class" = "CoreBundle\Form\User\UserUpdateType",
     *      "name" = "",
     *   },
     *   statusCodes = {
     *      "200" = "Ok",
     *      "204" = "User not found",
     *      "400" = "Bad format",
     *      "403" = "Forbidden",
     *   },
     * )
     * @param Request $request
     * @param User $user
     * @return Response
     */
    public function patchAction(Request $request, User $user): Response
    {
         return $this->process($request, UserUpdateType::class);
    }
//
//    /**
//     * @ApiDoc (
//     *   resource = true,
//     *   section = "User",
//     *   description = "Delete User",
//     *   input = {
//     *      "class" = "CoreBundle\Form\User\UserDeleteType",
//     *      "name" = "",
//     *   },
//     *   statusCodes = {
//     *      "200" = "Ok",
//     *      "204" = "User not found",
//     *      "400" = "Bad format",
//     *      "403" = "Forbidden",
//     *   },
//     * )
//     * @param Request $request
//     * @param User $user
//     * @return Response
//     */
//    public function deleteAction(Request $request, User $user): Response
//    {
//        return $this->process($request, UserDeleteType::class);
//    }

    /**
     * @return ProcessorInterface
     */
    public function getProcessor(): ProcessorInterface
    {
        return $this->get('core.handler.user');
    }

}
