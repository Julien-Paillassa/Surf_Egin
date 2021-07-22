<?php

namespace App\Controller;

use App\Entity\Board;
use App\Form\IdealBoardType;
use App\Repository\BoardRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/planche", name="board_")
 */
class BoardController extends AbstractController
{
    private $boardRepository;

    public function __construct(BoardRepository $boardRepository)
    {
        $this->boardRepository = $boardRepository;
    }

    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        $boards = $this->boardRepository->findAll();

        return $this->render('board/index.html.twig', [
            'boards' => $boards,
        ]);
    }

    /**
     * @Route("/recherche", name="ideal")
     */
    public function searchBoard(Request $request, BoardRepository $boardRepository)
    {
        $boards = [];
        $form = $this->createForm(IdealBoardType::class);

        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {
            $criteria = [];
            $criteria = $form->getData();

            $boards = $boardRepository->searchBoard($criteria);
        }

        return $this->render('board/ideal.html.twig', [
            "form" => $form->createView(),
            "boards" => $boards,
        ]);
    }

    /**
     * @Route("/{id}", name="show", methods={"GET"})
     */
    public function show(Board $board): Response
    {
        return $this->render('board/show.html.twig', [
            'board' => $board,
        ]);
    }
}
