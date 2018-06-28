<?php

namespace App\Controller\Application;

use App\Entity\Module;
use App\Form\Module2Type;
use App\Repository\ModuleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * @Route("/app/my-modules", name="app_my_modules_")
 * @Security("has_role('ROLE_USER') or has_role('ROLE_ADMIN')")
 */
class MyModuleController extends Controller
{
    /**
     * @Route("/", name="index", methods="GET")
     */
    public function index(ModuleRepository $moduleRepository): Response
    {
        return $this->render('app/my_module/index.html.twig', [
            'modules' => $moduleRepository->findBy(['user' => $this->getUser()->getId()], ['id' => 'DESC'])
        ]);
    }

    /**
     * @Route("/new", name="new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $module = new Module();
        $form = $this->createForm(Module2Type::class, $module);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($module);
            $em->flush();

            return $this->redirectToRoute('app_my_modules_index');
        }

        return $this->render('app/my_module/new.html.twig', [
            'module' => $module,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="show", methods="GET")
     */
    public function show(Module $module): Response
    {
        return $this->render('app/my_module/show.html.twig', ['module' => $module]);
    }

    /**
     * @Route("/{id}/edit", name="edit", methods="GET|POST")
     */
    public function edit(Request $request, Module $module): Response
    {
        $form = $this->createForm(Module2Type::class, $module);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('app_my_modules_edit', ['id' => $module->getId()]);
        }

        return $this->render('app/my_module/edit.html.twig', [
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

        return $this->redirectToRoute('app_my_modules_index');
    }
}
