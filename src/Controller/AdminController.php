<?php

namespace App\Controller;

use App\Entity\Board;
use App\Repository\BoardRepository;
use App\Repository\SpotRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\BoardType;

/**
 * @Route("/administration", name="admin_")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/dashboard", name="index")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig');
    }

    /**
     * @Route("/planches", name="board")
     */
    public function boardManager(
        BoardRepository $boardRepository
    ): Response {
        $boards = $boardRepository->findAll();

        return $this->render('admin/board_manager.html.twig', [
            'boards' => $boards,
        ]);
    }

    /**
     * @Route("/spots", name="spot")
     */
    public function spotManager(
        SpotRepository $spotRepository
    ): Response {
        $spots = $spotRepository->findAll();

        return $this->render('admin/spot_manager.html.twig', [
            'spots' => $spots,
        ]);
    }

    /**
     * @Route("/new", name="new_board")
     */
    public function newBoard(Request $request, EntityManagerInterface $entityManager, MailerInterface $mailer, UserRepository $userRepository) : Response
    {
        $users = $userRepository->findAll();
        $board = new Board();
        $form = $this->createForm(BoardType::class, $board);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $usersEmail = [];
            foreach ($users as $user) {
                $usersEmail[] = $user->getEmail();
            }
            foreach ($usersEmail as $userEmail) {
                $email = (new Email())
                    ->from($this->getParameter('mailer_from'))
                    ->to($userEmail)
                    ->subject('Nouvelle planche')
                    ->html($this->renderView('board/newBoardEmail.html.twig', [
                        'board' => $board
                    ]));
                $mailer->send($email);
            }
            $entityManager->persist($board);
            $entityManager->flush();
            return $this->redirectToRoute('admin_board');
        }
        return $this->render('admin/board_new.html.twig', [
            "form" => $form->createView(),
        ]);
    }

    /**
     * @Route("/edit/{id}", name="edit_board", methods={"GET","POST"})
     */
    public function edit(Request $request, Board $board): Response
    {
        $form = $this->createForm(BoardType::class, $board);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_board', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/board_edit.html.twig', [
            'board' => $board,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="board_delete", methods={"POST"})
     */
    public function delete(Request $request, Board $board): Response
    {
        if ($this->isCsrfTokenValid('delete'.$board->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($board);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_board', [], Response::HTTP_SEE_OTHER);
    }
}
