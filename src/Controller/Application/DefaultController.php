<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller\Application;

use App\Utils\Slugger;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/app", name="app_")
 * @Security("has_role('ROLE_USER') or has_role('ROLE_ADMIN')")
 */
class DefaultController extends AbstractController
{
    /**
     * Dashboard index.
     *
     * @Route("/", methods={"GET"}, name="index")
     */
    public function index(): Response
    {
        return $this->render('app/index.html.twig');
    }
}
