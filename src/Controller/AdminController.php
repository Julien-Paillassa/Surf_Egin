<?php

namespace App\Controller;

use App\Entity\Board;
use App\Repository\BoardRepository;
use App\Repository\SpotRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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
    public function newBoard(Request $request, EntityManagerInterface $entityManager) : Response
    {
        $board = new Board();
        $form = $this->createForm(BoardType::class, $board);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $entityManager->persist($board);
            $entityManager->flush();
            return $this->redirectToRoute('admin_board');
        }
        return $this->render('admin/board_new.html.twig', [
            "form" => $form->createView(),
        ]);
    }
}
