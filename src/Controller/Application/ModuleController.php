<?php

namespace App\Controller\Application;

use App\Entity\Module;
use App\Form\Module1Type;
use App\Repository\ModuleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * @Route("/app/module", name="app_module_")
 * @Security("has_role('ROLE_ADMIN')")
 */
class ModuleController extends Controller
{
    /**
     * @Route("/", name="index", methods="GET")
     */
    public function index(ModuleRepository $moduleRepository): Response
    {
        return $this->render('app/module/index.html.twig', [
            'modules' => $moduleRepository->findBy([], ['id' => 'DESC'])
        ]);
    }

    /**
     * @Route("/new", name="new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $module = new Module();
        $form = $this->createForm(Module1Type::class, $module);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $module->setEnergy('0 kWh');
            $module->setOxygen(0);
            $module->setTemperature(0);

            $em = $this->getDoctrine()->getManager();
            $em->persist($module);
            $em->flush();

            return $this->redirectToRoute('app_module_index');
        }

        return $this->render('app/module/new.html.twig', [
            'module' => $module,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="show", methods="GET")
     */
    public function show(Module $module): Response
    {
        return $this->render('app/module/show.html.twig', ['module' => $module]);
    }

    /**
     * @Route("/{id}/edit", name="edit", methods="GET|POST")
     */
    public function edit(Request $request, Module $module): Response
    {
        $form = $this->createForm(Module1Type::class, $module);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('app_module_edit', ['id' => $module->getId()]);
        }

        return $this->render('app/module/edit.html.twig', [
            'module' => $module,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="delete", methods="DELETE")
     */
    public function delete(Request $request, Module $module): Response
    {
        if ($this->isCsrfTokenValid('delete'.$module->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($module);
            $em->flush();
        }

        return $this->redirectToRoute('app_module_index');
    }
}
