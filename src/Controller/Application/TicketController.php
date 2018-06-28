<?php

namespace App\Controller\Application;

use App\Entity\Ticket;
use App\Form\TicketType;
use App\Repository\TicketRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * @Route("/app/ticket", name="app_ticket_")
 * @Security("has_role('ROLE_USER') or has_role('ROLE_ADMIN')")
 */
class TicketController extends Controller
{
    /**
     * @Route("/", name="index", methods="GET")
     */
    public function index(TicketRepository $ticketRepository): Response
    {
        return $this->render('app/ticket/index.html.twig', [
            'tickets' => $ticketRepository->findBy(['user' => $this->getUser()->getId()], ['status' => 'DESC'])
        ]);
    }

    /**
     * @Route("/new", name="new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $ticket = new Ticket();
        $ticket->setUser($this->getUser());
        $ticket->setStatus(true);

        $form = $this->createForm(TicketType::class, $ticket);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ticket);
            $em->flush();

            return $this->redirectToRoute('app_ticket_index');
        }

        return $this->render('app/ticket/new.html.twig', [
            'ticket' => $ticket,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="show", methods="GET")
     */
    public function show(Ticket $ticket): Response
    {
        return $this->render('app/ticket/show.html.twig', ['ticket' => $ticket]);
    }

    /**
     * @Route("/{id}/edit", name="edit", methods="GET|POST")
     */
    public function edit(Request $request, Ticket $ticket): Response
    {
        $form = $this->createForm(TicketType::class, $ticket);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() && $ticket->getUser() == $this->getUser()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('app_ticket_edit', [
                'id' => $ticket->getId()
            ]);
        }

        return $this->render('app/ticket/edit.html.twig', [
            'ticket' => $ticket,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="delete", methods="DELETE")
     */
    public function close(Request $request, Ticket $ticket): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ticket->getId(), $request->request->get('_token')) && $ticket->getStatus() == true) {
            $em = $this->getDoctrine()->getManager();
            $ticket->setStatus(false);
            $em->flush();
        }

        return $this->redirectToRoute('app_ticket_index');
    }
}
