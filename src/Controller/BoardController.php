<?php

namespace App\Controller;

use App\Entity\Board;
use App\Repository\BoardRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
}
