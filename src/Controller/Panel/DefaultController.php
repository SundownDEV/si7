<?php

namespace App\Controller\Panel;

use App\Utils\Slugger;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Dashboard for registered users or admins
 *
 * @Route("/app", name="panel")
 * @Security("has_role('ROLE_USER') or has_role('ROLE_ADMIN')")
 */
class DefaultController extends AbstractController
{
    /*
     * @Route("/", name="index")
     */
    public function index()
    {
        //return dashboard
    }
}
