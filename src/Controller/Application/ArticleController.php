<?php

namespace App\Controller\Application;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use App\Service\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * @Route("/app/articles", name="app_article_")
 * @Security("has_role('ROLE_ADMIN')")
 */
class ArticleController extends Controller
{
    /**
     * @Route("/", name="index", methods="GET")
     */
    public function index(ArticleRepository $articleRepository): Response
    {
        return $this->render('app/article/index.html.twig', [
            'articles' => $articleRepository->findBy([], ['id' => 'DESC'])
        ]);
    }

    /**
     * @Route("/new", name="new", methods="GET|POST")
     */
    public function new(Request $request, FileUploader $fileUploader): Response
    {
        $article = new Article();
        $article->setUser($this->getUser());

        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /**
             * @var \Symfony\Component\HttpFoundation\File\UploadedFile $file
             */
            $file = $article->getImage();
            $fileName = $fileUploader->upload($file);

            $article->setImage($fileName);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('app_article_index');
        }

        return $this->render('app/article/new.html.twig', [
            'article' => $article,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="edit", methods="GET|POST")
     */
    public function edit(Request $request, Article $article, FileUploader $fileUploader): Response
    {
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /**
             * @var \Symfony\Component\HttpFoundation\File\UploadedFile $file
             */
            $file = $article->getImage();
            $fileName = $fileUploader->upload($file);

            $article->setImage($fileName);

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('app_article_edit', ['id' => $article->getId()]);
        }

        return $this->render('app/article/edit.html.twig', [
            'article' => $article,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="delete", methods="DELETE")
     */
    public function delete(Request $request, Article $article): Response
    {
        if ($this->isCsrfTokenValid('delete'.$article->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($article);
            $em->flush();
        }

        return $this->redirectToRoute('app_article_index');
    }
}
