<?php

namespace App\Controller\Application;

use App\Entity\ModuleReference;
use App\Form\ModuleType;
use App\Repository\ModuleTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use App\Service\FileUploader;

/**
 * @Route("/app/module/type", name="app_module_type_")
 * @Security("has_role('ROLE_ADMIN')")
 */
class ModuleReferenceController extends Controller
{
    /**
     * @Route("/", name="index", methods="GET")
     */
    public function index(ModuleTypeRepository $moduleTypeRepository): Response
    {
        return $this->render('app/module_type/index.html.twig', [
            'module_types' => $moduleTypeRepository->findBy([], ['id' => 'DESC'])
        ]);
    }

    /**
     * @Route("/new", name="new", methods="GET|POST")
     */
    public function new(Request $request, FileUploader $fileUploader): Response
    {
        $ModuleReference = new ModuleReference();

        $form = $this->createForm(ModuleType::class, $ModuleReference);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /**
             * @var \Symfony\Component\HttpFoundation\File\UploadedFile $file
             */
            $file = $ModuleReference->getImage();
            $fileName = $fileUploader->upload($file);

            $ModuleReference->setImage($fileName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($ModuleReference);
            $em->flush();

            return $this->redirectToRoute('app_module_type_index');
        }

        return $this->render('app/module_type/new.html.twig', [
            'module_type' => $ModuleReference,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="edit", methods="GET|POST")
     */
    public function edit(Request $request, ModuleReference $ModuleReference, FileUploader $fileUploader): Response
    {
        $form = $this->createForm(ModuleType::class, $ModuleReference);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /**
             * @var \Symfony\Component\HttpFoundation\File\UploadedFile $file
             */
            $file = $ModuleReference->getImage();
            $fileName = $fileUploader->upload($file);

            $ModuleReference->setImage($fileName);

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('app_module_type_edit', [
                'id' => $ModuleReference->getId()
            ]);
        }

        return $this->render('app/module_type/edit.html.twig', [
            'module_type' => $ModuleReference,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="delete", methods="DELETE")
     */
    public function delete(Request $request, ModuleReference $moduleType): Response
    {
        if ($this->isCsrfTokenValid('delete'.$moduleType->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($moduleType);
            $em->flush();
        }

        return $this->redirectToRoute('app_module_type_index');
    }
}
