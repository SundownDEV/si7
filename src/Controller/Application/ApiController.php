<?php
/**
 * Created by PhpStorm.
 * User: sundowndev
 * Date: 6/27/18
 * Time: 2:57 PM
 */

namespace App\Controller\Application;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ApiController
 * @package App\Controller\Application
 *
 * @Route("/api", name="api")
 */
class ApiController
{

    /**
     * @Route("/messages", methods={"GET"}, name="get_messages")
     */
    public function getMessages()
    {
        //
    }

    /**
     * @Route("/messages", methods={"POST"}, name="post_messages")
     */
    public function postMessages(Request $request)
    {
        //
    }
}