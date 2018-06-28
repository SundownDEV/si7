<?php

namespace App\Controller\Application;

use App\Entity\Bill;
use App\Entity\Module;
use App\Entity\ModuleReference;
use App\Form\Module2Type;
use App\Repository\BillRepository;
use App\Repository\ModuleRepository;
use App\Repository\ModuleTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
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
     * @Route("/bills", name="bills", methods="GET")
     */
    public function bills(BillRepository $billRepository): Response
    {
        return $this->render('app/bills.html.twig', [
            'bills' => $billRepository->findBy(['user' => $this->getUser()->getId()], ['id' => 'DESC'])
        ]);
    }

    /**
     * @Route("/order", name="new", methods="GET")
     */
    public function order(ModuleTypeRepository $moduleTypeRepository): Response
    {
        $types = $moduleTypeRepository->findBy([], ['id' => 'DESC']);

        return $this->render('app/my_module/new.html.twig', [
            'types' => $types,
        ]);
    }

    /**
     * @Route("/order/{id}/confirm", name="new_confirm", methods="GET")
     */
    public function orderConfirm(Request $request, ModuleReference $type, ModuleRepository $moduleRepository): Response
    {
        $module = $moduleRepository->findOneBy(['user' => null, 'type' => $type->getId()]);

        return $this->render('app/my_module/order_confirm.html.twig', [
            'type' => $type,
            'module' => $module,
        ]);
    }

    /**
     * @Route("/order/{id}/confirm", name="new_confirm_post", methods="POST")
     */
    public function orderConfirmPost(Request $request, ModuleReference $type, ModuleRepository $moduleRepository): Response
    {
        $module = $moduleRepository->findOneBy(['user' => null, 'id' => $request->request->get('id')]);

        $em = $this->getDoctrine()->getManager();

        $module->setUser($this->getUser());

        $em->flush();

        // Facturation
        $bill = new Bill();

        $bill->setUser($this->getUser());
        $bill->setCost($request->request->get('cost'));
        $bill->setModule($module);

        $em->persist($bill);
        $em->flush();

        return $this->redirectToRoute('app_my_modules_index');
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
